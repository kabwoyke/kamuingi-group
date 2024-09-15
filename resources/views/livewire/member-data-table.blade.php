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
            <th>Action</th>
        </thead>

        <tbody>

            @foreach ($members as $member)
            <tr>
                <td>{{$member->first_name}}</td>
                <td>{{$member->last_name}}</td>
                <td>{{$member->id_number}}</td>
                <td>{{$member->phone_number}}</td>
                <td>
                    @if ($member->status == 'active')

                    <span class="status-active">{{$member->status}}</span>

                    @elseif ($member->status == 'penalized')
                        <span class="status-penalized">{{$member->status}}</span>

                        @else
                        <span class="status-dead">{{$member->status}}</span>
                    @endif


                </td>
                <td>{{$member->total_missed_donation}}</td>


                <td>
                    <a class="btn btn-primary" href="">View Member</a>
                    <a type="button" class="btn btn-secondary modal-btn myBtn"   href="{{ route('update_form', ['id'=>$member->id]) }}">Update Member</a>
                    <a class="btn btn-danger" href="{{route('mark_deceased' , ["id" => $member->id])}}">Mark as Deceased</a>
                </td>
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



</div>



<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Some text in the Modal..</p>
  </div>

</div>

