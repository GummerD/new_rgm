<?php

namespace App\Http\Requests\Tasks;


use Illuminate\Foundation\Http\FormRequest;


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
     */

     
    public function rules():array
    {       
      
        return [
            'level_id' => ['required', 'exists:levels,id'],
            'group_id' => ['required', 'exists:groups_tasks,id'],
            'section_id' => ['required', 'exists:sections,id'],
            'num_tasks' => ['required', 'integer'],
            'task_text' => ['required','string', 'min:6','max:500'],
            'rule_use' => ['required', 'string','min:1','max:100'],
            'correct_answer' => ['required', 'string','min:1','max:100'],
            'string_task' => ['required', 'string','min:1','max:100'],
        ];

    }


}

