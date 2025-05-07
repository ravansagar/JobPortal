@extends('layouts.base')

@section('content')
@auth
    <livewire:update-job :id="$id" />
@endauth
@endsection