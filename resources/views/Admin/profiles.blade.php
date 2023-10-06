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
                  <th>{{__('Пользователь')}}</th>
                  <th>{{__('Прогресс')}}</th>
                  <th>{{__('Ответы')}}</th>
                  <th>{{__('Тренировки')}}</th>  
                  
                  <th class="text-center">{{__('Изменить статус')}}</th>
              </tr>
          </thead>
  
          <tbody>
              
              @foreach ($profiles as $item)
  
                  <tr>
                    <th>{{$item->id}}</td>
                    <th>
                        {{__('Логин: ')}}{{$item->login}}<br/>{{__('Email: ')}}{{$item->email}}
                    </th>                      
                    <td>
                        {{$item->profile->progress}}<br/>{{__('рейтинг: ')}}{{ $item->profile->rating}}
                    </td>
                    <td>
                        {{__('верно: ')}}{{$item->profile->correct_answer}}<br/>
                        {{__('неверно: ')}}{{ $item->profile->incorrect_answer}}
                    </td>  
                    <td>{{$item->profile->num_trainings}}</td>  

                    <td  class="text-center">  
                        <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.update.user.status', $item)}}">
                            @csrf  

                            <div class="mb-2 justify-content-center ">
                                <label  class="col-md-8 col-form-label text-md-start">{{__('Выберете значение')}}</label>
                                <div class="d-flex flex-row">
                                
                                    <select class="form-control" name="user_status">
                                            <option @if($item->profile->user_status === 'active') selected @endif value="{{\App\Enums\UserStatusEnum::ACTIVE->value}}"> 
                                                Active 
                                            </option>
                                            <option @if($item->profile->user_status === 'admin') selected @endif value="{{\App\Enums\UserStatusEnum::ADMIN->value}}"> 
                                                Admin 
                                            </option>
                                            <option @if($item->profile->user_status === 'blocked') selected @endif value="{{\App\Enums\UserStatusEnum::BLOCKED->value}}">
                                                Blocked
                                            </option>   
                                    </select>  
                                           
                                    @error("level_id")<p class="text-danger"> {{$message}}</p> @enderror               
                                    <button>{{__('Обновить')}}</button>
                                </div>
                            </div>
                                                 
                        </form>            
                      </td>
                 </tr>
                 @endforeach
  
          </tbody>
      </table>          
      
      <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>
  
  </div>
  

   
@endsection