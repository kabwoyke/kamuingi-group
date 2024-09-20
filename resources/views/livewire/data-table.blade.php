<div>

    <div class="data-tbl-heading">
        <h1 class="heading-primary margin-top-sm">Donations List</h1>

        {{-- <div>
            <select  class="filter-member">
                <option value="" disabled selected hidden>-- Filter By</option>
                <option value="all">All</option>
                <option value="dead">Deceased</option>
                <option value="penalized">Penalized</option>
            </select>
        </div> --}}

        <div class="search-input-container">
            <input wire:model.live="search" type="search" placeholder="Search By ID Number">
            <ion-icon class="search-icon" name="search-outline"></ion-icon>
        </div>



    </div>

    <table class="members">
        <thead >
            <th>First Name</th>
            <th>Last Name</th>
            <th>Member Number</th>
            <th>Phone Number</th>
            <th>Amount</th>
            {{-- <th>Actions</th> --}}
        </thead>

        <tbody>

            @foreach ($donations as $donation)
            <tr>
                <td>{{$donation->first_name}}</td>
                <td>{{$donation->last_name}}</td>
                <td>{{$donation->member_number}}</td>
                <td>{{$donation->phone_number}}</td>
                <td>{{$donation->amount}}</td>
                {{-- <td>
                    @if ($member->status == 'active')

                    <span class="status-active">{{$member->status}}</span>

                    @elseif ($member->status == 'penalized')
                        <span class="status-penalized">{{$member->status}}</span>

                        @else
                        <span class="status-dead">{{$member->status}}</span>
                    @endif


                </td> --}}


                {{-- <td>
                    <a class="btn btn-primary" href="{{route('donation_form' , ['deceasedId' => $donation->id])}}">Donate</a>
                    <a class="btn btn-secondary" href="{{route('donation_progress_page' , ['deceasedId' => $donation->id])}}">View Progress</a>


                </td> --}}
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="pagination-container">
        <div>
        <label for="perPage" class="per-page-label">Total per page</label>
        <select wire:model.live="perPage" name="perPage" id="perPage" class="per-page">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="10">50</option>
    </select>
    </div>


    {{-- {{$members->links('vendor.livewire.simple')}} --}}

    </div>



</div>
