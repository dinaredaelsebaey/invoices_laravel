<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Section;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        return view('invoices.index');
    }
    public function create()
    {
        $invoices = Invoice::all();
        $sections = Section::all();
        return view('invoices.create',[
            'invoices' => $invoices,
            'sections' => $sections,
        ]);
    }
    public function store()
    {
        echo" hiii" ;
    }
}