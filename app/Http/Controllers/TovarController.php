<?php

namespace App\Http\Controllers;
use App\Models\Catalog;

class TovarController extends Controller
{
    public function tovar($id)
    {
        $product = Catalog::findOrFail($id);
        
        return view('tovar', compact('product'));
    }
}
