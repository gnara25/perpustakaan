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
                                    <li class="breadcrumb-item active" aria-current="page">Peminjaman/Tambah Peminjaman
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="row">
                                <form action="/tambahpengembalianpost/{{ $pengembalin->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group row mb-3">
                                        <label for="transaksi" class="col-sm-4 col-form-label">No.Transaksi :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                      class="form-control @error('transaksi') is-invalid @enderror"
                                                id="nama" name="transaksi" value="{{ $pengembalin->transaksi }}"
                                                readonly>
                                            @error('transaksi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Siswa :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                name="nama" value="{{ $pengembalin->anggota->nama }}" readonly>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="tanggalpengembalian" class="col-sm-4 col-form-label">Tanggal
                                            Pengembalian
                                            :</label>
                                        <div class="col-sm-8">
                                            <input type="date" value="<?= date('Y-m-d') ?>"
                                                class="form-control @error('tanggalpengembalian')
is-invalid
@enderror"
                                                id="tanggalpengembalian" name="tanggalpengembalian" readonly>
                                            @error('tanggalpengembalian')
                                                <div class="invalid-feedback">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="kelas" class="col-sm-4 col-form-label">Kelas :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                                value="{{ $pengembalin->kelas }}" name="kelas" readonly>
                                            @error('kelas')
                                                <div class="invalid-feedback">{{ $message }} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">  
                                        <label for="kelas" class="col-sm-4 col-form-label">Pilih Buku </label> 
                                            <div class="col-sm-8">
                                                <div class="input-group has-validation">
                                                       <div class="form-control single-select @error('kodebuku') is-invalid @enderror"
                                                      name="kodebuku" aria-label="Default select example" id="kodebuku">
                                                      <option value="" disabled selected> Pilih Buku Yang Ingin DiKembalikan </option>
                                                        </div>
                                                        <span class="input-group-btn">
                                                            <a data-bs-toggle="modal"
                                                                  data-bs-target="#Bukuid"
                                                                  class="btn btn-primary">
                                                                  <i class="fa-solid fa fa-search"></i>
                                                            </a>
                                                        </span>
                                                </div>
                                            </div>
                                      </div>
                                    {{-- <div class="form-group row mb-3">
                                        <label for="kelas" class="col-sm-4 col-form-label">Denda/buku </label>
                                        <div class="col-sm-8">
                                            @if ($pengembalin->denda[0]->denda > 0)
                                                <input type="text"
                                                    class="form-control @error('denda') is-invalid @enderror"
                                                    id="denda" value="{{ $pengembalin->denda[0]->denda }}"
                                                    name="denda" readonly>
                                                {{-- @error('denda')
                                                    <div class="invalid-feedback">{{ $message }} </div>
                                                @enderror --}}
                                    {{-- @else
                                                <input type="text"
                                                    class="form-control @error('denda') is-invalid @enderror"
                                                    id="denda" value="0" name="denda" readonly> --}}
                                    {{-- @error('denda')
                                                    <div class="invalid-feedback">{{ $message }} </div>
                                                @enderror --}}
                                    {{-- @endif --}}
                                    {{-- </div> --}}
                                    {{-- </div> --}}
                                    {{-- <div class="row mb-3 mr-4 ml-4" id="add_item_btn">
                                        <div class="col-md-4">
                                            <label for="validationCustom01" class="form-label"> Kode Buku </label>
                                            <input type="text" class="form-control"
                                                value="{{ $pengembalin->idbuku->kodebuku }}" name="kodebuku"
                                                id="kodebuku" readonly>
                                            <div class="valid-feedback">
                                                Looks good!
                                            </div>
                                        </div> --}}
                                    {{-- <div class="col-md-4">
                                        <label for="validationCustom02" class="form-label"> Judul Buku</label>
                                        <input type="text" class="form-control" id="judul"
                                            value="{{ $pengembalin->namabuku }}" name="namabuku" readonly>
                                        <div class="valid-feedback">
                                            Looks good!
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="validationCustomUsername" class="form-label">Jumlah Buku</label>
                                        <div class="input-group has-validation">
                                            <input type="text" class="form-control" id="jumlah" name="jumlah"
                                                value="{{ $pengembalin->jumlah }}" readonly>
                                            <div class="invalid-feedback">
                                                Please choose a username.
                                            </div>
                                            {{-- <div class="col-md-4">
                                                    <span class="input-group-btn">
                                                        <a data-bs-toggle="modal"
                                                            data-bs-target="#exampleExtraLargeModal"
                                                            class="btn btn-primary">
                                                            <i class="fa-solid fa fa-search"></i>
                                                        </a>
                                                    </span>
                                                    {{-- <span class="input-group-btn">
                                                        <a id="showitem" class="btn btn-primary">
                                                            <i class="fa-solid fa-plus-circle"></i>
                                                        </a>
                                                    </span> 
                                                </div> 
                                        </div>
                                    </div> --}}
                                    <br>
                                    <center>
                                        <div class="mb-4 mt-4">
                                            <button type="submit" class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-plus-circle"></i>
                                                </span>
                                                <span class="text">Proses Pengembalian</span>
                                            </button>
                                            <div class=" mb-3">
                                                <a href="/peminjaman" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
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
                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Buku</th>
                                    <th>Kode Buku</th>
                                    <th>Jumlah</th>
                                    {{-- <th>Aksi</th> --}}
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody id="tbody-cart">

                                @foreach ( $detail as $buku)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $buku->namabuku }}</td>
                                        <td>{{ $buku->kodebuku }}</td>
                                        <td>{{ $buku->jumlah }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                                </form>
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



        <script type="text/javascript">
            @if (Session::has('error'))
                toastr.error("{{ Session::get('error') }}")
            @endif  

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
        <script src="assets/plugins/select2/js/select2.min.js"></script>
        <script>
            $('.single-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
            $('.multiple-select').select2({
                theme: 'bootstrap4',
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
                placeholder: $(this).data('placeholder'),
                allowClear: Boolean($(this).data('allow-clear')),
            });
        </script>
</body>

</html>
