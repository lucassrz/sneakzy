<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class homeController extends Controller
{
    public function index()
    {
        return view('home', [
            'products' => $this->all_product()
        ]);
    }

    public function contact()
    {
        return view('contact');
    }

    public function all_product(): array
    {
        return DB::select('select * from products where stock != 0');
    }

    public function all_categories(): array
    {
        return DB::select('select * from categories');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $products = Product::all();
        $avis = DB::select('select * from avis where id_product = ' . $id);

        return view('show', [
            'product' => $product,
            'products' => $products,
            'avis' => $avis
        ]);
    }

    public function search(Request $request): \Illuminate\Http\JsonResponse
    {
        $productList = Product::where('name', 'LIKE', '%' . $request->input . '%')->get();
        return response()->json($productList);
    }

    public function catalog()
    {
        return view('catalog', [
            'products' => $this->all_product(),
            'categories' => $this->all_categories(),
        ]);
    }

    public function filter(Request $request): \Illuminate\Http\JsonResponse
    {
        $productList = Product::where('name', 'LIKE', '%' . $request->name . '%');

        if (!empty($request->categories)) {
            $productList->where('id_categories', '=', $request->categories);
        }

        if (!empty($request->maxPrice)) {
            $productList->where('price', '<', $request->maxPrice);
        }

        if (!empty($request->minPrice)) {
            $productList->where('price', '>', $request->minPrice);
        }

        return response()->json($productList->get());
    }
}
