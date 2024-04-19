<?php

namespace App\Http\Controllers;

use App\Models\DoctorOrder;
use App\Http\Requests\StoreDoctorOrderRequest;
use App\Http\Requests\UpdateDoctorOrderRequest;

class DoctorOrderController extends Controller
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
    public function store(StoreDoctorOrderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(DoctorOrder $doctorOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DoctorOrder $doctorOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDoctorOrderRequest $request, DoctorOrder $doctorOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DoctorOrder $doctorOrder)
    {
        //
    }
}
