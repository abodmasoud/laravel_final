<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $stores = Store::withTrashed()->paginate(4);


        return view('panel.store.index', [
            'stores' => $stores
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
        return view('panel.store.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'image' => 'required|image',
        ]);

        $name =  Str::random(10);
        $filePath = $name . '.' . $request->file('image')->getClientOriginalExtension();
        $imageFullName = $name . '.' . $request->file('image')->getClientOriginalExtension();
        $request->file('image')->storeAs('images', $imageFullName, 'public');


        Store::create([
            'name' => $request->get('name'),
            'address' => $request->get('address'),
            'image' => $filePath,
        ]);

        return redirect()->back()->with('success', 'Store Created Successfully');
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
        $store = Store::findOrFail($id);

        return view('panel.store.edit', compact('store'));
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
            'name' => 'required|string|min:3',
            'address' => 'required|string|min:3',
            'image' => 'sometimes|image',
        ]);

        $store = Store::findOrFail($id);

        $filePath = '';
        if ($request->file('image')) {
            $name =  Str::random(10);
            $filePath = $name . '.' . $request->file('image')->getClientOriginalExtension();
            $imageFullName = $name . '.' . $request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('images', $imageFullName, 'public');
        }

        $store->name = $request->get('name');
        $store->address = $request->get('address');
        if ($filePath) {
            $store->image = $filePath;
        }
        $store->save();

        return redirect()->route('stores.index')->with('success', 'Store Updated Successfully');
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
        Store::destroy($id);

        return redirect()->route('stores.index')->with('success', 'Store Deleted Successfully');
    }

    public function restore($id)
    {
        Store::withTrashed()->findOrFail($id)->restore();

        return redirect()->back()->with('success', 'Store Restored Successfully');
    }
}