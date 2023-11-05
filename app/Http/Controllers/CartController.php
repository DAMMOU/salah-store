<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart; // Assurez-vous d'importer le modèle Cart
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Affiche le contenu du panier.
     *
     * @return \Illuminate\Http\Response
     */
    public function showCart()
    {
        $cart = session()->get('cart', new Cart());
        return view('cart.show', ['cart' => $cart]);
    }

    /**
     * Ajoute un produit au panier.
     *
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function addProductToCart($productId)
    {
        $product = Product::find($productId); // Remplacez Product par le modèle de produit approprié

        if (!$product) {
            return redirect()->back()->with('error', 'Produit non trouvé.');
        }

        $cart = session()->get('cart', new Cart());
        dd($cart);
        $cart->addProduct($product);

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Produit ajouté au panier.');
    }

    /**
     * Met à jour la quantité d'un produit dans le panier.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function updateQuantity(Request $request)
    {
        $productId = $request->input('product_id');
        $newQuantity = $request->input('quantity');

        $cart = session()->get('cart', new Cart());
        $cart->updateQuantity($productId, $newQuantity);

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Quantité mise à jour.');
    }

    /**
     * Supprime un produit du panier.
     *
     * @param int $productId
     * @return \Illuminate\Http\Response
     */
    public function removeProduct($productId)
    {
        $cart = session()->get('cart', new Cart());
        $cart->removeProduct($productId);

        session()->put('cart', $cart);

        return redirect()->route('cart')->with('success', 'Produit supprimé du panier.');
    }

    /**
     * Vide complètement le panier.
     *
     * @return \Illuminate\Http\Response
     */
    public function clearCart()
    {
        session()->forget('cart');
        return redirect()->route('cart')->with('success', 'Panier vidé.');
    }
}
