@extends('app')

@section('title' , 'Donation Progress')

@section('content')
    <x-admin-layout>
        <p class="amount-container">
            <span class="currency">ksh</span> <span class="amount">{{$total}}</span>
        </p>
        <livewire:data-table deceasedId={{$deceasedId}} />
    </x-admin-layout>

@push('styles')
    @vite('resources/css/donation_progress.css')
@endpush

@push('scripts')
@vite('resources/js/show-donations.js')
@endpush
@endsection
