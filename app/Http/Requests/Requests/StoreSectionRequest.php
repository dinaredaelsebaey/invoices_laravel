<?php

namespace App\Http\Requests\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSectionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return 
        [
            'section_name'=>'string|unique:sections',
            'description'=>'string|min:20|nullable',
            'created_by'=>'string|nullable',
        ];
        
    }

    public function messages()
    {
        return
         [
            'section_name.string' => 'من فضلك ادخل قسم مكون من حروف ',
            'section_name.unique' => 'لا يمكنك ادخال القسم مرتين من فضلك ادخل قسم اخر',
            'description.string' => 'من فضلك ادخل وصف مكون من حروف',
            'description.min' => 'من  فضلك ادخل وصف ادخل وصف لا يقل عن 20 حروف ',
         ];
    }
}