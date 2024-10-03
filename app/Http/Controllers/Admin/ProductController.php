<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use App\Models\Product;
use App\Models\UserType;

class ProductController extends Controller
{
    public function index()
    {
        $viewData = [
            'title' => 'Products Management',
            'activePage' => 'products',
            'products' => Product::with('userType')->get(),
        ];

        return view('admin-dashboard.products.index', $viewData);
    }

    public function create()
    {
        $viewData = [
            'title' => 'Add Product',
            'activePage' => 'products',
            'userTypes' => UserType::where('id', '!=', 1)->get(),
        ];

        return view('admin-dashboard.products.create', $viewData);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_type_id' => 'required|exists:user_types,id',
            'name' => 'required|max:100',
            'description' => 'nullable',
            'currency' => 'required|max:5',
            'price' => 'required|numeric',
            'quota' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        $viewData = [
            'title' => 'Product Details',
            'activePage' => 'products',
            'product' => $product,
        ];
        return view('admin-dashboard.products.show', $viewData);
    }

    public function edit(string $id)
    {
        $viewData = [
            'title' => 'Edit Product',
            'activePage' => 'products',
            'product' => Product::with('userType')->find($id),
            'userTypes' => UserType::where('id', '!=', 1)->get(),
        ];
        
        return view('admin-dashboard.products.edit', $viewData);
    }

    public function update(Request $request)
    { 
        $validatedData = $request->validate([
            'user_type_id' => 'required|exists:user_types,id',
            'name' => 'required|max:100',
            'description' => 'nullable',
            'currency' => 'required|max:5',
            'price' => 'required|numeric',
            'quota' => 'required|integer',
        ]);

        $product = Product::find($request->id);
        $product->update($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(string $id)
    {
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
