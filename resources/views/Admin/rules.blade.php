@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Правила")}}
         </p>
    </div>

    <div class="admin_navigate">
       @foreach ($rules as $item)
           {{$item->id}}
           {{$item->regex}}
           {{$item->description}}
          
           <br/>
       @endforeach
    </div>
    <div class="paginate" style=" width:600px; margin-top:20px"> {{ $rules->links() }}</div>
    
</div>


@endsection