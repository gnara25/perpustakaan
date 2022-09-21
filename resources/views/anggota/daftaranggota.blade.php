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
                        <div class="breadcrumb-title pe-3">Anggota</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Daftar Anggota</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body">
                            <div>
                                <a id="table2-new-row-button" href="tambahanggota" class="btn btn-outline-info btn-sm mb-2">Tambah Anggota</a>
                                <div class="table-responsive">
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nisn</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Tgl.Lahir</th>
                                                    <th>Kelas</th>
                                                    <th>Alamat</th>
                                                    <th>Aksi</th>

                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td scope="row">{{ $no++ }}</td>
                                                        <td>{{ $row->nisn }}</td>
                                                        <td>{{ $row->nama }}</td>
                                                        <td>{{ $row->tgl_lahir }}</td>
                                                        <td>{{ $row->kelas }}</td>
                                                        <td>{{ $row->alamat }}</td>
                                                        <td class="b">
                                                            <a href="/editkategori/{{ $row->id }}"
                                                                class="btn btn-success">
                                                                <i class="fa-solid fa-square-pen"></i></a>
                                                            <a href="#" class="btn btn-danger delete"
                                                                data-id="{{ $row->id }}"
                                                                data-nama="{{ $row->nama }}">
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
                                                            <a href="/detailanggota/{{ $row->id }}"
                                                                class="btn btn-primary">
                                                                <i class="fa-solid fa-eye"></i></a>
                                                        </td>
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
                        var nama = $(this).attr('data-nama');
                        swal({
                                title: "YAKIN?",
                                text: "Akan Menghapus Data Dengan Nama " + nama + " ",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "/deleteanggota/" + mahasiswaid + ""
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
