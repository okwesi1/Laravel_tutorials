<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        if ($request->isMethod('GET')) {
            $query = $request->input('search');
            $products = Product::when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('name', 'like', "%{$query}%")
                                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->paginate(10);

            return view('product.index', compact('products'));
        }

        return view('products.index'); // Return view if not GET
    }
    public function display(Request $request)
    {
        if ($request->isMethod('GET')) {
            $query = $request->input('search');
            $products = Product::when($query, function ($queryBuilder) use ($query) {
                return $queryBuilder->where('name', 'like', "%{$query}%")
                                    ->orWhere('description', 'like', "%{$query}%");
            })
            ->paginate(10);

            return view('product.display', compact('products'));
        }

        return view('products.display'); // Return view if not GET
    }
}
