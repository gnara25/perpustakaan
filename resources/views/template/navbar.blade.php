<header class="top-header">
    <nav class="navbar navbar-expand">
        <div class="left-topbar d-flex align-items-center">
            <a href="javascript:;" class="toggle-btn">	<i class="bx bx-menu"></i>
            </a>
        </div>
        <div class="flex-grow-1 search-bar">
            <div class="input-group">
                 <button class="btn btn-search-back search-arrow-back" type="button"><i class="bx bx-arrow-back"></i></button>
                 <input type="text" class="form-control" placeholder="Cari" />
                 <button class="btn btn-search" type="button"><i class="lni lni-search-alt"></i></button>
            </div>
        </div>
        <div class="right-topbar ms-auto">
            <ul class="navbar-nav">
                <li class="nav-item search-btn-mobile">
                    <a class="nav-link position-relative" href="javascript:;">	<i class="bx bx-search vertical-align-middle"></i>
                    </a>
                </li>
                <li class="nav-item dropdown dropdown-lg">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="javascript:;" data-bs-toggle="dropdown">	<i class="bx bx-bell vertical-align-middle"></i>
                        
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a href="javascript:;">
                            <div class="msg-header">
                                <h6 class="msg-header-title">0 Notifikasi</h6>
                                <p class="msg-header-subtitle">Aplikasi Notifikasi</p>
                            </div>
                        </a>
                        <a href="javascript:;">
                            <div class="text-center msg-footer">Semua Notifikasi</div>
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown dropdown-user-profile">
                    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                        <div class="d-flex user-box align-items-center">
                            <span
                            class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            <img src="../assets/images/avatars/avatar-1.png" class="user-img" alt="user avatar">
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">	
                        <a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-user"></i><span>Profil</span></a>
                        <a class="dropdown-item" href="javascript:;"><i
                                class="bx bx-cog"></i><span>Pengaturan</span></a>
                        <a class="dropdown-item" href="beranda"><i
                                class="bx bx-tachometer"></i><span>Beranda</span></a>
                        <div class="dropdown-divider mb-0"></div>	<a class="dropdown-item" href="/logout"><i
                                class="bx bx-power-off"></i><span>Keluar</span></a>
                    </div>
                </li>
                
            </ul>
        </div>
    </nav>
</header>