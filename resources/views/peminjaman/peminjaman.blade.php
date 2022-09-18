<!DOCTYPE html>
<html lang="en">


<body>
    <!-- wrapper -->
    <div class="wrapper">
        @include('template.head')

        @include('template.navbar')

        @include('template.sidebar')

        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                <div class="page-content">
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Kategori</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Kategori Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body">
                            <div>
                                <a id="table2-new-row-button" href="tambahkategori" class="btn btn-outline-info btn-sm mb-2">Tambah Kategori</a>
                                <div class="table-responsive">
                                    <hr>
                                    <div class="table-responsive">
										<table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
											<thead>
												<tr>                                         
													<th>Nama Buku </th>
													<th>kelas</th>
													<th>Nama Buku</th>
													<th>Tanggal Peminjaman</th>
													<th>Tanggal Pengembalian</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody>
												@foreach ( $data as $row )
				
												<tr>
													<td>{{$row->nama}}</td>
													<td>{{$row->kelas}}</td>
													<td>{{$row->namabuku}}</td>
													<td>{{$row->tanggalpeminjaman}}</td>
													<td>{{$row->tanggalpengebalian}}</td>
													<td>{{$row->jumlah}}</td>
												</tr>
												@endforeach
				
											</tbody>
										</table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end page-content-wrapper-->
                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script>
                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif
                </script>

                <script>
                    $('.delete').click(function() {
                        var mahasiswaid = $(this).attr('data-id');
                        var kategori = $(this).attr('data-kategori');
                        swal({
                                title: "YAKIN?",
                                text: "Akan Menghapus Data Dengan Kategori " + kategori + " ",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "/deletekategori/" + mahasiswaid + ""
                                    swal("Data Ini Berhasil Dihapus!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Data Ini Tidak Jadi Dihapus!");
                                }
                            });
                    });
                </script>


</body>

</html>
