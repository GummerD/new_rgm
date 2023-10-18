@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p class = 'admin_page_title'>
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
                            <button class="delete admin_delete_btn" rel="{{$item->id}}" value="admin/group/delete">
                                Delete
                            </button>
                                                           
                            <a class=" admin_redact_btn" href="{{route('admin.edit.group', ['group' => $item])}}">
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