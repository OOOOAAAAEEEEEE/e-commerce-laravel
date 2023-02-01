<?php

namespace App\Http\Controllers;

use App\Models\AdminStore;
use App\Http\Requests\StoreAdminStoreRequest;
use App\Http\Requests\UpdateAdminStoreRequest;

class AdminStoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAdminStoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdminStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AdminStore  $adminStore
     * @return \Illuminate\Http\Response
     */
    public function show(AdminStore $adminStore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AdminStore  $adminStore
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminStore $adminStore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAdminStoreRequest  $request
     * @param  \App\Models\AdminStore  $adminStore
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdminStoreRequest $request, AdminStore $adminStore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AdminStore  $adminStore
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminStore $adminStore)
    {
        //
    }
}
