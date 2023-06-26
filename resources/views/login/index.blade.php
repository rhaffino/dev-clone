@extends('layouts.app')

@section('title', '-')
@section('meta-desc', '-')

@section('styles')
    @include('login.component.style')
@endsection

@section('content')
    @include('login.component.auth_google')
@endsection

@push('scripts')
    <script>
        let elmToastSuccess = document.getElementById('toast-success');
        let elmToastError = document.getElementById('toast-error');


       if('{{session()->get('messageChange')}}'){
        if('{{session()->get('statusChange')}}' == 'success'){
            elmToastSuccess.querySelector(".message").innerHTML = '{{session()->get('messageChange')}}';
            elmToastSuccess.style.display = "block";
            setTimeout(function () {
                elmToastSuccess.style.display = "none";
            }, 3000);
        }else{
            elmToastError.querySelector(".message").innerHTML = '{{session()->get('messageChange')}}';
            elmToastError.style.display = "block";
            setTimeout(function () {
                elmToastError.style.display = "none";
            }, 3000);
        }
       }
    </script>
@endpush
