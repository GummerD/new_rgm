@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p  class = 'admin_page_title'> 
           {{__("Список задач")}}
         </p>
    </div>
<div class="admin_navigate" style="overflow: auto; max-height:60vh">
    
    <table class="table admin_table" >
        <thead class="admin_table_header">
            <tr>
                <th>{{__('id')}}</th>
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
                    <td>{{$item->id}}</td>
                    <th>{{$item->level_id}}/{{$item->section_id}}/{{$item->group_id}}/{{$item->num_task}}</td>
                    <td>{{$item->task_text}}</td>
                    <td>{{$item->rule_use}}</td>
                    <td>{{$item->correct_answer}}</td>
                    <th>{{$item->string_task}}</th>                  
                    
                    <td  class="text-center">
                        <button class="delete admin_delete_btn" rel="{{$item->id}}" value="admin/task/delete">
                            Delete
                        </button>
                        <a class="admin_redact_btn" href="{{route('admin.edit.task', ['task' => $item])}}">
                            Redact
                        </a>               
                    </td>
               </tr>
            @endforeach

        </tbody>
    </table>          
    <div class="paginate" style=" width:600px; margin-top:20px"> {{ $tasks->links() }}</div>   
</div>
<a class ="admin_page_back_btn" href="{{route('admin')}}">{{__('Обратно')}}</a>
{{-- <a class ="admin_page_back_btn" href="{{url()->previous() }}">{{__('Обратно')}}</a> --}}
@endsection

@push('jsDel')
<script type="text/javascript" src="{{ asset("asset/js/delete.js") }}"></script>
@endpush