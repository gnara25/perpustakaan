<!DOCTYPE html>
<html lang="en">

@include('template.head')

<body>
    <!-- wrapper -->
    <div class="wrapper">

        @include('template.navbar')

        @include('template.sidebar')

        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->

            <div class="page-content-wrapper">
                <div class="page-content">
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Tambah Peminjaman</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjamn/Tambah Peminjaman
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="table-responsive">
                                <form action="/tambahpengembalianpost" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">No.Transaksi :</label>
                                        <div class="form-group">
                                            <select class="form-control @error('kategori') is-invalid @enderror"
                                                id="transaksi" name="kategori" aria-label="Default select example">
                                                <option value="" disabled selected>Pilih No.Transaksi</option>
                                                @foreach ($pengembalin as $transaksi)
                                                    <option value="{{ $transaksi->id }}"
                                                        data-nama='{{ $transaksi->anggota->nama }}'
                                                        data-kelas='{{ $transaksi->kelas }}'
                                                        data-kodebuku='{{ $transaksi->kodebuku }}'
                                                        data-judul='{{ $transaksi->idbuku->namabuku }}'
                                                        data-jumlah='{{ $transaksi->jumlah }}'>
                                                        {{ $transaksi->transaksi }}</option>
                                                @endforeach
                                            </select>
                                            @error('nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Siswa :</label>
                                        <div class="">
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                name="nama" value="{{ old('nama') }}">
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="">
                                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Pengembalian
                                            :</label>
                                        <div class="">
                                            <input type="date" value="<?= date('Y-m-d') ?>"
                                                class="form-control @error('tanggalpeminjaman')
is-invalid
@enderror"
                                                id="tanggalpeminjaman" name="tanggalpeminjaman">
                                            @error('tanggalpeminjaman')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="kelas" class="col-sm-4 col-form-label">Kelas :</label>
                                        <div class="">
                                            <input type="text   "
                                                class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                                name="kelas" value="{{ old('kelas') }}">
                                            @error('kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mb-3 mr-4 ml-4" id="add_item_btn">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label"> Kode Buku </label>
                                            <input type="text" class="form-control" value="" name="kodebuku"
                                                id="kodebuku">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustom02" class="form-label"> Judul Buku</label>
                                            <input type="text" class="form-control" id="judul" value=""
                                                name="namabuku">
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="validationCustomUsername" class="form-label">Jumlah Buku</label>
                                            <div class="input-group has-validation">
                                                <input type="text" class="form-control" id="jumlah"
                                                    name="Jumlah">
                                                <div class="invalid-feedback">
                                                    Please choose a username.
                                                </div>
                                                <div class="col-md-4">
                                                    <span class="input-group-btn">
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#exampleExtraLargeModal"
                                                            class="btn btn-primary">
                                                            <i class="fa-solid fa fa-search"></i>
                                                        </a>
                                                    </span>
                                                    <span class="input-group-btn">
                                                        <a id="showitem" class="btn btn-primary">
                                                            <i class="fa-solid fa-plus-circle"></i>
                                                        </a>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <center>
                                            <div class="mb-4 mt-4">
                                                <button type="submit"
                                                    class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </span>
                                                    <span class="text">Proses Pengembalian</span>
                                                </button>
                                                <div class=" mb-3">
                                                    <a href="daftaranggota"
                                                        class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-circle-left"></i>
                                                        </span>
                                                        <span class="text">Kembali</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </center>
                                        {{-- <button type="submit"  class="btn btn-primary">Tambah</button>
                                <a href="pemasukan" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> --}}
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end page-content-wrapper-->
                @include('peminjaman.modalbuku')

                @include('peminjaman.modalanggota')
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



        <script type="text/javascript">
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif

            const selection = document.getElementById('transaksi');
            selection.onchange = function(e) {
                const nama = e.target.options[e.target.selectedIndex].dataset.nama
                const kelas = e.target.options[e.target.selectedIndex].dataset.kelas
                const kodebuku = e.target.options[e.target.selectedIndex].dataset.kodebuku
                const judul = e.target.options[e.target.selectedIndex].dataset.judul
                const jumlah = e.target.options[e.target.selectedIndex].dataset.jumlah
                document.getElementById('nama').value = nama;
                document.getElementById('kelas').value = kelas;
                document.getElementById('kodebuku').value = kodebuku;
                document.getElementById('judul').value = judul;
                document.getElementById('jumlah').value = jumlah;
            }

            $(document).ready(function() {
                //Default data table
                $('#mytable').DataTable();
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
                });
                table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });

            $('#exampleVaryingModalContent').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var recipient = button.data('whatever') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this)
                modal.find('.modal-title').text('New message to ' + recipient)
                modal.find('.modal-body input').val(recipient)
            });

            $(document).ready(function() {
                $(".add_item_btn").click(function(e) {
                    e.preventDefault();
                    $("#showitem").prepend("");
                    alert("showitem");
                });
            });
        </script>
</body>

</html>
