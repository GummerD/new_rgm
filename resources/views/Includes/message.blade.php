@if(session()->has('success'))
    <x-alert type="success"  :message="session()->get('success')"></x-alert>
@elseif(session()->has('error'))
    <x-alert type="danger"  :message="session()->get('error')"></x-alert>
@endif


{{-- <x-dynamic-component :component="$type" message="$message"></x-dynamic-component> --}}

 {{-- <x-alert :type="request()->get('type')" :message="request()->get->('$message')"></x-alert>
   
   <x-alert type="warning" message="$message"></x-alert>
   <x-alert type="info"  message="$message"></x-alert>
   <x-alert type="danger"  message="$message"></x-alert>
   <x-alert type="alert" message="$message"></x-alert>  --}}