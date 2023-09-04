<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Invoice_details;
use App\Models\Invoice_attachments;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::all();
        $sections = Section::all();
        $products = Product::all();
        return view('invoices.index',[
            'invoices' => $invoices,
            'sections' => $sections, 
            'products'=> $products 
        ]);
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
        'product' => 'required',
        'section_id' => 'required',
        'note' => 'string|min:20|nullable',
        'invoice_date' => 'required',
        'invoice_due_date' => 'required',
        'file' => 'nullable|mimes:JPG,jpg,png,pdf|max:2048',
    ]);

    // Save in invoices table
    $invoice = Invoice::create([
        "invoice_number" => $request->invoice_number,
        "product" => $request->product,
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

    // Save in invoice_details table
    $invoice_id = $invoice->id;
    Invoice_details::create([
        "invoice_id" => $invoice_id,
        "invoice_number" => $request->invoice_number,
        "product" => $request->product, // Save the product name instead of the ID
        "section" => $request->section_id,
        "notes" => $request->notes,
        "status" => 'غير مدفوعة',
        "status_value" => 0,
        "user" => Auth::user()->name,
    ]);

    // Save in invoice_attachments table
    if ($request->hasFile('file')) {
        $invoice_number = $request->invoice_number;
        $image = $request->file('file');
        $file_name = $image->getClientOriginalName();

        $invoices_attachment = new Invoice_attachments();

        $invoices_attachment->file_name = $file_name;
        $invoices_attachment->invoice_number = $invoice_number;
        $invoices_attachment->created_by = Auth::user()->name;
        $invoices_attachment->invoice_id = $invoice_id;

        $invoices_attachment->save();
        $ext = $image->getClientOriginalExtension();
        $image_name = uniqid() . ".$ext";
        $image->move(public_path('uploads/images' . $invoice_number), $image_name);
    }

    return view('invoices.index');
}

public function show(Invoice $invoice,$id)
{
    $invoice = Invoice::where('id',$id)->first();
    return view('invoices.status_update',[
        'invoice' => $invoice,
    ]);
   
}
public function status_update(Request $request, $id)
{
    $invoice = Invoice::findOrFail($id);
    if($invoice -> status === "مدفوعة" )
    {
        $invoice->update([
            'invoice_status' => 1,
            'status' => $request->status,
            'payment_date' => $request->payment_date, 
            
        ]);
        Invoice_details::create([
            "invoice_id" => $request->id,
            "invoice_number" => $request->invoice_number,
            "product" => $request->product, // Save the product name instead of the ID
            "section" => $request->section_id,
            "notes" => $request->notes,
            "status" => $request->status,
            "payment_date" => $request->payment_date,
            "status_value" => 1,
            "user" => Auth::user()->name,
        ]);
    }else
    {
        $invoice->update([
            'invoice_status' => 2,
            'status' => $request->status,
            'payment_date' => $request->payment_date, 
            
        ]);
        Invoice_details::create([
            "invoice_id" => $request->id,
            "invoice_number" => $request->invoice_number,
            "product" => $request->product, // Save the product name instead of the ID
            "section" => $request->section_id,
            "notes" => $request->notes,
            "status" => $request->status,
            "payment_date" => $request->payment_date,
            "status_value" => 2,
            "user" => Auth::user()->name,
        ]);
        
    }
    return redirect('/invoices');
    
}
public function invoice_paied(Request $request)
{
    
    $invoices = Invoice::where('invoice_status',1)->get();
    return view('invoices.paied',[
        'invoices' => $invoices,
    ]);

}
public function invoice_unPaied(Request $request)
{
    
    $invoices = Invoice::where('invoice_status',0)->get();
    return view('invoices.unPaied',[
        'invoices' => $invoices,
    ]);
}
    public function invoice_partial(Request $request)
{
    
    $invoices = Invoice::where('invoice_status',2)->get();
    return view('invoices.partial',[
        'invoices' => $invoices,
    ]);
}

    public function getProduct($id)
    {
        $products = DB::table('products')->where('section_id', $id)->pluck('product_name','id');
        return json_encode($products);
    }
}