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
        $request->validate([
            'product_name'=>'string|required|unique:products',
            'notes'=>'string|min:20|nullable',
        ]);

        $product_name=$request->product_name;
        $section_id =$request->section_id;
        $notes=$request->notes;
        
        Product::create([
            'product_name'=>$product_name,
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
    public function edit(Product $product,$id)
    {
        $product = Product::findOrFail($id);
        $sections = Section::all();
        return view('products.edit',[
            'product' => $product,
            'sections' => $sections,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product,$id)
    {

        $request->validate([
            'product_name'=>'string|required',
            'notes'=>'string|min:20|nullable',
            'section_id' => 'required', 
        ]);
        
        $product_name=$request->product_name;
        $notes=$request->notes;
        $section_id = $request->section_id;
        
        Product::findOrFail($id)->update([
            'product_name'=>$product_name,
            'notes'=>$notes,
            'section_id'=>$section_id,   
         ]);
         return redirect(route('products.index'));   
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Product $product,$id)
    {
        Product::findOrFail($id)->delete();
        return redirect(route('products.index'));
    }
}