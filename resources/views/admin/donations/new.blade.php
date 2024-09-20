@extends('app')

@section('title', 'Add Donations')

@section('content')

    <x-admin-layout>
        <section class="grid section-form grid--2--cols">

            <div class="form-container">
                <form action="{{ route('store_donation' , ['deceasedId'=>$deceasedId])}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="member">Member Number</label>
                        <input name="member_number" class="input" id="autoComplete" type="text" />
                        @if (session('invalid_member_number'))

                        <p class="mt-4 text-4xl font-medium text-red">{{session('invalid_member_number')}}</p>

                        @endif
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input name="amount" class="input" type="text" placeholder="Amount">
                    </div>

                    <div class="form-group">
                        <label for="date">Date</label>
                        <input name="date" class="input" type="date" placeholder="Date">
                    </div>

                    {{-- <div class="form-group">

                        <input type="text" name="deceacedId" value="{{$deceasedId}}" disabled placeholder="deceasedId">
                    </div> --}}

                    <button name="deceasedId" type="submit" class="btn-submit">Add Donation</button>
                </form>


                <img src="/Charity.png" alt="">

            </div>

        </section>
    </x-admin-layout>

    @push('styles')
        {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/css/autoComplete.min.css"> --}}
        @vite('resources/css/donations.css')
    @endpush

    @push('scripts')
        <script src="https://cdn.jsdelivr.net/npm/@tarekraafat/autocomplete.js@10.2.7/dist/autoComplete.min.js"></script>


        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const autoCompleteJS = new autoComplete({
                    selector: "#autoComplete",
                    placeHolder: "Search for a member...",
                    data: {
                        src: async (query) => {
                            try {
                                const source = await fetch(
                                    `http://localhost:8000/admin/donations/search/member/${query}`, {
                                        headers: {
                                            'Accept': 'application/json',
                                        },
                                    });

                                const data = await source.json();
                                console.log(data);
                                return data;
                            } catch (error) {
                                console.error("Error fetching data:", error);
                                return [];
                            }
                        },
                        keys: ["id_number", "first_name", "last_name" , 'member_number']
                    },
                    resultsList: {
                        element: (list, data) => {
                            if (!data.results.length) {
                                const message = document.createElement("div");
                                message.setAttribute("class", "no_result");
                                message.innerHTML = `<span>Found No Results for "${data.query}"</span>`;
                                list.prepend(message);
                            }
                        },
                        noResults: true,
                    },
                    resultItem: {
                        highlight: true,
                        element: (item, data) => {
                            item.innerHTML = `
                    <div>
                        <span style="font-weight: bold;">${data.value.member_number}</span> -
                        ${data.value.first_name} ${data.value.last_name}
                    </div>
                `;
                        }
                    },
                    events: {
                        input: {
                            selection: (event) => {
                                const selection = event.detail.selection.value;
                                autoCompleteJS.input.value = selection.member_number;
                                // document.getElementById('first_name').value = selection.first_name;
                                // document.getElementById('last_name').value = selection.last_name;
                            }
                        }
                    }
                });
            });
        </script>
    @endpush
@endsection
