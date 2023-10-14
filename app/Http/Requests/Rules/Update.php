<?php

namespace App\Http\Requests\Rules;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;



class Update extends FormRequest
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
            'num_rule'=> ['required', 'integer'],
            'regex' => ['required','string', 'min:4','max:160'],
            'description' => ['required','string', 'min:4','max:1500'],
        ]; 
        

    }   

    public function attributes():array
    {
        return [
            'num_rule'=> 'нромер правила',
            'regex' => 'правило',
            'description' => 'описание правила'           
        ];
    }
}


