<?php

namespace App\Http\Requests\Levels;


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
            'num_level'=> ['required', 'integer'],
            'name_level' => ['required','string', 'min:4','max:160'],
            'desc_level' => ['required','string', 'min:4','max:1500'],
        ];

    }   

    public function attributes():array
    {
        return [
            'num_level'=> 'нромер уровня',
            'name_level' => 'название уровня',
            'desc_level' => 'описание уровня'           
        ];
    }
}


