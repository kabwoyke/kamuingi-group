@extends('app')


@section('title' , 'Donations List')

@section('content')

    <x-admin-layout>
        {{-- <h1 class="heading-primary margin-top-sm">Hello Donations</h1> --}}
        <livewire:donation-data-table/>
    </x-admin-layout>
    @push('styles')
    @vite('resources/css/update.css')
    @endpush
@endsection
