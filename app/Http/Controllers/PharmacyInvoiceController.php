<?php

namespace App\Http\Controllers;

use App\Models\PharmacyInvoice;
use App\Http\Requests\StorePharmacyInvoiceRequest;
use App\Http\Requests\UpdatePharmacyInvoiceRequest;

class PharmacyInvoiceController extends Controller
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
    public function store(StorePharmacyInvoiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PharmacyInvoice $pharmacyInvoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PharmacyInvoice $pharmacyInvoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePharmacyInvoiceRequest $request, PharmacyInvoice $pharmacyInvoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PharmacyInvoice $pharmacyInvoice)
    {
        //
    }
}
