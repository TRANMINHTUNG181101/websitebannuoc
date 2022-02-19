<?php

namespace App\Models;

class Cart
{
    public $products = null;
    public $totalPrice = 0;
    public $totalQuanty = 0;

    public function __construct($cart)
    {
        if ($cart) {
            $this->products = $cart->products;
            $this->totalPrice = $cart->totalPrice;
            $this->totalQuanty = $cart->totalQuanty;
        }
    }
    public function addCart($product, $idcart, $sl, $size)
    {
        $newProduct = ['quanty' => 0, 'productInfo' => $product, 'price' => $product->gia, 'size' => $size];
            if ($this->products) {
                if (array_key_exists($idcart, $this->products)) {
                    $newProduct = $this->products[$idcart];
                }
            }
        $newProduct['quanty'] += $sl;
        $newProduct['price']  = $newProduct['quanty'] * $product->giaban;
        $this->products[$idcart] = $newProduct;
        $this->totalPrice += $product->giaban * $sl;
        $this->totalQuanty += $sl;
    }
    public function deleteCart($keyCart)
    {
        $this->totalQuanty -= $this->products[$keyCart]['quanty'];
        $this->totalPrice -= $this->products[$keyCart]['price'];
        unset($this->products[$keyCart]);
    }
    public function updateCart($key, $sl, $size)
    {
        $this->totalQuanty -= $this->products[$key]['quanty'];
        $this->totalPrice -= $this->products[$key]['price'];

        $this->products[$key]['size'] = $size;
        $this->products[$key]['quanty'] = $sl;
        $this->products[$key]['price'] = $sl * $this->products[$key]['productInfo']->giaban;

        $this->totalQuanty += $this->products[$key]['quanty'];
        $this->totalPrice += $this->products[$key]['price'];
       
    }
    public function checkCartProduct($id, $size, $cart ) {
        $i = 0;
        foreach ($cart->products as $key => $value) {
            if($value['productInfo']->id == $id ) {
                $i++;
            }
            if ($value['productInfo']->id == $id && $value['size']->id == $size) {
                return $key;
            }
        }
        if ($i > 0) {
            return $id.$size;
        } else {
            return $id;
        }
    }

}
