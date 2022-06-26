<?php

namespace App\Http\Controllers\Api;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
 
class ProductController extends Controller
{
    public function index()

    {
        
    return Product::get()->map( function (Product $product) {
            return [
                'id' => $product->id,
                'name' => $product->name,
                'description' => $product->description,
                'category_name' => $product->category->name,
                'created' => $product->created_at,
                'category_id' => $product->category->id,
                'code' =>  $product->code,
            ];
        });
    }
 
    public function show($id)
    {
        return Product::findOrFail($id);
    }
 
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->update($request->all());
 
        return $product;
    }
 
    public function store(Request $request)
    {
        $product = Product::create($request->all());
        return $product;
    }
 
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return '';
    }
}