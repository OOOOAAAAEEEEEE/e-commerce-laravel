<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Order;
use Illuminate\Support\Str;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('main.store.index', [
            'title' => 'Store',
            'posts' => Store::latest()->paginate(12)->withQueryString(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('main.adminStore.create', [
            'title' => 'Add Your Product Here!',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStoreRequest $request)
    {
        $validatedData = $request->validate([
            'product' => 'required',
            'description' => 'required',
            'harga' => 'required',
        ]);

        $validatedData['product_code'] = "PRD-" . Str::random(9);

        Store::create($validatedData);

        return redirect('store')->with('success', 'Your item has been added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store, $product_code)
    {
        return view('main.store.show', [
            'title' => 'See details products here',
            'post' => $store->where('product_code', $product_code)->get(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store, $product_code)
    {
        return view('main.adminStore.edit', [
            'title' => 'Edit Your Post Here!',
            'post' => $store->where('product_code', $product_code)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStoreRequest  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStoreRequest $request, Store $store, $product_code)
    {
        $validatedData = $request->validate([
            'product' => 'required',
            'description' => 'required',
            'harga' => 'required',
        ]);

        $store->where('product_code', $product_code)->update($validatedData);

        return redirect('/store')->with('success', 'Your item has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store, $product_code)
    {
        $store->where('product_code', $product_code)->delete();

        return redirect('/store')->with('success', 'Your items has been deleted');
    }

    public function buyShow(Store $store, $product_code)
    {
        return view('main.store.buy', [
            'title' => 'Beli barang kuyyy',
            'post' => $store->where('product_code', $product_code)->get(),
        ]);
    }

    public function buyStore(StoreStoreRequest $request, Order $order, Store $store, $product_code)
    {
        $basePrice = $store->where('product_code', $product_code)->get();

        $validatedData = $request->validate([
            'product_code' => 'required',
            'total_harga' => 'required',
        ]);

        $validatedData['uuid_code'] = Str::orderedUuid();
        $validatedData['total_harga'] = $basePrice[0]->harga * $validatedData['total_harga'];
        $validatedData['status'] = 'waitConfirmation';

        $order->create($validatedData);

        return redirect('/store')->with('success', 'Your order has been added');
    }

    public function checkOrdersAdminIndex(Order $order)
    {
        return view('main.adminStore.checkOrders', [
            'title' => 'Waiting for your confirmation',
            'posts' => $order->where('status', 'waitConfirmation')->latest()->paginate(15),
        ]);
    }

    public function confirmOrders(UpdateStoreRequest $request, Order $order, $product_code)
    {
        $validatedData = $request->validate([
            'status' => 'required',
        ]);

        $order->where('product_code', $product_code)->update($validatedData);

        return redirect('/admin/checkOrders')->with('sucess', 'This item has been confirm');
    }

    public function checkHistoriesIndex(Order $order)
    {
        return view('main.adminStore.checkHistories', [
            'title' => 'Your history items',
            'posts' => $order->where('status', 'success')->latest()->paginate(15),
        ]);
    }
}
