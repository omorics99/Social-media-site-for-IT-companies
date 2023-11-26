<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CompanyController extends Controller
{
    public function index()
    {
        $companies = Companies::all();
        return Inertia::render('Companies/Index', [
            'phpVariable' => $companies
        ]);
    }

    public function create()
    {
        return Inertia::render('Companies/Create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'website_link' => 'nullable',
            'adress' => 'nullable',
            'gallery' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable',
        ]);

        Companies::create($validatedData);

        return redirect()->route('companies.index')
            ->with('success', 'Company created successfully.');
    }

    public function show(Companies $company)
    {
        $products = Products::all();
        return Inertia::render('Companies/Show', [
            'phpVariable' => $company,
            'subProducts' => $products,
        ]);
    }

    public function edit(Companies $company)
    {
        return view('companies.edit', compact('company'));
    }

    public function update(Request $request, Companies $company)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'website_link' => 'required',
            'adress' => 'required',
            'gallery' => 'required',
            'phone' => 'required',
            'email' => 'required',
        ]);

        $company->update($validatedData);

        return redirect()->route('companies.index')
            ->with('success', 'Company updated successfully.');
    }

    public function destroy(Companies $company)
    {
        $company->delete();

        return redirect()->route('companies.index')
            ->with('success', 'Company deleted successfully.');
    }
}
