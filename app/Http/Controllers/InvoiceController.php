<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function store()
    {
        echo" hiii" ;
    }

    public function getProduct($id)
{
    $products = DB::table('products')->where('section_id', $id)->pluck('product_name', 'id');
    return json_encode($products);

    }
}