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
                        <div class="breadcrumb-title pe-3">Transaksi</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i
                                                class="fadeIn animated bx bx-upload"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjaman Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                <a id="table2-new-row-button" href="/tambahpeminjaman"
                                    class="btn btn-outline-info btn-sm mb-4">Tambah Peminjaman</a>
                                    
                                {{-- @if (auth()->user()->role == 'petugas')
                                    <a id="table2-new-row-button" href="/scane" class="btn btn-outline-info btn-sm mb-2">Scane QR Code</a>
                                    @endif  --}}
                                <div class="row">
                                    <hr>
                                    <div class="table-responsive">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Transaksi</th>
                                                        <th>Nama Siswa</th>
                                                        <th>kelas</th>
                                                        <th>Tanggal Peminjaman</th>
                                                        <th>Tanggal Pengembalian</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        @if ($row->status == 0)
                                                            <tr>
                                                                <td>{{ $no++ }}</td>
                                                                <td>{{ $row->transaksi }}</td>
                                                                <td>{{ $row->nama }}</td>
                                                                <td>{{ $row->kelas }}</td>
                                                                <td>{{ Carbon\Carbon::parse($row->created_at)->format('d-m-Y') }}
                                                                </td>
                                                                <td>{{ Carbon\Carbon::parse($row->tanggalpengembalian)->format('d-m-Y') }}
                                                                </td>
                                                                <td>
                                                                    {{-- <a class="btn btn-success"
                                                                        data-id="{{ $row->id }}" id=""
                                                                        onclick="btnDetail(this)">
                                                                        <i class="fadeIn animated bx bx-show-alt"></i>
                                                                    </a> --}}
                                                                    <a href="/detailbuku/{{ $row->id }}"
                                                                        class="btn btn-success">
                                                                        <i class="fadeIn animated bx bx-show-alt"></i>
                                                                    </a>
                                                                    <a href="/tambahpengembalian/{{ $row->id }}"
                                                                        class="btn btn-primary">
                                                                        <i class="fadeIn animated bx bx-download"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- @foreach ($data as $row)
                        @include('peminjaman.detailbuku')
                    @endforeach --}}
                    <!--end page-content-wrapper-->
                </div>

                <!-- end wrapper -->
                @include('template.script')

                <script>
                    const btnDetail = (e) => {
                        const data_id = e.getAttribute('data-id')
                        $.ajax({
                            url: "/detailbuku/" + data_id,
                            method: "GET",
                            success: function(data) {
                                // console.log()
                                console.log("datanya adalah ", data.data)
                                let td = ''

                                data.data.forEach(val => {
                                    td += `
                        <tr>
                            <td>${val.namabuku}</td>
                            <td>${val.kodebuku}</td>
                            <td>${val.jumlah}</td>
                            <td>${val.denda}</td>
                            
                        </tr>
                        `
                                })

                                $('#tbody-cart').html(td)
                                 $("#BukuModal").modal('show')
                            }
                        })
                    }

                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif

                    @if (Session::has('error'))
                        toastr.error("{{ Session::get('error') }}")
                    @endif

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
                                    window.location = "/deletepeminjaman/" + mahasiswaid + ""
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

                    //     var el_up  = document.getElementById("Bukuid");
                    //     var el_down = document.getElementById("BukuModal");
                    //     el_up.innerHTML = "Click on button to get ID";

                    //       function Bukuid(clicked) {
                    //     el_down.innerHTML = clicked;
                    // }    
                </script>

</body>

</html>
