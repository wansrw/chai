<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'address' => ['nullable', 'string', 'max:255'],
            'comment' => ['nullable', 'string', 'max:1000'],
        ]);

        $cart = $request->session()->get('cart', []);
        $cart = is_array($cart) ? $cart : [];

        if (empty($cart)) {
            return redirect()->route('cart')->with('error', 'Корзина пуста.');
        }

        $products = Catalog::whereIn('id', array_keys($cart))->get()->keyBy('id');
        $orderItems = [];
        $total = 0;

        foreach ($cart as $productId => $quantity) {
            $product = $products->get($productId);

            if (!$product) {
                continue;
            }

            $quantity = max(1, min(99, (int) $quantity));
            $price = round((float) $product->price, 2);
            $total += $price * $quantity;
            $orderItems[] = [
                'product_id' => $product->id,
                'product_name' => 'Чайный сорт '.$product->name,
                'unit_price' => $price,
                'quantity' => $quantity,
            ];
        }

        if (empty($orderItems)) {
            return redirect()->route('cart')->with('error', 'Товары в корзине больше недоступны.');
        }

        $order = DB::transaction(function () use ($request, $validated, $orderItems, $total) {
            $order = Order::create([
                'user_id' => $request->user()->id,
                'customer_name' => $validated['customer_name'],
                'phone' => $validated['phone'],
                'address' => $validated['address'] ?? null,
                'comment' => $validated['comment'] ?? null,
                'total' => round($total, 2),
                'status' => 'new',
            ]);

            $order->items()->createMany($orderItems);

            return $order;
        });

        $request->session()->forget('cart');

        return redirect()->route('home')->with('status', 'Заказ №'.$order->id.' оформлен. Мы свяжемся с вами по телефону.');
    }
}
