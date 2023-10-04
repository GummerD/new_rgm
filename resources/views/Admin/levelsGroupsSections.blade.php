@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Уровни, группы, секции.")}}
         </p>
    </div>
    
   <div class="bigBlock_levels">

    
    <div class="admin_table_levels" style="overflow: auto; max-height:60vh">    
        <table class="table admin_table" >
            <p style="text-align: center">Уровни</p>
            <hr/>
            <thead class="admin_table_header">
                <tr>
                    <th>ID</th>
                    <th>{{__('Название уровня')}}</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>                
                @foreach ($levels as $item)    
                    <tr>
                        <th>{{$item->id}}</td>
                        <td>{{$item->name_level}}</td>                
                        <td  class="text-center">
                            <button class="delete" rel="{{$item->id}}" value="admin/level/delete">
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

    <div class="admin_table_levels_groups" style="overflow: auto; max-height:70vh">    
        <table class="table admin_table" >
            <p style="text-align: center">Группы</p>
            <hr/>
            <thead class="admin_table_header">
                <tr>
                    <th>ID</th>
                    <th>{{__('Описание группы')}}</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>                
                @foreach ($groups as $item)    
                    <tr>
                        <th>{{$item->id}}</td>
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

    <div class="admin_table_levels" style="overflow: auto; max-height:70vh">    
        <table class="table admin_table" >
            <p style="text-align: center">Секции</p>
            <hr/>
            <thead class="admin_table_header">
                <tr>
                    <th>ID</th>
                    <th>{{__('Название секции')}}</th>         
                    <th class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>                
                @foreach ($sections as $item)    
                    <tr>
                        <th>{{$item->id}}</td>
                        <td>{{$item->name_section}}</td>
                        <td  class="text-center">   
                            <button class="delete" rel="{{$item->id}}" value="admin/section/delete">
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
   </div>
  
   <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>
   
@endsection

@push('jsDel')
<script type="text/javascript" src="{{ asset("asset/js/delete.js") }}"></script>
@endpush