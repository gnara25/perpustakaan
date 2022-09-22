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
                        <div class="breadcrumb-title pe-3">Daftar Buku</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Daftar Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body">
                            <div>
                                <a id="table2-new-row-button" href="tambahbuku"
                                    class="btn btn-outline-info btn-sm mb-2">Tambah Buku</a>
                                    <button onclick="cetakbarcode('{{ route('cetakbarcode') }}')" class="btn btn-info btn-xs btn-flat"><i class="fa fa-barcode"></i> Cetak Barcode</button>
                                <div class="table-responsive">
                                    <hr>
                                    <div class="table-responsive">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>

                                                    <th>
                                                        <input type="checkbox" name="select_all" id="select_all">
                                                    </th>
                                                    <th>No</th>
                                                    <th>Nama Buku </th>
                                                    <th>Kategori Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Penerit</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Jumlah</th>
                                                    <th>Foto</th>
                                                    <th>Aksi</th>

                                                </thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            <td><input type="checkbox" name="select_all" id="select_all">
                                                            </td>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ $row->idkategori->kategori }}</td>
                                                            <td>{{ $row->kodebuku }}</td>
                                                            <td>{{ $row->penerbit }}</td>
                                                            <td>{{ $row->tahunterbit }}</td>
                                                            <td>{{ $row->jumlah }}</td>
                                                            <td> <img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px">
                                                            </td>
                                                            <td class="b">
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#exampleExtraLargeModal{{ $row->id }}"
                                                                    class="btn btn-success">
                                                                    <i class="fa-solid fa-square-pen"></i>
                                                                </a>
                                                                {{-- <a href="#" class="btn btn-primary"
                                                                    data-id="{{ $row->id }}"
                                                                    data-nama="{{ $row->nama }}">
                                                                    <i class="fa-solid fa-print"></i>
                                                                </a> --}}
                                                                <a href="#" class="btn btn-danger delete"
                                                                    data-id="{{ $row->id }}"
                                                                    data-nama="{{ $row->nama }}">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @include('buku.modalbuku')
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
                </script>
                <script>
                    $('#exampleVaryingModalContent').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var recipient = button.data('whatever') // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('New message to ' + recipient)
                        modal.find('.modal-body input').val(recipient)
                    });

                        $('#modal-form').validator().on('submit', function(e) {
                            if (!e.preventDefault()) {
                                $.post($('#modal-form form').attr('action'), $('#modal-form form').serialize())
                                    .done((response) => {
                                        $('#modal-form').modal('hide');
                                        table.ajax.reload();
                                    })
                                    .fail((errors) => {
                                        alert('Tidak dapat menyimpan data');
                                        return;
                                    });
                            }
                        });

                        $('[name=select_all]').on('click', function () {
                            $(':checkbox').prop('checked', this.checked);
                        });

                    function cetakbarcode(url) {
                        if ($('input:checked').length < 1) {
                            alert('kk');
                            return;
                        } else if ($('input:checked').length < 3) {
                            alert('pilih minimal 3');
                            return;
                        } else {
                            $('.from-buku')
                                .attr('action', url)
                                .attr('target', '_blank')
                                .submit();
                        }
                    }
                </script>


</body>

</html>
