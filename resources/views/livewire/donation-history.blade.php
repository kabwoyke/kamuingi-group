<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

    <div class="data-tbl-heading">
        <h1 class="heading-primary margin-top-sm">Donations History</h1>

        {{-- <div>
            <select wire:model.live="drive_status" class="filter-member">
                <option value="" disabled selected hidden>-- Filter By</option>
                <option value="ongoing">Ongoing</option>
                <option value="completed">Completed</option>

            </select>
        </div> --}}

        <span id="clock" class="clock"></span>
        <div class="search-input-container">
            <input wire:model.live="search" type="search" placeholder="Search By ID Number">
            <ion-icon class="search-icon" name="search-outline"></ion-icon>
        </div>

    </div>

    <div class="grid grid-columns-2 align-v date-range-container">

        <div class="form-group">
            <label for="from">From</label>
            <input type="date" wire:model="from" class="input" name="from" id="from">
        </div>

        <div>
            <label for="">To</label>
            <input class="input" wire:model.live="to" type="date" name="to" id="to">
        </div>

    </div>

    @if (count($donations) <= 0)
        <div class="alert">
            <p>Please pick a date range</p>
        </div>

    @else
        <table class="members">
            <thead>
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
                        <td>{{ $donation->first_name }}</td>
                        <td>{{ $donation->last_name }}</td>
                        <td>{{ $donation->id_number }}</td>
                        <td>{{ $donation->death_date }}</td>
                        <td>{{ $donation->deadline_date }}</td>
                        <td>
                            @if ($donation->drive_status == 'ongoing')
                                <span class="status-active">{{ $donation->drive_status }}</span>
                            @else
                                <span class="status-dead">{{ $donation->drive_status }}</span>
                            @endif


                        </td>
                        <td>
                            @if ($donation->drive_status == 'ongoing')
                                <a class="btn btn-primary"
                                    href="{{ route('donation_form', ['deceasedId' => $donation->id]) }}">Donate</a>
                            @else
                                <a class="btn btn-primary" href="#">Donate</a>
                            @endif

                            <a class="btn btn-secondary"
                                href="{{ route('donation_progress_page', ['deceasedId' => $donation->id]) }}">View
                                Progress</a>
                            <a class="btn btn-secondary"
                                href="{{ route('donation_progress_page', ['deceasedId' => $donation->id]) }}">Mark As
                                Complete</a>
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
    @endif



</div>
