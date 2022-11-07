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
                        <div class="breadcrumb-title pe-3">Laporan</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="pengembalian"><i class="fadeIn animated bx bx-download"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Pengembalian </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
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
                                                        <th>No.Tansaksi </th>
                                                        <th>Nama Siswa </th>
                                                        <th>kelas</th>
                                                        <th>Tanggal Pengembalian</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->transaksi }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ Carbon\Carbon::parse($row->tanggalpengembalian)->format('d-m-Y') }}
                                                            </td>
                                                            <td>
                                                                <a class="btn btn-outline-info"
                                                                        data-id="{{ $row->id }}" id=""
                                                                        onclick="btnmodalBK(this)">
                                                                        <i class="fadeIn animated bx bx-show-alt"></i>
                                                                        buku yang dikembalikan
                                                                    </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end page-content-wrapper-->
                    @foreach ($data as $row)
                        @include('pengembalian.modalBK')
                    @endforeach
                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script>
                    const btnmodalBK = (e) => {
                        const data_id = e.getAttribute('data-id')
                        $.ajax({
                            url: "/modalBK/" + data_id,
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
                        </tr>
                        `
                                })

                                $('#tbody-cartbuku').html(td)
                                $("#detail_buku").html(data)
                                $("#ModalBk").modal('show')
                            }
                        })
                    }

                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
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
                                    window.location = "/deletepengembalian/" + mahasiswaid + ""
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
                </script>


</body>

</html>
