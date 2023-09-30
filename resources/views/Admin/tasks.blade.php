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



    <div class="admin_navigate">
       @foreach ($tasks as $item)
           {{$item->level_id}}
           {{$item->section_id}}
           {{$item->group_id}}
           {{$item->num_task}}
           {{$item->task_text}}
           {{$item->rule_use}}
           {{$item->correct_answer}}
           {{$item->string_task}}
           <br/>
       @endforeach
    </div>
    <div class="paginate" style=" width:600px; margin-top:20px"> {{ $tasks->links() }}</div>
    
</div>


@endsection