<?php

namespace App\Http\Controllers;

use App\Models\Companies;
use App\Models\Products;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Perform search logic based on the request input
        $query = $request->input('query');
        $cat = $request->input('category');

        if ($query){
            if ($cat == "companies"){
                $results = Companies::where('description', 'like', '%' . $query . '%')->get();
            } else{
                $results = Products::where('description', 'like', '%' . $query . '%')->get();
            }
            return Inertia::render('Search', [
                'query' => $query,
                'category' => $cat,
                'results' => $results,
            ]);
        } else{
            return Inertia::render('Search', [
                'results' => null,
            ]);
        }




    }
}
