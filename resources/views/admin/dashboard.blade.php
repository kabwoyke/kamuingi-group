@extends('app')


@section('title', 'Dashboard')


@section('content')

<div class="grid h-screen grid--2--cols">

    <aside class="align-v padding-sm">
        <div class="logo-box">
            <span class="logo-text">Kamuingi Group.</span>
        </div>

        <nav class="main-nav">

            <ul class="nav-list">
                <li><a href="" class="nav-link">
                    <ion-icon name="home-outline"></ion-icon>
                    Home
                </a></li>
                <li><a href="" class="nav-link">
                    <ion-icon name="people-outline"></ion-icon>
                    Members
                </a></li>
                <li>
                    <a href="" class="nav-link">
                    <ion-icon name="cash-outline"></ion-icon>
                    Donation
                </a></li>
                <div class="bottom-links">
                    <li >
                        <a href="" class="nav-link">
                            <ion-icon name="information-outline"></ion-icon>
                        Help & information
                    </a></li>

                    <li >
                        <a href="{{route('logout')}}" class="nav-link">
                            <ion-icon name="log-out-outline"></ion-icon>
                        Log Out
                    </a></li>

                </div>


            </ul>
        </nav>
    </aside>

    <main class="padding-sm">
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
                        <span class="number-count">13</span>
                    </h3>

                </a>

                <a href="" class="admin-card deceased-card text-dark">
                    <div class="icon-box">
                        <ion-icon class="icon" name="sad-outline"></ion-icon>
                    </div>
                    <h3 class="card-title-heading">
                        Deceased
                        <span class="number-count">13</span>
                    </h3>
                </a>

                <a href="" class="admin-card text-dark">
                    <div class="icon-box">
                        <ion-icon class="icon" name="people-outline"></ion-icon>
                    </div>
                    <h3 class="card-title-heading">
                        Members
                        <span class="number-count">13</span>
                    </h3>
                </a>
            </div>
        </div>


        <livewire:members/>

    </main>
</div>



@push('styles')

@vite('resources/css/dashboard.css')
@vite(['resources/css/app.css' , 'resources/js/app.js'])

@endpush
@endsection

{{-- <h1>{{Auth()->user()}}</h1> --}}
