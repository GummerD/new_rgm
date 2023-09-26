<?php

namespace App\Http\Requests\Users;

use App\Enums\UserStatus;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;



class Edit extends FormRequest
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


    public function rules()
    {  
      return  [
            'login'=> ['nullable','string','min:2','max:150'],
            'password'=> ['nullable'],
            'current_password'=> ['nullable'],
            'email' => ['nullable','string','email', Rule::unique('users')->ignore($this->user->id)],          
            'path_img'=>['nullable','mimes:jpg,bmp,png,jpeg,svg'],
        ];
        
        }    }

        // 'image','mimes:jpg,bmp,png,jpeg,svg'