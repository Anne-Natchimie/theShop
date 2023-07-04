<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //

    public function index() 
    {
        $cartItems = Cart::where("user_id", Auth::user()->id)->get() ; 

        return view('cart', compact('cartItems')); 
    }

    public function deleteOne(Cart $cart) 
    {
        $cart->delete(); //Supprimer un élément

        return redirect(route('cart')); // Retourner la vue
    }

    public function delete() 
    {
        
        Cart::where('user_id', Auth::user()->id) // Sélectionner les éléments de l'utilisateur a supprimé
                ->delete(); //Supprimer les elements du panier de l'utilisateur 

        return redirect(route('cart')); // Retpurner vers la vue du panier vide

    }

}
