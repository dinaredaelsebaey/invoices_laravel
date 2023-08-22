<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Section;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sections = Section::all();
        return view('sections.index',
        ['sections'=>$sections]);
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
            'section_name'=>'string|unique:sections',
            'description'=>'string|min:20|nullable',
            'created_by'=>'string|nullable',
         ],[
            'section_name.string' => 'من فضلك ادخل قسم مكون من حروف ',
            'section_name.unique' => 'لا يمكنك ادخال القسم مرتين من فضلك ادخل قسم اخر',
            'description.string' => 'من فضلك ادخل وصف مكون من حروف',
            'description.min' => 'من  فضلك ادخل وصف ادخل وصف لا يقل عن 20 حروف ',]);
            
            $section_name=$request->section_name;
            $description=$request->description;
            $created_by=Auth::user()->name;
         
         Section::create([
            'section_name'=>$section_name,
            'description'=>$description,
            'created_by'=>$created_by,
            
         ]);
         return redirect(route('sections.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section,$id)
    {
        $section = Section::findOrFail($id);
        return view('sections.show',['section'=>$section]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $section = Section::findOrFail($id);
        return view('sections.edit',['section'=>$section]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'section_name'=>'string',
            'description'=>'string|min:20|nullable',
         ],[
            'section_name.string' => 'من فضلك ادخل قسم مكون من حروف ',
            'description.string' => 'من فضلك ادخل وصف مكون من حروف',
            'description.min' => 'من  فضلك ادخل وصف ادخل وصف لا يقل عن 20 حروف ',]);
            
            $section_name=$request->section_name;
            $description=$request->description;
            
            Section::findOrFail($id)->update([
                'section_name'=>$section_name,
                'description'=>$description,

            ]);
            return redirect(route('sections.index',$id));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Section $section,$id)
    {
        Section::findOrFail($id)->delete();
        return redirect(route('sections.index'));
    }
}