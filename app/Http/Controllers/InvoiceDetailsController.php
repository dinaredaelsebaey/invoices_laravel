<?php

namespace App\Http\Controllers;

use App\Models\Invoice_details;
use App\Models\Invoice;
use App\Models\Section;
use App\Models\Product;
use App\Models\Invoice_attachments;
use Illuminate\Http\Request;

class InvoiceDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices_details = Invoice_details::all();
        $invoices = Invoice::all();
        return view('invoicesDetails.show',[
            'invoices_details' => $invoices_details,
            'invoices' => $invoices,
        ]);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice_details $invoices_details,$id)
    {
        $invoices = Invoice::where('id',$id)->first();
        $invoices_details = Invoice_details::where('invoice_id',$id)->get();
        $invoices_attachment = Invoice_attachments::where('invoice_id',$id)->get();
        //dd($invoices_details);
        //dd($invoices_attachment);
        return view('invoicesDetails.show',[
            'invoices_details' => $invoices_details,
            'invoices' => $invoices,
            'invoices_attachment' => $invoices_attachment,
        ]);
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice_details $invoices_details)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice_details $invoices_details)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice_details $invoices_details)
    {
        //
    }
}