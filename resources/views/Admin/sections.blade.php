@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p  class = 'admin_page_title'>
           {{__("Секции")}}
         </p>
    </div>
    
   <div class="bigBlock_levels">
    
    <div class="admin_table_levels" style="overflow: auto; max-height:70vh; display:flex; flex-direction:column">    
        <table class="table admin_table" >
           
            <thead class="admin_table_header">
                <tr>
                    <th>ID</th>
                    <th>{{__('Номер секции')}}</th>
                    <th>{{__('Название секции')}}</th>
                    <th>{{__('Описание секции')}}</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>    
            <tbody>                
                @foreach ($sections as $item)    
                    <tr>
                        <th>{{$item->id}}</td>
                        <td>{{$item->num_section}}</td>  
                        <td>{{$item->name_section}}</td>  
                        <td>{{$item->desc_section}}</td>              
                        <td  class="text-center">
                            <button class="delete admin_delete_btn" rel="{{$item->id}}" value="admin/section/delete">
                                Delete
                            </button>
                                                           
                            <a class="admin_redact_btn" href="{{route('admin.edit.section', ['section'=> $item])}}">
                                Redact
                            </a>
                                                      
                        </td>
                   </tr>
                @endforeach   
            </tbody>
        </table>   
    </div>
   </div>
   <a class ="admin_page_back_btn" href="{{route('admin')}}">{{__('Обратно')}}</a>
   {{-- <a class ="admin_page_back_btn" href="{{url()->previous() }}">{{__('Обратно')}}</a> --}}
@endsection


@push('jsDel')
<script type="text/javascript" src="{{ asset("asset/js/delete.js") }}"></script>
@endpush