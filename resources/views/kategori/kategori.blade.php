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
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Menu Kategori</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">MenuKategori</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <a href="/tambahkategori" class="btn btn-warning" style="text-right"
                                class="icon text-white-50">Tambah Kategori</a>
                        </div>
                        <div class="card radius-15">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0" id="myTable ">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Kategori Buku</th>
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
                                                    <td>{{ $row->kategori }}</td>

                                                    <td class="c">
                                                        <a href="/editpemilik/{{ $row->id }}"
                                                            class="btn btn-success">
                                                            <i class="fa-solid fa-square-pen"></i></a>
                                                        <a href="#" class="btn btn-danger delete"
                                                            data-id="{{ $row->id }}"
                                                            data-kategori="{{ $row->kategori }}">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>
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
            <!--end page-wrapper-->
            <!--start overlay-->
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            @include('template.footer')
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

        <script>
            $(document).ready(function() {
                $('#myTable').DataTable();
            });
        </script>

</body>

</html>
