<?php

namespace App\Http\Requests\Tasks;


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
            'task_text' => ['required','string', 'min:6','max:2500'],
            'level_id' => ['required', 'exists:levels,id'],
            'group_id' => ['required', 'exists:groups_tasks,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'num_task' => ['required', 'integer'],
            'rule_use' => ['required', 'string','min:1','max:1500'],
            'correct_answer' => ['required', 'string','min:1','max:1500'],
            'string_task' => ['required', 'string','min:1','max:1500'],
        ];
       
    }   

    public function attributes():array
    {
        return [
            'task_text' =>"текст задачи",
            'level_id' =>"уровень сложности",
            'group_id' => "группа упражнений",
            'section_id' => 'секция',
            'num_task' => "номер задачи",
            'rule_use' => "правило",
            'correct_answer' => "верное решение",
            'string_task' => "строка задания",
            
        ];
    }

   
}

