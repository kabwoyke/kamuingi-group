<div>

    <div class="data-tbl-heading">
        <h1 class="heading-primary margin-top-sm">Ongoing Donations</h1>

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
            <th>ID Number</th>
            <th>Death Date</th>
            <th>Deadline Date</th>
            <th>Actions</th>
        </thead>

        <tbody>

            @foreach ($donations as $donation)
            <tr>
                <td>{{$donation->first_name}}</td>
                <td>{{$donation->last_name}}</td>
                <td>{{$donation->id_number}}</td>
                <td>{{$donation->death_date}}</td>
                <td>{{$donation->deadline_date}}</td>
                {{-- <td>
                    @if ($member->status == 'active')

                    <span class="status-active">{{$member->status}}</span>

                    @elseif ($member->status == 'penalized')
                        <span class="status-penalized">{{$member->status}}</span>

                        @else
                        <span class="status-dead">{{$member->status}}</span>
                    @endif


                </td> --}}


                <td>
                    <a class="btn btn-primary" href="{{route('donation_form' , ['id' => $donation->id])}}">Donate</a>
                    {{-- <a type="button" class="btn btn-primary">Update Member</a> --}}
                    {{-- <a href="#"  class="btn btn-danger" >Mark as Deceased</a> --}}
                    {{-- <a class="btn btn-danger">Mark as Deceased</a> --}}

                </td>
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






