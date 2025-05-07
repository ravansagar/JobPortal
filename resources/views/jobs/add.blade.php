@extends('layouts.base')

@section('content')
@auth
    @livewire('create-job')
@endauth
@endsection