@extends('app')


@section('title', 'Add Deceased')


@section('content')
<x-admin-layout>
    <h1>Hello Dead</h1>
</x-admin-layout>
@endsection



@push('scripts')
 @vite(['resources/js/app.js'])
@endpush

@push('styles')
@vite('resources/css/dashboard.css')
@endpush
