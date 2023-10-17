@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p  class = 'admin_page_title'>
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
                    <th>{{$item->id}}</td>
                    <td>{{$item->regex}}</td>
                    <td>{{$item->description}}</td>
                    <td  class="text-center">
                        <button class="delete admin_delete_btn" rel="{{$item->id}}" value="admin/delete/rule">
                            Delete
                        </button>
                        
                        <a class="admin_redact_btn" href="{{route('admin.edit.rule', $item)}}">
                            Redact
                        </a>
                                              
                    </td>
               </tr>
            @endforeach

        </tbody>
    </table>          
    <div class="paginate" style=" width:600px; margin-top:20px"> {{ $rules->links() }}</div>
   
</div>

<a class ="admin_page_back_btn" href="{{route('admin')}}">{{__('Обратно')}}</a>
{{-- <a class ="admin_page_back_btn" href="{{url()->previous() }}">{{__('Обратно')}}</a> --}}

@endsection

@push('jsDel')
<script type="text/javascript" src="{{ asset("asset/js/delete.js") }}"></script>
@endpush