<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //

    public function index($id=0) {

        //Lister tout les produits

        //Requête 
        if($id !== 0){
            $products = Product::where('category_id', $id)
                            ->orderby('created_at', 'desc')
                            ->paginate(6) ; 
        } else {
            $products = Product::orderby('created_at', 'desc')
                                ->paginate(6) ; 
        }
        
        return view('welcome', compact('products')); 
    }

    public function detail(Product $product) 
    {
        // dd($product) ;
        return view('detail', compact('product')) ; 
    }

    // méthode recherche à partir d'un mot clé 
    public function search(String $keyword = '') 
    {
        $product = Product::where('name', 'LIKE', $keyword.'%') 
        ->limit(3)->get(); 
        // dd($product); 

        return response()->json($product); 

    }

}
