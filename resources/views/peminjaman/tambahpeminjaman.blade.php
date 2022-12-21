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
                        <div class="breadcrumb-title pe-3">Transaksi</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="/peminjaman"><i
                                                class='fadeIn animated bx bx-upload'></i></a>
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
                                <form action="/insert" method="POST" enctype="multipart/form-data" class="form-pinjam">
                                    @csrf
                                    <div class="form-group row mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">No Transaksi :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('transaksi') is-invalid @enderror"
                                                id="transaksi" value="{{ 'PJM-' . $kd }}" name="transaksi" readonly>
                                            @error('transaksi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-md-4">
                                            <label for="nisn" class="col-sm-4 col-form-label">Nisn :</label>
                                            <input type="number" id="nisn" onkeyup="complate()"
                                                class="form-control" value="" name="nisn" min="1" placeholder="Scane Nisn">
                                            <input type="hidden" id="idsiswa" class="form-control" value=""
                                                name="idsiswa" required>
                                            @error('nisn')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="nama" class="col-sm-4 col-form-label">Nama Siswa :</label>
                                            <input type="text"
                                                class="form-control @error('nama') is-invalid @enderror" id="nama"
                                                name="nama" readonly>

                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="kelas" class="col-sm-4 col-form-label">Kelas :</label>
                                            <input type="text"
                                                class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                                name="kelas" value="{{ old('kelas') }}" readonly>
                                            @error('kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <br>
                                    <div class="form-group row mb-3">
                                        <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Pengembalian :
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="date" value="{{ date('Y-m-d', strtotime('+3 days')) }}"
                                                class="form-control text-center @error('tanggalpengembalian')
                                                is-invalid
                                                @enderror"
                                                id="tanggalpengembalian" name="tanggalpengembalian">
                                            @error('tanggalpengembalian')
                                                <div class="invalid-feedback">{{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- <div class="form-group row mb-3">
                                        <label for="inputkode" class="col-sm-4 col-form-label">Masukan Kode Buku
                                        </label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('inputkode') is-invalid @enderror"
                                                id="inputkode" name="inputkode" value="{{ old('inputkode') }}"
                                                readonly>
                                            @error('inputkode')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror

                                            <p>
                                                <br><button type="button" id="btn_clear" class="btn btn-primary "
                                                    style="margin-bottom: 2px;"><span
                                                        class="glyphicon glyphicon-remove"></span> Clear Field</button>
                                            </p>
                                            <p id="message_info"></p>
                                        </div>
                                    </div> --}}


                                    <div class="form-group row mb-3">
                                        <label for="kelas" class="col-sm-4 col-form-label">Scane Kode Buku </label>
                                        <div class="col-sm-8">
                                            <div class="input-group has-validation">
                                                <input type="text" onchange="scane()" id="kdbuku" name="kodebuku"
                                                    class="form-control @error('transaksi') is-invalid @enderror"
                                                    value="" placeholder="Scane Kode Buku">
                                                <span class="input-group-btn">
                                                    <input type="hidden" value="" name="id" id="idbuku">
                                                    <input type="hidden" value="" name="kodebuku" id="kodebuku">
                                                    <input type="hidden" value="" name="namabuku"
                                                        id="name">

                                                    <a onclick="tambah(this)" class="btn btn-primary">
                                                        <i class="fa-solid fa fa-search"></i>
                                                    </a>
                                                </span>
                                                {{-- <span class="input-group-btn">
                                                    <a data-bs-toggle="modal" data-bs-target="#Bukuid"
                                                        class="btn btn-primary">
                                                        <i class="fa-solid fa fa-search"></i>
                                                    </a>
                                                </span> --}}
                                            </div>
                                            <br>
                                            <button type="button" id="clear" class="btn btn-danger" style="margin-left:2px;"><span class="glyphicon glyphicon-remove">Hapus</span> <i class="fa-solid fa-trash"></i>     </button> 
                                        </div> 
                                    </div>
                                    <div>
                                        <table class="table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Judul Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Jumlah</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tbody-cart">

                                            </tbody>
                                        </table>
                                    </div>
                            </div>
                            <center>
                                <div class="mb-4 mt-4">
                                    <button id="pilihBuku" class="btn btn-info btn-icon-split col-sm-3 mb-3 pilihBuku"
                                        onclick="validasi()">
                                        <span class="text">Tambah Peminjaman</span>
                                    </button>
                                    <div class="mb-3">
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

            @include('peminjaman.modalbuku')


            {{-- @include('peminjaman.modalanggota') --}}
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
        $(document).ready(function() {
            $('#nisn').val("").focus();
            $('#nisn').keyup(function(e) {
                var tex = $(this).val();
                console.log(tex);
                if (tex !== "" && e.keyCode === 13) {

                    $('#nisn').focus();
                }
                e.preventDefault();
            });
            $('#pilihBuku').click(function() {
                $('#nisn').val("").focus();
            });
        });


        function complate() {
            var nisn = $("#nisn").val();
            $.ajax({
                method: 'GET',
                url: '/autoscane',
                processData: false,
                contentType: false,
                cache: false,
                data: 'nisn=' + nisn,
                dataType: 'JSON',
                success: function(data) {
                    datas = JSON.stringify(data);
                    $('#idsiswa').val(data.id);
                    $('#nama').val(data.nama);
                    $('#kelas').val(data.kelas);
                    console.log(data.id);
                },
                error: function(data) {
                    alert('nisn yang anda masukan salah');
                }
            });


        }
    </script>

    <script>
        $(document).ready(function() {
            $('#kdbuku').val("").focus();
            $('#kdbuku').keyup(function(e) {
                var tex = $(this).val();
                //  console.log(tex);
                if (tex !== "" && e.keyCode === 13) {

                    $('#kdbuku').focus();
                }
                e.preventDefault();
            });
            $('#pilihBuku').click(function() {
                $('#kdbuku').val("").focus();
            });
        });

        $('#clear').click(function() {
            $('#kdbuku').val("").focus();
        });

        function scane() {
            var kodebuku = $("#kdbuku").val();
            $.ajax({
                method: 'GET',
                url: "{{ url('/scanebuku') }}",
                processData: false,
                contentType: false,
                cache: false,
                data: 'kodebuku=' + kodebuku,
                dataType: 'JSON',
                success: function(data) {
                    datas = JSON.stringify(data);
                    // console.log(data) 

                },
                error: function(data) {
                    alert('nisn yang anda masukan salah');
                }

            });

        }

        getCartList()

        function tambah(e) {
            var kodebuku = $("#kdbuku").val();
            console.log(kodebuku);
            const fd = new FormData();
            fd.append('id', kodebuku)
            addPeminjaman(fd)
        }

        function addPeminjaman(fd) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'POST',
                url: '/cartpost',
                processData: false,
                contentType: false,
                cache: false,
                data: fd,
                dataType: 'JSON',
                success: function(e) {
                    if(e == "gagal"){
                            swal({
                                icon: "warning",
                                text: "Maaf! Stock Buku Ini Sudah Habis"
                            });
                            return;
                        }
                    getCartList()
                }
            })
        }

        function getCartList() {
            $.ajax({
                method: 'GET',
                url: '/cartlist',
                dataType: 'JSON',
                success: function(e) {
                    let html = ''
                    let no = 1;

                    if (e.data.length < 1) {
                        $('#pilihBuku').attr('disabled', true)
                    } else {
                        $('#pilihBuku').attr('disabled', false)
                    }

                    e.data.map(val => {
                        html += `<table>
                        <tbody>
                                        
                            <tr id="tr-cart">
                                <td scope="row">${no++}</td>
                                <td>${val.name}</td>
                                <td>${val.attributes.kodebuku}</td>
                                <td> 
                                    <a class="btn btn-success" onclick="decrementQuantity(this)"
                                 data-id="${val.id}"><i class="fa fa-plus"></i>
                                 </a>
                                
                                     ${val.quantity} buku 

                                    <a class="btn btn-success" onclick="incrementQuantity(this)"
                                 data-id="${val.id}"><i class="fa fa-minus"></i></a>
                                 
                                </td>

                                <td class="hidden text-right md:table-cell">
                                <a class="btn btn-danger remove" onclick="remove(this)"
                                 data-id="${val.id}"> Remove </a>
                                </td>
                            </tr>
                             </tbody>
                        </table>   `
                    })
                    $('#tbody-cart').html(html)
                }
            })


        }

        function remove(e) {
            var id = e.getAttribute('data-id');
            $.ajax({
                type: 'GET',
                url: "remove/" + id,
                dataType: 'JSON',
                success: function(e) {

                    console.log(e)
                    getCartList()
                }
            });
        }

        function decrementQuantity(e) {
            var id = e.getAttribute('data-id');
            $.ajax({
                type: 'GET',
                url: "decrementQuantity/" + id,
                dataType: 'JSON',
                success: function(e) {
                    if(e == "gagal"){
                            swal({
                                icon: "warning",
                                text: "Maaf! Stock Buku Ini Sudah Habis"
                            });
                            return;
                        }
                    console.log(e)
                    getCartList()
                }
            });
        }

        function incrementQuantity(e) {
            var id = e.getAttribute('data-id');
            $.ajax({
                type: 'GET',
                url: "incrementQuantity/" + id,
                dataType: 'JSON',
                success: function(e) {
                      if(e == "gagal"){
                            swal({
                                icon: "warning",
                                text: "Maaf! Tidak Bisa Mengurangi Buku Ini Lagi"
                            });
                            return;
                        }
                    console.log(e)
                    getCartList()
                }
            });
        }
    </script>

    <script type="text/javascript">
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif

        getCartList()

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
