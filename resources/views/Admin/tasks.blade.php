@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Список задач")}}
         </p>
    </div>
<div class="admin_navigate" style="overflow: auto; max-height:70vh">
    
    <table class="table admin_table" >
        <thead class="admin_table_header">
            <tr>
                <th>TASK KEY</th>
                <th>{{__('Описание')}}</th>
                <th>{{__('Связанные правила')}}</th>
                <th>{{__('Правильный ответ')}}</th>
                <th>{{__('Строка задачи')}}</th>
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            
            @foreach ($tasks as $item)

                <tr>
                    <th>{{$item->level_id}}/{{$item->section_id}}/{{$item->group_id}}/{{$item->num_task}}</td>
                    <td>{{$item->task_text}}</td>
                    <td>{{$item->rule_use}}</td>
                    <td>{{$item->correct_answer}}</td>
                    <th>{{$item->string_task}}</th>
                    
                    
                    <td  class="text-center">
                        <button >
                            Delete
                        </button>
                        
                        <a class="" href="">
                            Redact
                        </a>
                                              
                    </td>
               </tr>
            @endforeach

        </tbody>
    </table>          
    <div class="paginate" style=" width:600px; margin-top:20px"> {{ $tasks->links() }}</div>
    <a class ="" href="{{ url()->previous() }}">{{__('Обратно')}}</a>

</div>



@endsection