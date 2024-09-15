@extends('app')

@section('title' , 'Update Member')


@section('content')

<x-admin-layout>
   <div class="edit-form-container">
    <h1 class="heading-primary">Update Member</h1>

    <form action="{{ route('update', ['id'=>$member->id]) }}" method="post" >
        @csrf
        @method('PATCH')
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input class="input" value="{{$member->first_name}}" name="first_name" type="text" placeholder="First Name">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input class="input" value="{{$member->last_name}}" type="text"  name="last_name" placeholder="Last Name">
        </div>

        <div class="form-group">
            <label for="last_name">ID Number</label>
            <input class="input" value="{{$member->id_number}}" type="text" name="id_number" placeholder="ID number">
        </div>

        <div class="form-group">
            <label for="last_name">Phone Number</label>
            <input class="input" type="text" value="{{$member->phone_number}}" name="phone_number" placeholder="phone_number">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="input select" name="status" id="status">
                <option value="active">ACTIVE</option>
                <option value="penalized">PENALIZED</option>
                <option value="dead">DEAD</option>
            </select>
        </div>

        <div class="form-group">
            <label for="missed">Total Missed Donation</label>
            <input value="{{$member->total_missed_donation}}" class="input" type="number" placeholder="Total Missed Donation">
        </div>


        <button class="btn-submit">Update</button>
    </form>
   </div>
</x-admin-layout>


@push('styles')
@vite('resources/css/update.css')
@endpush

@endsection
