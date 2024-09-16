@extends('app')

@section('title' , 'Deceased Member')


@section('content')

<x-admin-layout>
   <div class="edit-form-container">
    <h1 class="heading-primary">Add Deceased Member</h1>

    <form action="{{route('add_deceased', ['id' => $member->id])}}" method="POST" >
        @csrf
        <div class="form-group">
            <label for="first_name">First Name</label>
            <input class="input" disabled value="{{$member->first_name}}" name="first_name" type="text" placeholder="First Name">
        </div>

        <div class="form-group">
            <label for="last_name">Last Name</label>
            <input class="input" disabled value="{{$member->last_name}}" type="text"  name="last_name" placeholder="Last Name">
        </div>

        <div class="form-group">
            <label for="last_name">ID Number</label>
            <input class="input" disabled value="{{$member->id_number}}" type="text" name="id_number" placeholder="ID number">
        </div>

        <div class="form-group">
            <label for="last_name">Death Date</label>
            <input class="input" type="date" value="" name="death_date" placeholder="phone_number">
        </div>

        <div class="form-group">
            <label for="last_name">DeadLine Date</label>
            <input class="input" type="date" value="" name="deadline_date" placeholder="phone_number">
        </div>


        <button class="btn-submit" type="submit">Add Deceased</button>
    </form>
   </div>
</x-admin-layout>


@push('styles')
@vite('resources/css/update.css')
@endpush

@endsection
