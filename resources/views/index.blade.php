@extends('layouts.app')

@section('content')
    <div class="bg-gray-900 w-full">
        @livewire('basic-info')
        @livewire('job-list')
    </div>
@endsection