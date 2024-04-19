<?php

namespace App\Http\Controllers;

use App\Models\MedicalCertificate;
use App\Http\Requests\StoreMedicalCertificateRequest;
use App\Http\Requests\UpdateMedicalCertificateRequest;

class MedicalCertificateController extends Controller
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
    public function store(StoreMedicalCertificateRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(MedicalCertificate $medicalCertificate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MedicalCertificate $medicalCertificate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMedicalCertificateRequest $request, MedicalCertificate $medicalCertificate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MedicalCertificate $medicalCertificate)
    {
        //
    }
}
