
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

        <div>
            <select wire:model.live="drive_status" class="filter-member">
                <option value="" disabled selected hidden>-- Filter By</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>
                {{-- <option value="penalized">Penalized</option> --}}
            </select>
        </div>

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
            <th>Status</th>
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
                <td>
                    @if ($donation->drive_status == 'ongoing')

                    <span class="status-active">{{$donation->drive_status}}</span>

                        @else
                        <span class="status-dead">{{$donation->drive_status}}</span>
                    @endif


                </td>
                <td>
                    @if ($donation->drive_status == "ongoing")
                         <a class="btn btn-primary" href="{{route('donation_form' , ['deceasedId' => $donation->id])}}">Donate</a>

                         @else

                         <a class="btn btn-primary" href="#">Donate</a>

                    @endif

                    <a class="btn btn-secondary" href="{{route('donation_progress_page' , ['deceasedId' => $donation->id])}}">View Progress</a>
                    <a class="btn btn-secondary" href="{{route('donation_progress_page' , ['deceasedId' => $donation->id])}}">Mark As Complete</a>
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






