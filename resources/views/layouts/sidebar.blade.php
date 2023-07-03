<div class="nk-sidebar-content">
    <div class="nk-sidebar-menu" data-simplebar>
        <ul class="nk-menu">
            
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">Hak Akses</h6>
            </li><!-- .nk-menu-item -->
            {{-- <li class="nk-menu-item">
                <a href="{{ URL::to("admin/profile") }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                    <span class="nk-menu-text">Profile</span>
                </a>
            </li> --}}
            <li class="nk-menu-item">
                <a href="{{ route("users.index") }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                    <span class="nk-menu-text">User</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="{{ URL::to("admin/member") }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                    <span class="nk-menu-text">Member</span>
                </a>
            </li><!-- .nk-menu-item -->
            <li class="nk-menu-item">
                <a href="{{ route("roles.index") }}" class="nk-menu-link">
                    <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                    <span class="nk-menu-text">Roles</span>
                </a>
            </li>
            <li class="nk-menu-heading">
                <h6 class="overline-title text-primary-alt">Transaksi</h6>
            </li>

            <li class="nk-menu-item has-sub">
                <a href="{{ URL::to("admin/simpanan") }}" class="nk-menu-link nk-menu-toggle">
                    <span class="nk-menu-icon"><em class="icon ni ni-user-list"></em></span>
                    <span class="nk-menu-text">Simpanan</span>
                </a>
                <ul class="nk-menu-sub">
                    <li class="nk-menu-item">
                        <a href="{{ URL::to("admin/simpanan/create") }}" class="nk-menu-link">
                            <span class="nk-menu-text">Tambah</span>
                        </a>
                    </li>
                    <li class="nk-menu-item">
                        <a href="{{ URL::to("admin/simpanan/") }}" class="nk-menu-link">
                            <span class="nk-menu-text">Daftar</span>
                        </a>
                    </li>
                </ul>
            </li>

        </ul><!-- .nk-menu -->
    </div><!-- .nk-sidebar-menu -->
</div><!-- .nk-sidebar-content -->