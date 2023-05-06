<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\PurchaseTransaction;
use App\Models\Store;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(Request $request){
        $stores = Store::all();

        if ($request->get('search')){
            $stores = Store::where('name', 'like', '%'.$request->get('search').'%')->get();
        }else{
            $stores = Store::all();
        }
        return view('web.index', [
           'stores' => $stores,
            'search' => $request->get('search')
        ]);
    }

    public function products(Request $request, $storeId){
        $store = Store::find($storeId);
        if ($request->get('search')){
            $products = Product::where('store_id', $storeId)->where('name', 'like', '%'.$request->get('search').'%')->get();
        }else{
            $products = $store->products;
        }

        return view('web.products', [
            'store' => $store,
            'products' => $products,
            'search' => $request->get('search')
        ]);

    }

    public function buyProduct($productId){
        $product = Product::find($productId);
        $data['product_id'] = $productId;
        if ($product->is_discount){
            $data['purchase_price'] = $product->discount_price;
        }else{
            $data['purchase_price'] = $product->base_price;
        }
        $data['purchase_date'] = now();
        PurchaseTransaction::create($data);

        return redirect()->route('index')->with('success', 'Product has been buy');
    }
}