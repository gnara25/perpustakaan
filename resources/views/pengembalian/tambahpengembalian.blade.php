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

                                    <div class="form-group row">
                                        <div class="col-md-6">
                                            <label for="transaksi">No.Transaksi :</label>
                                            <input type="text"
                                                class="form-control @error('transaksi') is-invalid @enderror"
                                                id="nama" name="transaksi" value="{{ $pengembalin->transaksi }}"
                                                readonly>
                                            @error('transaksi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label for="tanggalpengembalian">Tanggal Pengembalian :</label>
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
                                    <br>
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
                                                <span class="input-group-btn">
                                                    <a data-bs-toggle="modal" data-bs-target="#Bukuid"
                                                        class="btn btn-primary">
                                                        <i class="fa-solid fa fa-search"></i>
                                                    </a>
                                                </span>
                                                <div class="form-control  @error('kodebuku') is-invalid @enderror"
                                                    name="kodebuku" id="kodebuku">
                                                    <option value="" disabled selected> Pilih Buku Yang Ingin
                                                        DiKembalikan </option>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div>
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Judul Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Jumlah</th>
                                                    <th>Denda</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <tbody id="tbody-cartbuku">

                                            </tbody>
                                        </table>
                                    </div>

                                    <center>
                                        <div class="mb-4 mt-4">
                                            <button id="pilihBuku" class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                                <span class="text">Proses Pengembalian</span>
                                            </button>
                                            <div class=" mb-3">
                                                <a href="/peminjaman" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                    <span class="text">Kembali</span>
                                                </a>
                                            </div>
                                        </div>
                                    </center>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end page-content-wrapper-->

                @include('pengembalian.modalpilihbuku')

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

            listcartget()

            function tambahbuku(e) {
                console.log(e.getAttribute('data-id1'))
                const fd = new FormData();
                fd.append('id', e.getAttribute('data-id1'))
                fd.append('namabuku', e.getAttribute('data-namabu'))
                fd.append('kodebuku', e.getAttribute('data-kodebu'))
                fd.append('price', e.getAttribute('data-price'))
                fd.append('quantity', e.getAttribute('data-jumlah'))
                addPeminjamanbuku(fd)
            }

            function addPeminjamanbuku(fd) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    method: 'POST',
                    url: '/postcart',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: fd,
                    dataType: 'JSON',
                    success: function(e) {
                        console.log(e)
                        listcartget()
                        // $('#Bukuid').hide()
                    }
                })
            }

            function listcartget() {
                $.ajax({
                    method: 'GET',
                    url: '/listcart',
                    dataType: 'JSON',
                    success: function(e) {
                        let html = ''
                        let no = 1;

                        if (e.data.length < 1) {
                            $('#pilihBuku').attr('disabled', true)
                        } else {
                            $('#pilihBuku').attr('disabled', false)
                        }
                        console.log(e.data.length)
                        e.data.map(val => {
                            html += `
                                                
                                    <tr>
                                        <td scope="row">${no++}</td>
                                        <td>${val.name}</td>
                                        <td>${val.attributes.kodebuku}</td>
                                        <td>${val.quantity}</td>
                                        <td> Rp. ${val.price}
                                            <input type="hidden" value="${val.price}">
                                            </td>
                                        <td class="hidden text-right md:table-cell">
                                        <a class="btn btn-danger remov"
                                         data-id="${val.id}"
                                         onclick="Removcart(this)" > X</a   >
                                        </td>
                                    </tr> `
                        })
                        $('#tbody-cartbuku').html(html)
                    }
                })
            }

            function Removcart(e) {
                const id = e.getAttribute('data-id')
                $.ajax({
                    method: 'GET',
                    url: '/remov/' + id,
                    dataType: 'JSON',
                    success: function(e) {
                        listcartget()
                    }
                })
            }
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
