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
        // Afficher les produits qui sont dans le panier
        $cartItems = Cart::where("user_id", Auth::user()->id)->get() ; 

        // Retourner vers la vue du panier vide
        return view('cart', compact('cartItems')); 
    }

    public function update(Cart $cart, $quantity /* Request $request */) 
    {
        // Mettre à jour la quantité
        $cart->update(['quantity'=> $quantity]); 
        $total = 0 ; 

        // Lire tout les articles dans le panier 
        $cartItems = Cart::where("user_id", Auth::user()->id)->get();

        foreach ($cartItems as $cart) {
            $total = $total + ($cart->quantity * $cart->product->price); 
        }

        // Retourner une réponse 
        return response()->json([   'result' => true, 
                                    'total' => $total]); 
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

        return redirect(route('cart')); // Retourner vers la vue du panier vide

    }

}
