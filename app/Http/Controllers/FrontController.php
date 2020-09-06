<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Cart;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index(){
//        $categories = Category::where('status',1)->get();
        $products = Product::orderBy('id','asc')->where('status',1)->get();
        return response()->json([
            'products' => $products
        ],200);
//        return $products;
//        return view('front-end.home.home',[
////            'categories' => $categories,
//            'products' => $products
//        ]);
    }

    public function getCategory(){
        $categories = Category::where('status',1)->get();
//        return $categories;
        return response()->json([
            'categories' => $categories
        ],200);
    }

    public function getCategoryProduct($id){
        $categoryProducts = Product::with('categories')->where('cat_id',$id)->where('status',1)->get();
//        return $categoryProducts;
        return response()->json([
            'categoryProducts' => $categoryProducts
        ],200);
    }

    public function productDetails($id){
        $singleProduct = Product::with('categories')->find($id);
//        return $singleProduct;
        return response()->json([
            'singleProduct' => $singleProduct
        ],200);
    }

//    public function category($id){
//        $categoryProducts = Product::with('categories')->where('cat_id',$id)->where('status',1)->get();
////        $categories = Category::where('status',1)->get();
//        return view('front-end.category.category',[
//                'categoryProducts' => $categoryProducts,
//        ]);
//    }
//
//    public function products($id){
//        $product = Product::with('categories','brands')->find($id);
//        return view('front-end.category.single-product',[
//            'product' => $product,
//        ]);
//    }

    public function addToCart(Request $request){
        $cartProduct = Product::find($request->id);
        Cart::add([
            'id' =>  $request->id,
            'name' => $cartProduct->pro_name,
            'price' => $cartProduct->pro_price,
            'qty' => $request->qty,
            'weight' => 0
        ]);

        return ['message'=>'ok'];
    }

    public function showCart(){
        $cartProducts = Cart::content();
        return response()->json([
            'cartProducts' => $cartProducts
        ],200);
    }

    public function deleteCart($rowId){
        $cartDelete = Cart::remove($rowId);
        return response()->json([
            'cartDelete' => $cartDelete
        ],200);
    }
    public function updateCart(Request $request,$rowId){
        Cart::update($rowId,$request->qty);

        return ['message'=>'ok'];
    }

    public function checkout(){
        return view('front-end.checkout.checkout');
    }
}
