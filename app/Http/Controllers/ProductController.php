<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $sections = Section::all();
        return view('products.index',[
            'products' => $products,
            'sections' => $sections,
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
        // $section_id = Section::where('section_name',$request->section_name)->first()->id;
        $request->validate([
            'product_name'=>'string|required|unique:products',
            'notes'=>'string|min:20|nullable',
        ]);

        $product_name=$request->product_name;
        $section_name=$request->section_name;
        $section_id =$request->section_id;
        $notes=$request->notes;
        
        Product::create([
            'product_name'=>$product_name,
            'section_name'=>$section_name,
            'notes'=>$notes,
            'section_id'=>$section_id,
            
         ]);
         return redirect(route('products.index'));
    }

    

    /**
     * Display the specified resource.
     */
    public function show(Product $product,$id)
    {
        $section = Section::findOrFail($id);
        $product = Product::findOrFail($id);
        return view('products.show',[
            'product'=>$product,
            'section' => $section,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }
}