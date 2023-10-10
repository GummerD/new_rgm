@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Изменить группы")}}
         </p>
    </div>
    
    <div class="bigBlock_levels">

        <div class="create_levels_block">
            <h5 style="color: cornsilk">Изменить группу</h5>
            <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.update.group', ['group'=>$group])}}">
                @csrf  
                
                <div class="">
                    <label for="num_group" class="col-form-label text-md-end">{{ __('Номер группы') }}</label>                    
                       <input  type="number" step="1" id="num_group" type="integer" class="form-control" name="num_group"
                           value="{{ $group->num_group }}" autofocus>   
                    @error("num_group")<p class="text-danger"> {{$message}}</p> @enderror 
                </div>
        
                <div class="">
                    <label for="desc_group" class="col-form-label text-md-end">{{ __('Описание группы') }}</label>
                        <textarea id="desc_group" type="text" class="form-control mb-3"  name="desc_group"
                            value="{{ $group->desc_group }}">{{ $group->desc_group }}</textarea>
                    @error("desc_group")<p class="text-danger"> {{$message}}</p> @enderror
                </div>  

                <div class="col-md-6">
                    <button type="submit" class="btn_reg_login">
                      {{ __('Изменить') }}
                    </button>
                  </div>
              
              </form>
        </div>

    
    </div>
  
   <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>
   
@endsection