<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    public function index()
    {
        $products = Products::all();
        return Inertia::render('Products/Index', [
            'phpVariable' => $products
        ]);
    }

    public function create()
    {
        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'required',
            'user_id' => 'nullable',
        ]);

        Products::create($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Product created successfully.');
    }

    public function show(Products $product)
    {
        $company = Companies::find($product["company_id"]);
        return Inertia::render('Products/Show', [
            'phpVariable' => $product,
            'parentCompany' => $company,
        ]);
    }

    public function edit(Products $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Products $product)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'company_id' => 'nullable',
            'user_id' => 'nullable',
        ]);

        $product->update($validatedData);

        return redirect()->route('products.index')
            ->with('success', 'Product updated successfully.');
    }

    public function destroy(Products $product)
    {
        $product->delete();

        return redirect()->route('products.index')
            ->with('success', 'Product deleted successfully.');
    }
}
