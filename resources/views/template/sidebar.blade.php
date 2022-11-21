<!--sidebar-wrapper-->
<div class="sidebar-wrapper" data-simplebar="true">
	<div class="sidebar-header">
		<div class="">
			<img src="assets/images/logo-icon.png" class="logo-icon-2" alt="" />
		</div>
		<div>
			<h4 class="logo-text">PerpusKita</h4>
		</div>
		<a href="javascript:;" class="toggle-btn ms-auto"> <i class="bx bx-menu"></i>
		</a>
	</div>
	<!--navigation-->
	<ul class="metismenu" id="menu">
		<li>
			<a href="/beranda">
				<div class="parent-icon icon-color-1"><i class="bx bx-home-alt"></i>
				</div>
				<div class="menu-title">Beranda</div>
			</a>
		</li>
		<li class="menu-label">Menu Buku</li>
		@if (auth()->user()->role == 'admin')
		<li>
			<a href="/kategori">
				<div class="parent-icon icon-color-2"><i class="fadeIn animated bx bx-book-add"></i>
				</div>
				<div class="menu-title">Kategori Buku</div>
			</a>
		</li>
		@endif
		<li>
			<a href="/buku">
				<div class="parent-icon icon-color-3"> <i class="fadeIn animated bx bx-list-ul"></i>
				</div>
				<div class="menu-title">Daftar Buku</div>
			</a>
		</li>
		<li>
			<a href="/bukupop">
				<div class="parent-icon icon-color-17"><i class="fadeIn animated bx bx-book-alt"></i>
				</div>
				<div class="menu-title">Buku Populer</div>
			</a>
		</li>	
		<li class="menu-label">Transaksi</li>
		<li>
			<a href="/peminjaman">
				<div class="parent-icon icon-color-9"><i class="fadeIn animated bx bx-upload"></i>
				</div>
				<div class="menu-title">Peminjaman</div>
			</a>
		</li>
		<li class="menu-label">Daftar Anggota</li>
		<li>
			<a  href="/daftaranggota">
				<div class="parent-icon icon-color-16"> <i class="fadeIn animated bx bx-user-circle"></i>
				</div>
				<div class="menu-title"> Siswa</div>
			</a>
		</li>
		@if (auth()->user()->role == 'admin')
		<li>
			<a  href="/petugas">
				<div class="parent-icon icon-color-1"> <i class="fadeIn animated bx bx-group"></i>
				</div>
				<div class="menu-title"> Petugas Perpus</div>
			</a>
		</li>
		@endif
		<li class="menu-label">laporan</li>
		<li>
			<a  href="/laporanpinjam">
				<div class="parent-icon icon-color-5"><i class="fadeIn animated bx bx-upload"></i>
				</div>
				<div class="menu-title">Peminjaman</div>
			</a>

		</li>
		<li>
			<a  href="/pengembalian">
				<div class="parent-icon icon-color-10"><i class="fadeIn animated bx bx-download"></i>
				</div>
				<div class="menu-title">Pengembalian</div>
			</a>

		</li>
		<li>
			<a  href="/denda">
				<div class="parent-icon icon-color-9"><i class="fadeIn animated bx bx-coin-stack"></i>
				</div>
				<div class="menu-title">Denda </div>
			</a>
		</li>
		@if (auth()->user()->role == 'admin')
		<li>
			<a  href="/pendapatan">
				<div class="parent-icon icon-color-13"><i class="bx bx-line-chart"></i>
				</div>
				<div class="menu-title">Pendapatan </div>
			</a>
		</li>
		@endif
	</ul>
	<!--end navigation-->
</div>
<!--end sidebar-wrapper-->
