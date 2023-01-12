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
                    <!--breadcrumb-->
                    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Menu Buku</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="buku"><i
                                                class="fadeIn animated bx bx-list-ul"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Daftar Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                @if (auth()->user()->role == 'admin')
                                    <a id="table2-new-row-button" href="tambahbuku"
                                        class="btn btn-outline-info btn-sm mb-3"></i>Tambah
                                        Buku</a>
                                    <button onclick="cetakbarcode('{{ route('cetakbarcode') }}')"
                                        class="btn btn-outline-primary btn-sm mb-3"><i class="fa fa-qrbarcode"></i>
                                        Cetak
                                        Barcode</button>
                                @endif

                                <div class="table-responsive">
                                    <hr>
                                    <div class="table-responsive">
                                       
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    @if (auth()->user()->role == 'admin')
                                                        <th>
                                                            <input type="checkbox" onchange="checkAll(this)"
                                                                name="chk">
                                                        </th>
                                                    @endif
                                                    <th>No</th>
                                                    <th>Kode Buku</th>
                                                    <th>Judul Buku </th>
                                                    <th>Pengarang</th>
                                                    <th>Buku Datang</th>
                                                    <th>Jumlah</th>
                                                    <th>Jumlah Buku Rusak</th>
                                                    <th>Lokasi</th>
                                                    <th>Foto</th>

                                                    <th>Aksi</th>


                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            @if (auth()->user()->role == 'admin')
                                                                <td><input type="checkbox" name="id[]"
                                                                        value="{{ $row->id }}">
                                                                </td>
                                                            @endif
                                                            <td> {{ $no++ }}</td>
                                                            <td>{{ $row->kodebuku }}</td>
                                                            <td>{{ $row->namabuku }}</td>
                                                            <td>{{ $row->pengarang }}</td>
                                                            <td>{{ $row->bukudatang }}</td>
                                                            <td>{{ $row->jumlah }} buku</td>
                                                            <td>{{ $row->rusak }} buku</td>
                                                            <td>{{ $row->lokasibuku }}</td>
                                                            <td> <img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px">
                                                            </td>

                                                            <td class="b">
                                                                @if (auth()->user()->role == 'user')
                                                                <form action="cartuser" method="post">
                                                                    @csrf
                                                                    <input type="hidden" name="id" value="{{$row->kodebuku}}">
                                                                    <button type="submit" class="btn btn-info">
                                                                        <i class="fa-solid fa-cart-plus"></i>
                                                                    </button>
                                                                </form>    
                                                                
                                                                @endif
                                                                @if (auth()->user()->role == 'admin' && 'petugas')
                                                                    <a href="/editbuku/{{ $row->id }}"
                                                                        class="btn btn-success">
                                                                        <i class="fa-solid fa-square-pen"></i>
                                                                    </a>

                                                                    <a href="#" class="btn btn-danger delete"
                                                                        data-id="{{ $row->id }}"
                                                                        data-nama="{{ $row->namabuku }}">
                                                                        <i class="fa-solid fa-trash"></i>
                                                                    </a>
                                                                @endif
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

                @include('vendor.sweetalert.alert')

                <script>
                    @if (Session::has('gagal'))
                        swal({
                            // position: 'top-end',
                            icon: 'warning',
                            title: 'Maaf! Stock Buku Ini Sudah Habis',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    @endif
                     @if (Session::has('stok'))
                        swal({
                            // position: 'top-end',
                            icon: 'warning',
                            title: 'Maaf! jumlah buku ini melebihi batas yang dipinjam',
                            showConfirmButton: false,
                            timer: 1500
                        });
                    @endif

                    @if (Session::has('errors'))
                        swal({
                            // position: 'top-end',
                            icon: 'warning',
                            title: 'Maaf! Stock Buku Ini Sudah Habis',
                            showConfirmButton: false,
                            timer: 3500
                        });
                    @endif
                    @if (Session::has('berhasil'))
                        swal({
                            icon: "success",
                            title: "Anda Berhasil Menambahkan Buku Ke Keranjang",
                            showConfirmButton: false,
                            timer: 3500
                        });
                    @endif

                    function cart(e) {
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
                            url: '/cartuser',
                            processData: false,
                            contentType: false,
                            cache: false,
                            data: fd,
                            dataType: 'JSON',
                            success: function(e) {
                                console.log(e)
                                if (e == "gagal") {
                                    swal({
                                        icon: "warning",
                                        text: "Maaf! Stock Buku Ini Sudah Habis"
                                    });
                                    return;
                                }
                                if (e == "rusak") {
                                    swal({
                                        icon: "warning",
                                        text: "Maaf! jumlah buku ini melebihi batas yang dipinjam"
                                    });
                                    return;
                                }
                                if (e == "barhasil") {
                                    swal({
                                        icon: "warning",
                                        text: "Buku Sudah Dimasukkan Ke Keranjang"
                                    });
                                    return;
                                }

                            }
                        })
                    }



                    $('.delete').click(function() {
                        var mahasiswaid = $(this).attr('data-id');
                        var nama = $(this).attr('data-nama');
                        swal({
                                title: "YAKIN?",
                                text: "Akan Menghapus Data Dengan nama " + nama + " ",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "/deletebuku/" + mahasiswaid + ""
                                    swal("Data Ini Berhasil Dihapus!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Data Ini Tidak Jadi Dihapus!");
                                }
                            });
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

                    // $('[name=select_all]').on('click', function() {
                    //     $(':example').prop('checked', this.checked);
                    // });

                    function cetakbarcode(url) {
                        if ($('input:checked').length < 1) {
                            swal({
                                icon: "warning",
                                text: "Harap Pilih Buku Terlebih Dahulu"
                            });
                            return;
                        } else {
                            $('.from-buku')
                                .attr('action', url)
                                .attr('target', '_blank')
                                .submit();
                        }
                    }
                </script>
                <script type="text/javascript">
                    function checkAll(ele) {
                        var checkboxes = document.getElementsByTagName('input');
                        if (ele.checked) {
                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i].type == 'checkbox') {
                                    checkboxes[i].checked = true;
                                }
                            }
                        } else {
                            for (var i = 0; i < checkboxes.length; i++) {
                                if (checkboxes[i].type == 'checkbox') {
                                    checkboxes[i].checked = false;
                                }
                            }
                        }
                    }
                </script>
</body>

</html>
