<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $items = [];
    protected $totalPrice = 0;
    protected $totalQty = 0;

    public function __construct(array $oldCart = [])
    {
        $this->items = $oldCart['items'] ?? [];
        $this->totalPrice = $oldCart['totalPrice'] ?? 0;
        $this->totalQty = $oldCart['totalQty'] ?? 0;
    }

    /**
     * Ajoute un produit au panier.
     *
     * @param Product $product
     * @param int $quantity
     */
    public function addProduct(Product $product, int $quantity = 1)
    {
        $productId = $product->id;

        if (array_key_exists($productId, $this->items)) {
            $item = $this->items[$productId];
            $item['quantity'] += $quantity;
        } else {
            $item = [
                'product' => $product,
                'quantity' => $quantity,
                'price' => $product->price,
            ];

            $this->items[$productId] = $item;
        }

        $this->totalQty += $quantity;
        $this->totalPrice += $product->price * $quantity;
    }

    /**
     * Met à jour la quantité d'un produit dans le panier.
     *
     * @param int $productId
     * @param int $newQuantity
     */
    public function updateQuantity(int $productId, int $newQuantity)
    {
        if (array_key_exists($productId, $this->items)) {
            $item = $this->items[$productId];
            $this->totalQty += $newQuantity - $item['quantity'];
            $this->totalPrice += ($newQuantity - $item['quantity']) * $item['price'];
            $item['quantity'] = $newQuantity;
        }
    }

    /**
     * Supprime un produit du panier.
     *
     * @param int $productId
     */
    public function removeProduct(int $productId)
    {
        if (array_key_exists($productId, $this->items)) {
            $item = $this->items[$productId];
            $this->totalQty -= $item['quantity'];
            $this->totalPrice -= $item['price'] * $item['quantity'];
            unset($this->items[$productId]);
        }
    }

    /**
     * Vide complètement le panier.
     */
    public function clearCart()
    {
        $this->items = [];
        $this->totalPrice = 0;
        $this->totalQty = 0;
    }
}
