@extends('app')

@section('title' , 'Add Donations')


@section('content')

<x-admin-layout>
    <section class="grid section-form grid--2--cols">

        <div class="form-container">
            <form action="">
                <div class="form-group">
                    <label for="member">MemberId</label>
                    <input class="input" type="text"  placeholder="MemberId">
                </div>
                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input class="input" type="text" placeholder="Amount">
                </div>

                <div class="form-group">
                    <label for="date">Date</label>
                    <input class="input" type="date" placeholder="Date">
                </div>

                <div class="form-group">

                    <input  type="text" hidden disabled placeholder="deceasedId">
                </div>

                <button type="submit" class="btn-submit">Add Donation</button>
            </form>


                <img src="/Charity.png" alt="">

        </div>

    </section>
</x-admin-layout>

@push('styles')

    @vite('resources/css/donations.css')
    @endpush
@endsection
