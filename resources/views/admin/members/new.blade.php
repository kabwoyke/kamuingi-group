@extends('app')

@section('title' , 'Member Detail')

@section('content')
    <x-admin-layout>
        <h1 class="heading-primary">Add Member</h1>
        <hr class="gradient-line">

        <section>
            <div class="profile-img-container">

                <div>
                    <form action="{{ route('store_member') }}" method="POST" >
                        @csrf

                        <div class="grid grid--form--2 form-group-grid">

                        <div class="form-group">
                            <label for="first_name">First Name</label>
                            <input  class="input"  name="first_name" type="text" placeholder="First Name">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last Name</label>
                            <input  class="input"  type="text"  name="last_name" placeholder="Last Name">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="member_number">Member Number</label>
                        <input  class="input" type="text" name="member_number" placeholder="Member Number">
                    </div>
                        <div class="form-group">
                            <label for="last_name">ID Number</label>
                            <input  class="input"  type="text" name="id_number" placeholder="ID number">
                        </div>

                        <div class="form-group">
                            <label for="last_name">Phone Number</label>
                            <input  class="input" type="text" name="phone_number" placeholder="phone_number">
                        </div>

                        <div class="form-group">
                            <label for="status">Status</label>
                            <select  class="input select" name="status" id="status">
                                <option value="active" >Active</option>
                                <option value="penalized" >Penalized</option>
                                <option value="dead" >Dead</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="gender">Gender</label>
                            <select  class="input select" name="gender" id="gender">
                                <option value="MALE" >Male</option>
                                <option value="FEMALE" >Female</option>

                            </select>
                        </div>


                        <div class="form-group">
                            <label for="missed">Total Missed Donation</label>
                            <input  name="total_missed_donation" class="input" type="number" placeholder="Total Missed Donation">
                        </div>

                        {{-- <div class="delete-container">
                            <h3 class="text-danger">Delete Account</h3>
                            <p>Are you sure you want to delete the user?</p>
                        </div> --}}

                        <button class="flex items-center btn-submit row" type="submit">
                            <ion-icon name="person-add-outline"></ion-icon>
                            Add Member
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
