@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Уровни")}}
         </p>
    </div>
    
   <div class="bigBlock_levels">
    
    <div class="admin_table_levels" style="overflow: auto; max-height:70vh">    
        <table class="table admin_table" >
           
            <thead class="admin_table_header">
                <tr>
                    <th>ID</th>
                    <th>{{__('Номер уровня')}}</th>
                    <th>{{__('Название уровня')}}</th>
                    <th>{{__('Описание уровня')}}</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>                
                @foreach ($levels as $item)    
                    <tr>
                        <th>{{$item->id}}</td>
                        <td>{{$item->num_level}}</td>  
                        <td>{{$item->name_level}}</td>  
                        <td>{{$item->desc_level}}</td>              
                        <td  class="text-center">
                            <button class="delete" rel="{{$item->id}}"  value="admin/level/delete">
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
        <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a> 
    </div>
@endsection


@push('jsDel')
<script type="text/javascript" src="{{ asset("asset/js/delete.js") }}"></script>
@endpush