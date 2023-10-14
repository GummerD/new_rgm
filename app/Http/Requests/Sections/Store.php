<?php

namespace App\Http\Requests\Sections;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;



class Store extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed> 
     * 
     */  


     
     public function rules():array
    {       
        return [
            'num_section'=> ['required', 'integer'],
            'name_section' => ['required','string', 'min:4','max:160'],
            'desc_section' => ['required','string', 'min:4','max:1500'],
            ];

    }   

    public function attributes():array
    {
        return [
            'num_section'=> 'нромер секции',
            'name_section' => 'название секции',
            'desc_section' => 'описание секции'           
        ];
    }
}


