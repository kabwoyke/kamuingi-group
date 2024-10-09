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

        <div class="search-input-container">
            <input wire:model.live="search" type="search" placeholder="Search By ID Number">
            <ion-icon class="search-icon" name="search-outline"></ion-icon>
        </div>

    </div>

    <div class="grid grid-columns-2 align-v date-range-container">

        <div class="form-group">
            <label for="from">From</label>
            <input type="date" class="input" name="from" id="from">
        </div>

        <div>
            <label for="">To</label>
            <input class="input" type="date" name="to" id="to">
        </div>

    </div>
</div>
