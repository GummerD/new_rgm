@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Пользователи сервиса")}}
         </p>
    </div>
    
    <div class="admin_navigate" style="overflow: auto; max-height:60vh">
    
      <table class="table admin_table" >
          <thead class="admin_table_header">
              <tr>
                  <th>ID</th>
                  <th>{{__('Логин')}}</th>
                  <th>{{__('Email')}}</th>
                  <th>{{__('Статус')}}</th>
                  <th>{{__('Прогресс')}}</th>
                  <th class="text-center">Actions</th>
              </tr>
          </thead>
  
          <tbody>
              
              @foreach ($profiles as $item)
  
                  <tr>
                      <th>{{$item->id}}</td>
                      <td>{{$item->login}}</td>
                      <td>{{$item->email}}</td>
                      <th>{{$item->profile->user_status}}</th>
                      <td>{{$item->profile->progress}}</td>
                      
                      
                      <td  class="text-center">
                                                 
                          <a class="" href="">
                              Look
                          </a>
                                                
                      </td>
                 </tr>
              @endforeach
  
          </tbody>
      </table>          
      
      <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>
  
  </div>
  

   
@endsection