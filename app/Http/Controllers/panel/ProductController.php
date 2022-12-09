<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $products = Product::withTrashed()->paginate(4);


        return view('panel.product.index', [
            'products' => $products
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $stores = Store::all();
        return view('panel.product.create', [
            'stores' => $stores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'store_id' => 'required|numeric|exists:stores,id',
            'base_price' => 'required|numeric|min:0',
            'discount_price' => 'required|numeric|min:0',
            'image' => 'required|image'
        ]);

        $filePath = '';
        if ($request->file('image')) {
            $name =  Str::random(10);
            $filePath =  $name . '.' . $request->file('image')->getClientOriginalExtension();
            $imageFullName = $name . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('images', $imageFullName, 'public');
        }



        Product::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'store_id' => $request->get('store_id'),
            'base_price' => $request->get('base_price'),
            'discount_price' => $request->get('discount_price'),
            'image' => $filePath,
            'is_discount' => $request->get('is_discount') ? 1 : 0,
        ]);

        return redirect()->back()->with('success', 'product created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $product = Product::findOrFail($id);
        $stores = Store::all();
        return view('panel.product.edit', [
            'product' => $product,
            'stores' => $stores
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string',
            'store_id' => 'required|numeric|exists:stores,id',
            'base_price' => 'required|numeric|min:0',
            'discount_price' => 'required|numeric|min:0',
            //            'image' => 'required|image'
        ]);

        $filePath = '';
        if ($request->file('image')) {
            $name =  Str::random(10);
            $filePath =  $name . '.' . $request->file('image')->getClientOriginalExtension();
            $imageFullName = $name . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('images', $imageFullName, 'public');
        }

        $product = Product::findOrFail($id);
        Product::where('id', $id)
            ->update([
                'name' => $request->get('name'),
                'description' => $request->get('description'),
                'store_id' => $request->get('store_id'),
                'base_price' => $request->get('base_price'),
                'discount_price' => $request->get('discount_price'),
                'image' => $filePath ?? $product->image,
                'is_discount' => $request->get('is_discount') ? 1 : 0,
            ]);

        return redirect()->back()->with('success', 'product Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Product::destroy($id);

        return redirect()->back()->with('success', 'Product Deleted Successfully');
    }

    public function restore($id)
    {
        Product::withTrashed()->findOrFail($id)->restore();

        return redirect()->back()->with('success', 'Product Restored Successfully');
    }
}