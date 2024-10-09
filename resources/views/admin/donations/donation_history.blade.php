@extends('app')

@section('title' , 'Donation History')

@section('content')

<x-admin-layout>
    <livewire:donation-history/>
</x-admin-layout>

@push('styles')

@vite('resources/css/donation_history.css')
@vite('resources/css/general.css')

@endpush
@endsection
