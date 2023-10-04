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


<div class="admin_navigate" style="overflow: auto; max-height:60vh">
    
    <table class="table admin_table" >
        <thead class="admin_table_header">
            <tr>
                <th>ID</th>
                <th>{{__('Правило')}}</th>
                <th>{{__('Описание')}}</th>                
                <th class="text-center">Actions</th>
            </tr>
        </thead>

        <tbody>
            
            @foreach ($rules as $item)

                <tr>
                    <th> {{$item->id}}</td>
                    <td>{{$item->regex}}</td>
                    <td>{{$item->description}}</td>
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
    <div class="paginate" style=" width:600px; margin-top:20px"> {{ $rules->links() }}</div>
   
</div>

<a class ="" href="{{ url()->previous() }}">{{__('Обратно')}}</a>

@endsection