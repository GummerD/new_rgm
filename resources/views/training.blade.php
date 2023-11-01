@extends('index')

@section('training')

@endsection

@section('content')

<div id="trainingBlock" class="trainingBlock">

    <label for="sourceText">{{__('Внесите сюда текст')}}</label>
    <textarea name="sourceText" id="sourceText" cols="" rows="" class="sourceText"></textarea>

    <label for="regexTrainig">{{__('Напишите Ваше регулярное выражение')}}</label>
    <input type="text" name="regexTrainig" id="regexTraining" class = 'regexTraining'>

    <button id = "btn_training_apply" class="btn_training_apply">{{__("Применить")}}</button>

    <div class="inputResult" id="inputResult"></div>


</div>  




@endsection

@push('jsTraining')
<script type="text/javascript" src="{{ asset("asset/js/trainingReg.js") }}"></script>
@endpush