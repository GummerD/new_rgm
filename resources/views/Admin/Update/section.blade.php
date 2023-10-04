@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Изменить секции")}}
         </p>
    </div>
    
    <div class="bigBlock_levels">

      
        <div class="create_levels_block">
            <h5 style="color: cornsilk">{{__('Изменить секцию')}}</h5>
            <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.update.section',  $section)}}">
                @csrf  
                
                <div class="">
                    <label for="num_section" class="col-form-label text-md-end">{{ __('num section') }}</label>                    
                       <input  type="number" step="1" id="num_section" type="integer" class="form-control" name="num_section"
                           value="{{ $section->num_section }}" autofocus>   
                    @error("num_section")<p class="text-danger"> {{$message}}</p> @enderror 
                </div>
        
                <div class="">
                    <label for="name_section" class="col-form-label text-md-end">{{ __('name_section') }}</label>
                        <input id="name_section" type="text" class="form-control mb-3"  name="name_section"
                            value="{{ $section->name_section }}">
                    @error("name_section")<p class="text-danger"> {{$message}}</p> @enderror
                </div>                
          
                <div class="">
                    <label for="desc_section" class="col-form-label">{{ __('description section') }}</label>
                        <textarea id="desc_section" type="text" class="form-control mb-3"  name="desc_section"
                              value="{{ $section->desc_section }}">{{ $section->desc_section }}</textarea>
                    @error("desc_section")<p class="text-danger"> {{$message}}</p> @enderror
                 </div>  
                  <div class="col-md-6">
                    <button type="submit" class="btn_reg_login">
                      {{ __('Изменение') }}
                    </button>
                  </div>
              
              </form>

        </div>


    
    </div>
  
   <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>
   
@endsection