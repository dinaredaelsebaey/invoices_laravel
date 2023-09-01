<?php

namespace App\Http\Controllers\Api;
use App\Models\Section;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\Requests\StoreSectionRequest;
use Illuminate\Http\Request;

class SectionController extends Controller
{
    public function index()
    {
        $sections = Section::all();
        return $sections;
    }
    public function show($id)
    {
        $section = Section::findOrFail($id);
        return $section ; 
 
    }
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
         
            return Section::create([
            'section_name'=>$section_name,
            'description'=>$description,
            'created_by'=>$created_by,
            
         ]);
         
    }
    
}