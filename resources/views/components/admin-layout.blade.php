<div class="grid h-screen grid--2--cols">

    <aside class="align-v padding-sm">
        <div class="logo-box">
            <span class="logo-text">Kamuingi Group.</span>
        </div>

        <nav class="main-nav">

            <ul class="nav-list">
                <li>
                    <a href="/admin" class="nav-link">
                        <span class="nav--link--inner">
                            <div class="nav--link--inner-content">
                                <ion-icon name="home-outline"></ion-icon>
                                Home
                            </div>
                        </span>

                </a></li>
                <li>
                <a href="#"  class="nav-link" id="member_link">
                    <span class="nav--link--inner">
                        <div class="nav--link--inner-content">
                            <ion-icon name="people-outline"></ion-icon>
                            Members
                        </div>

                        <ion-icon  name="chevron-down-outline"></ion-icon>
                    </span>


                </a>

                <div class="dropdown" id="dropdown">
                    <ul class="nav-list-dropdown">
                        <li style="margin-bottom: 1.2rem;"><a href="{{ route('add_member_form') }}" class="nav-link margin-left-4">
                            <ion-icon name="person-add-outline"></ion-icon>
                            Add Member
                        </a>
                        </li>
                        <li>
                            <a href="/admin" class="flex nav-link margin-left-4" style="align-items: center; gap: 1rem">
                            <ion-icon name="list-outline"></ion-icon>
                            List Member
                        </a>
                    </li>
                    </ul>
                </div>
            </li>
                <li>


                    <a href="#" class="nav-link" id="donation_link">
                        <span class="nav--link--inner">
                            <div class="nav--link--inner-content">
                                <ion-icon name="cash-outline"></ion-icon>
                                Donation
                            </div>

                            <ion-icon  name="chevron-down-outline"></ion-icon>
                        </span>

                </a>

                <div class="donation_dropdown" id="donation-dropdown">
                    <ul class="nav-list-dropdown">

                        <li>
                            <a href="{{ route('donation_page') }}" class="flex nav-link margin-left-4" style="align-items: center; gap: 1rem">
                            <ion-icon name="list-outline"></ion-icon>
                            List Donations
                        </a>
                    </li>

                        <li style="margin-top: 1.2rem;">
                            <a href="{{ route('donation_history') }}" class="flex nav-link margin-left-4">
                            <ion-icon name="calendar-outline"></ion-icon>
                            Donation History
                        </a>
                        </li>

                    </ul>
                </div>
            </li>
                <div class="bottom-links">
                    <li >
                        <a href="" class="nav-link">
                            <ion-icon name="information-outline"></ion-icon>
                        Help & information
                    </a></li>

                    <li >
                        <a href="{{route('logout')}}" class="nav-link">
                            <ion-icon name="log-out-outline"></ion-icon>
                        Log Out
                    </a></li>

                </div>


            </ul>
        </nav>
    </aside>

    <main class="padding-sm">
        {{$slot}}
    </main>

    @push('styles')
    @vite('resources/css/general.css')
    @vite('resources/css/dashboard.css')
    @endpush

    <script src="/js/admin-dashboard.js" defer></script>
</div>
