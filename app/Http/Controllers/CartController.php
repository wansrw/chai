<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cart(Request $request)
    {
        return view('cart', $this->cartData($request));
    }

    public function add(Request $request, Catalog $product)
    {
        $validated = $request->validate([
            'quantity' => ['sometimes', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        $quantity = (int) ($validated['quantity'] ?? 1);
        $cart[$product->id] = min(99, (int) ($cart[$product->id] ?? 0) + $quantity);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart')->with('status', 'Товар добавлен в корзину.');
    }

    public function update(Request $request, Catalog $product)
    {
        $validated = $request->validate([
            'quantity' => ['required', 'integer', 'min:1', 'max:99'],
        ]);

        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        $cart[$product->id] = (int) $validated['quantity'];
        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function remove(Request $request, Catalog $product)
    {
        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        unset($cart[$product->id]);
        $request->session()->put('cart', $cart);

        return redirect()->route('cart');
    }

    public function checkout(Request $request)
    {
        $cartData = $this->cartData($request);

        if (empty($cartData['items'])) {
            return redirect()->route('cart')->with('error', 'Сначала добавьте товары в корзину.');
        }

        return view('checkout', $cartData);
    }

    private function cartData(Request $request)
    {
        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];
        $products = Catalog::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $items = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = $products->get($productId);

            if (!$product) {
                continue;
            }

            $quantity = max(1, min(99, (int) $quantity));
            $subtotal = round((float) $product->price * $quantity, 2);
            $items[] = compact('product', 'quantity', 'subtotal');
            $total += $subtotal;
        }

        return [
            'items' => $items,
            'total' => round($total, 2),
        ];
    }
}
