<?php

namespace App\Http\Controllers;
use App\Models\Catalog;
use App\Models\Categorys;
use Illuminate\Http\Request;


class CatalogController extends Controller
{
    public function catalog(Request $request)
    {
$filters = $request->validate([
    'category' => ['nullable', 'integer', 'exists:categorys,id'],
    'price_from' => ['nullable', 'numeric', 'min:0'],
    'price_to' => ['nullable', 'numeric', 'min:0'],
]);

$categories = Categorys::orderBy('name')->get();

$products = Catalog::with('category')
    ->when($filters['category'] ?? null, function ($query, $categoryId) {
        $query->where('category', $categoryId);
    })
    ->when($filters['price_from'] ?? null, function ($query, $price) {
        $query->where('price', '>=', $price);
    })
    ->when($filters['price_to'] ?? null, function ($query, $price) {
        $query->where('price', '<=', $price);
    })
    ->paginate(12)
    ->appends($request->query());

        return view('catalog', compact('products', 'categories'));
    }
}


    