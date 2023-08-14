<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        //
    }
    public function addToCart(Request $request)
    {
        $userId = auth()->user()->id;
        $productId = request('product_id');

        // dd($userId, $product);
        $existingCartItem = Cart::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($existingCartItem) {
            $existingCartItem->quantity++;
            $existingCartItem->save();
        } else {
            Cart::create([
                'user_id' => $userId,
                'product_id' => $productId,
                'quantity' => 1,
            ]);
        }

        return response()->json('Product added successfully');
    }
    public function Cart()
    {

        $cartitems = Cart::where('user_id', Auth::id())->with('products')->get();
        // dd($cartitems);
        return view('cart', compact('cartitems'));
    }

    public function removeProduct(Request $request)
    {
        $product_id = $request->input('product_id');

        if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
            $cartItem = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
            $cartItem->delete();
            return response()->json(['status' => "Product Deleted Successfully"]);
        }

        return response()->json(['status' => "Product not found in cart."]);
    }
}
























