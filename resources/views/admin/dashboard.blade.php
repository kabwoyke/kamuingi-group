@extends('app')


@section('title', 'Dashboard')


@section('content')


<x-admin-layout>
    <div class="header-text">
        <div class="heading">
            <h1 class="heading-primary">Hello , {{Auth()->user()->first_name}}</h1>
            <span class="sub-heading">Track members and donations</span>
        </div>

        <span class="date-text">
            <ion-icon name="calendar-outline"></ion-icon>
            {{date("d/m/Y")}}
        </span>
    </div>

    <div class="dashboard-cards">
        <div class="grid grid--3--cols gap-md">
            <a href="" class="admin-card member-card">
                <div class="icon-box">
                    <ion-icon class="icon member-icon" name="people-outline"></ion-icon>
                </div>
                <h3 class="card-title-heading">
                    Members
                    <span class="number-count">{{$members_count}}</span>
                </h3>

            </a>

            <a href="" class="admin-card deceased-card text-dark">
                <div class="icon-box">
                    <ion-icon class="icon" name="sad-outline"></ion-icon>
                </div>
                <h3 class="card-title-heading">
                    Deceased
                    <span class="number-count">{{$deceased_count}}</span>
                </h3>
            </a>

            <a href="" class="admin-card text-dark">
                <div class="icon-box">
                    <ion-icon class="icon" name="cash-outline"></ion-icon>
                </div>
                <h3 class="card-title-heading">
                    Donations
                    <span class="number-count" >Ksh<span id="donation-total">{{$total_ongoing_donations_total}}</span> </span>
                </h3>
            </a>
        </div>
    </div>

    <livewire:member-data-table/>



</x-admin-layout>



@push('scripts')

 @vite(['resources/js/app.js'])

@endpush

@push('styles')

@vite('resources/css/dashboard.css')

@endpush

@endsection

{{-- <h1>{{Auth()->user()}}</h1> --}}
