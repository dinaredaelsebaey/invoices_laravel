<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Invoice_details;
use App\Models\Invoice_attachment;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $products = Product::all();
        return view('invoices.create',[
            'invoices' => $invoices,
            'sections' => $sections,
            '$products' => $products,
        ]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'invoice_number' => 'required|string',
            'product_id' => 'required',
            'section_id' => 'required',
            'note'=>'string|min:20|nullable',
            'invoice_date' => 'required',
            'invoice_due_date' => 'required',
        ]);
        Invoice::create([
            "invoice_number" => $request->invoice_number,
            "product" => $request->product_id,
            "section_id" => $request->section_id,
            "invoice_date" => $request->invoice_date,
            "invoice_due_date" => $request->invoice_due_date,
            "discount" => $request->discount,
            "tax_rate" => $request->tax_rate,
            "tax_value" => $request->tax_value,
            "total" => $request->total,
            "note" => $request->note,
            "user" => Auth::user()->name,
            "amount_collection" => $request->amount_collection,
            "amount_commission" => $request->amount_commission,
            "payment_date" => $request->payment_date,
            "status" => 'غير مدفوعة',
            "invoice_status" => 0,
        ]);
        $invoice_id = Invoice::latest()->first()->id;
        Invoice_details::create([
            "invoice_id" => $invoice_id,
            "invoice_number" => $request->invoice_number,
            "product" => $request->product_id,
            "section" => $request->section_id,
            "notes" => $request->notes,
            "status" => 'غير مدفوعة',
            "status_value" => 0,
            "user" => Auth::user()->name,
        ]);
        return view('invoices.index');
    }

    public function getProduct($id)
{
    $products = DB::table('products')->where('section_id', $id)->pluck('product_name', 'id');
    return json_encode($products);

    }
}