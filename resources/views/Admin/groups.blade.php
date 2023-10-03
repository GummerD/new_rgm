@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Группы")}}
         </p>
    </div>
    
   <div class="bigBlock_levels" style="display: flex; flex-direction:column">
    
    <div class="admin_table_levels" style="overflow: auto; max-height:60vh">    
        <table class="table admin_table" >
           
            <thead class="admin_table_header">
                <tr>
                    <th>ID</th>
                    <th>{{__('Номер группы')}}</th>
                    <th>{{__('Описание')}}</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>                
                @foreach ($groups as $item)    
                    <tr>
                        <th>{{$item->id}}</td>
                        <td>{{$item->num_group}}</td>  
                        <td>{{$item->desc_group}}</td>              
                        <td  class="text-center">
                            <button class="delete" rel="{{$item->id}}" value="admin/group/delete">
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
        
    </div>
    <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>   
   </div>
   
@endsection


@push('jsDel')
<script type="text/javascript" src="{{ asset("asset/js/delete.js") }}"></script>
@endpush