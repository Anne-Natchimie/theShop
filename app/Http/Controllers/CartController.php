<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    //Calcul le total du panier en fonction du produit, de sa quantité et de son prix 
    private function calculTotal($cartItems) 
    {
        $total = 0 ; 

        foreach ($cartItems as $cart) {
            $total += ($cart->quantity * $cart->product->price); 
        }

        return $total ; 
    }

    public function index() 
    {
        // Afficher les produits qui sont dans le panier
        $cartItems = Cart::where("user_id", Auth::user()->id)->get() ; 
        $total = $this->calculTotal($cartItems); 

        // Retourner vers la vue du panier
        return view('cart', compact('cartItems', 'total')); 
    }

    public function update(Cart $cart, $quantity = 1 /* Request $request */) 
    {
        // Mettre à jour la quantité
        $cart->update(['quantity'=> $quantity]); 

        // Lire tout les articles dans le panier 
        $cartItems = Cart::where("user_id", Auth::user()->id)->get();

        $total = $this->calculTotal($cartItems); 

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
