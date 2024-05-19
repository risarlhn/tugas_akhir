<nav class="navbar navbar-expand-lg navbar-absolute navbar-transparent">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav ml-auto">
                <li class="dropdown nav-item ">
                    @if (auth()->user()->role == 'ADMIN'|| (auth()->user()->role == 'DIREKTUR'))
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="notification d-none d-lg-block d-xl-block"></div>
                        <i class="tim-icons icon-bell-55" style="color: #5f81ff;"></i>
                        <p class="d-lg-none"> {{ __('Notifications') }} </p>
                        <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                            <ul class="dropdown-menu dropdown-menu-right dropdown-navbar">
                                @forelse ($unreadNotifications as $po)
                                <li class="nav-link">
                                    <hr />
                                    <a href="{{ route('purchase-order.mark-as-read', $po->id) }}" class="nav-item dropdown-item">
                                        Terdapat Pengajuan Purchase Order<br /> baru dari Perusahaan {{ $po->user_name }} <br />oleh {{ $po->nama_perusahaan }} - {{ $po->created_at->diffForHumans() }}
                                    </a>
                                </li>
                                @empty
                                <li class="nav-link">
                                    <p>Tidak ada pengajuan Purchase Order untuk saat ini</p>
                                </li>
                                @endforelse
                            </ul>
                        </ul>
                    </a>
                </li>
                @endif
                <li class="dropdown nav-item">
                    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                        <div class="photo">
                            <img src="{{ asset('white') }}/img/anime3.png" alt="{{ __('Profile Photo') }}">
                        </div>
                        <b class="caret d-none d-lg-block d-xl-block" style="color: #5f81ff;"></b>
                        <p class="d-lg-none">{{ __('Log out') }}</p>
                    </a>
                    <ul class="dropdown-menu dropdown-navbar">
                        <li class="nav-link">
                            <a href="{{ route('profile.edit') }}" class="nav-item dropdown-item">{{ __('Profile') }}</a>
                        </li>
                        <li class="dropdown-divider"></li>
                        <li class="nav-link">
                            <a href="{{ route('logout') }}" class="nav-item dropdown-item" onclick="event.preventDefault();  document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
                        </li>
                    </ul>
                </li>
                <li class="separator d-lg-none"></li>
            </ul>
        </div>
    </div>
</nav>