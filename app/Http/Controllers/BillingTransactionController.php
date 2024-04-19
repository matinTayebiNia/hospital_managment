<?php

namespace App\Http\Controllers;

use App\Models\BillingTransaction;
use App\Http\Requests\StoreBillingTransactionRequest;
use App\Http\Requests\UpdateBillingTransactionRequest;

class BillingTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBillingTransactionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(BillingTransaction $billingTransaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BillingTransaction $billingTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBillingTransactionRequest $request, BillingTransaction $billingTransaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BillingTransaction $billingTransaction)
    {
        //
    }
}
