@extends('index')

@section('title')
    {{__('Кабинет администратора')}}
@endsection

@section('content')
    <div class="admin_content">
         <p>
           {{__("Создать уровни, группы, секции. Заполнять и сохранять по отдельности")}}
         </p>
    </div>
    
    <div class="bigBlock_levels">

        <div class="create_levels_block">
            <h5 style="color: cornsilk">Создать новый уровень</h5>
            <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.store.level')}}">
                @csrf  
                
                <div class="">
                    <label for="num_level" class="col-form-label text-md-end">{{ __('num level') }}</label>                    
                       <input  type="number" step="1" id="num_level" type="integer" class="form-control" name="num_level"
                           value="{{ old('num_level') }}" autofocus>   
                    @error("num_level")<p class="text-danger"> {{$message}}</p> @enderror 
                </div>
        
                <div class="">
                    <label for="name_level" class="col-form-label text-md-end">{{ __('name level') }}</label>
                        <input id="name_level" type="text" class="form-control mb-3"  name="name_level"
                            value="{{ old('name_level') }}">
                    @error("name_level")<p class="text-danger"> {{$message}}</p> @enderror
                </div>                
          
                <div class="">
                    <label for="desc_level" class="col-form-label">{{ __('description level') }}</label>
                        <textarea id="desc_level" type="text" class="form-control mb-3"  name="desc_level"
                              value="{{ old('desc_level') }}"></textarea>
                    @error("desc_level")<p class="text-danger"> {{$message}}</p> @enderror
                 </div>  
                  <div class="col-md-6">
                    <button type="submit" class="btn_reg_login">
                      {{ __('Создать') }}
                    </button>
                  </div>
              
              </form>
        </div>



        <div class="create_levels_block">
            <h5 style="color: cornsilk">Создать новую группу</h5>
            <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.store.group')}}">
                @csrf  
                
                <div class="">
                    <label for="num_group" class="col-form-label text-md-end">{{ __('num group') }}</label>                    
                       <input  type="number" step="1" id="num_group" type="integer" class="form-control" name="num_group"
                           value="{{ old('num_group') }}" autofocus>   
                    @error("num_group")<p class="text-danger"> {{$message}}</p> @enderror 
                </div>
        
                <div class="">
                    <label for="desc_group" class="col-form-label text-md-end">{{ __('description group') }}</label>
                        <textarea id="desc_group" type="text" class="form-control mb-3"  name="desc_group"
                            value="{{ old('desc_group') }}"></textarea>
                    @error("desc_group")<p class="text-danger"> {{$message}}</p> @enderror
                </div>  

                <div class="col-md-6">
                    <button type="submit" class="btn_reg_login">
                      {{ __('Создать') }}
                    </button>
                  </div>
              
              </form>
        </div>



        <div class="create_levels_block">
            <h5 style="color: cornsilk">Создать новую секцию</h5>
            <form style="color: rgb(41, 159, 114)" method="POST" action="{{ route('admin.store.section')}}">
                @csrf  
                
                <div class="">
                    <label for="num_section" class="col-form-label text-md-end">{{ __('num section') }}</label>                    
                       <input  type="number" step="1" id="num_section" type="integer" class="form-control" name="num_section"
                           value="{{ old('num_section') }}" autofocus>   
                    @error("num_section")<p class="text-danger"> {{$message}}</p> @enderror 
                </div>
        
                <div class="">
                    <label for="name_section" class="col-form-label text-md-end">{{ __('name_section') }}</label>
                        <input id="name_section" type="text" class="form-control mb-3"  name="name_section"
                            value="{{ old('name_section') }}">
                    @error("name_section")<p class="text-danger"> {{$message}}</p> @enderror
                </div>                
          
                <div class="">
                    <label for="desc_section" class="col-form-label">{{ __('description section') }}</label>
                        <textarea id="desc_section" type="text" class="form-control mb-3"  name="desc_section"
                              value="{{ old('desc_section') }}"></textarea>
                    @error("desc_section")<p class="text-danger"> {{$message}}</p> @enderror
                 </div>  
                  <div class="col-md-6">
                    <button type="submit" class="btn_reg_login">
                      {{ __('Создать') }}
                    </button>
                  </div>
              
              </form>

        </div>


    
    </div>
  
   <a class ="" href="{{url()->previous() }}">{{__('Обратно')}}</a>
   
@endsection