<div>
    <div class="data-tbl-heading">
        <h1 class="heading-primary margin-top-sm">Members List</h1>
        <div class="search-input-container">
            <input wire:model.live="search" type="search" placeholder="Search Member">
            <ion-icon class="search-icon" name="search-outline"></ion-icon>
        </div>

    </div>

    <table class="members">
        <thead>
            <th>First Name</th>
            <th>Last Name</th>
            <th>ID Number</th>
            <th>Phone Number</th>
            <th>Status</th>
            <th>Total Missed Donations</th>
        </thead>

        <tbody>

            @foreach ($members as $member)
            <tr>
                <td>{{$member->first_name}}</td>
                <td>{{$member->last_name}}</td>
                <td>{{$member->id_number}}</td>
                <td>{{$member->phone_number}}</td>
                <td>{{$member->status}}</td>
                <td>{{$member->total_missed_donation}}</td>
            </tr>
            @endforeach

        </tbody>
    </table>
    <div class="pagination-container">
        <div>
        <label for="perPage" class="per-page-label">Total per page</label>
        <select wire:model.live="members_per_page" name="perPage" id="perPage" class="per-page">
        <option value="5">5</option>
        <option value="10">10</option>
        <option value="20">20</option>
        <option value="10">50</option>
    </select>
    </div>


    {{$members->links('vendor.livewire.simple')}}

    </div>

    @push('styles')
    @vite('resources/css/dashboard.css')
    @endpush
</div>
