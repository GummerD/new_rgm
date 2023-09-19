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
            'login'=> ['nullable', 'string', 'min:2', 'max:150'],
            'password'=> ['nullable', 'string', 'min:4'],
            'current_password'=> ['nullable', 'string', 'current_password'],
            'email' => ['nullable', 'string','email', Rule::unique('users')->ignore($this->user->id)],          
            'avatar'=>['nullable', 'file'],
        ];
        
        }
    }