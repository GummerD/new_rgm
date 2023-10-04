@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Изменить уровни")}}
         </p>
    </div>
    
    <div class="bigBlock_levels">

        <div class="create_levels_block">
            <h5 style="color: cornsilk">Изменить уровень</h5>
            <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.update.level',['level'=>$level])}}">
                @csrf  
                
                <div class="">
                    <label for="num_level" class="col-form-label text-md-end">{{ __('num level') }}</label>                    
                       <input  type="number" step="1" id="num_level" type="integer" class="form-control" name="num_level"
                           value="{{ $level->num_level }}" autofocus>   
                    @error("num_level")<p class="text-danger"> {{$message}}</p> @enderror 
                </div>
        
                <div class="">
                    <label for="name_level" class="col-form-label text-md-end">{{ __('name level') }}</label>
                        <input id="name_level" type="text" class="form-control mb-3"  name="name_level"
                            value="{{ $level->name_level }}">
                    @error("name_level")<p class="text-danger"> {{$message}}</p> @enderror
                </div>                
          
                <div class="">
                    <label for="desc_level" class="col-form-label">{{ __('description level') }}</label>
                        <textarea id="desc_level" type="text" class="form-control mb-3"  name="desc_level"
                              value="{{ $level->desc_level }}">{{ $level->desc_level }}</textarea>
                    @error("desc_level")<p class="text-danger"> {{$message}}</p> @enderror
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