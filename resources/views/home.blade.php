@extends('layouts.vendor')

@section('head')
<style>
    .cat {
        width: 500px;
    }
</style>
@endsection

@section('content')
<div class="min-vh-100 d-flex align-items-center justify-content-center">
    <img class="cat" src="{{ asset('img/cat-notice-edit.png') }}" alt="cat"/>
</div>
@endsection
