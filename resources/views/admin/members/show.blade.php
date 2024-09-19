@extends('app')

@section('title' , 'Member Detail')

@section('content')
    <x-admin-layout>
        <h1 class="heading-primary">Member Info</h1>
        <hr class="gradient-line">

        <section>
            <div class="profile-img-container">
                @if ($member->gender == 'MALE')
                <img class="img" src="/male.jpg" alt="#">
                @else
                <img class="img" src="/female.jpg" alt="#">
                @endif
                <hr class="gradient-line">

                <div>
                    <form action="" method="POST" >
                        @csrf

                        <div class="grid grid--form--2 form-group-grid">

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input disabled class="input" value="{{$member->first_name}}" name="first_name" type="text" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input disabled class="input" value="{{$member->last_name}}" type="text"  name="last_name" placeholder="Last Name">
                        </div>
                    </div>
                        <div class="form-group">
                            <label for="last_name">ID Number</label>
                            <input disabled class="input" value="{{$member->id_number}}" type="text" name="id_number" placeholder="ID number">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Phone Number</label>
                            <input disabled class="input" type="text" value="{{$member->phone_number}}" name="phone_number" placeholder="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select disabled class="input select" name="status" id="status">
                                <option >{{$member->status}}</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="missed">Total Missed Donation</label>
                            <input value="{{$member->total_missed_donation}}" disabled name="total_missed_donation" class="input" type="number" placeholder="Total Missed Donation">
                        </div>

                        {{-- <div class="delete-container">
                            <h3 class="text-danger">Delete Account</h3>
                            <p>Are you sure you want to delete the user?</p>
                        </div> --}}

                        <button class="btn-delete" type="submit">
                            Delete Member
                            <ion-icon name="trash-outline"></ion-icon>
                        </button>
                    </form>
                </div>
            </div>
        </section>
    </x-admin-layout>

@push('styles')
@vite('resources/css/member_detail.css')
@vite('resources/css/update.css')
@endpush
@endsection
