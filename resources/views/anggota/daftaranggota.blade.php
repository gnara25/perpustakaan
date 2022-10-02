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
                                <a id="table2-new-row-button" href="tambahanggota"
                                    class="btn btn-outline-info btn-sm mb-2">Tambah Anggota</a>
                                {{-- <button onclick="cetakidcard('{{ route('cetakidcard') }}')"  class="btn btn-outline-primary btn-sm mb-2"><i class="fa fa-barcode"></i> Cetak ID Card</button> --}}
                                <div class="row">
                                    <hr>
                                    <div class="row">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        {{-- <th>
                                                            <input type="checkbox" name="select_all" id="select_all">
                                                        </th> --}}
                                                        <th>No.</th>
                                                        <th>Foto</th>
                                                        <th>Nisn</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Tgl.Lahir</th>
                                                        <th>Kelas</th>
                                                        <th>Alamat</th>
                                                        <th>Qr Code</th>
                                                        <th>Aksi</th>

                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($data as $row)
                                                        <tr>
                                                            {{-- <td><input type="checkbox" id="example" name="id[]" value="{{$row->id}}">
                                                            </td> --}}
                                                            <td scope="row">{{ $no++ }}</td>
                                                            <td>{{ $row->nisn }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                            <td>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}
                                                            </td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ $row->alamat }}
                                                            <td> {!! QrCode::size(100)->generate(Request::url()) !!}
                                                            </td>
                                                            <td>
                                                            <td> <img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px">
                                                            </td>
                                                            <td class="b">
                                                                <a data-bs-toggle="modal"
                                                                    data-bs-target="#exampleExtraLargeModal{{ $row->id }}"
                                                                    class="btn btn-success">
                                                                    <i class="fa-solid fa-square-pen"></i>
                                                                </a>
                                                                <a href="#" class="btn btn-danger delete"
                                                                    data-id="{{ $row->id }}"
                                                                    data-nama="{{ $row->nama }}">
                                                                    <i class="fa-solid fa-trash"></i>
                                                                </a>
                                                                {{-- <a href="/idcard/{{$row->id}}" target="_blank"
                                                                    class="btn btn-primary">
                                                                    <i class="fa-solid fa-eye"></i></a> --}}
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
                        @include('anggota.editanggota')
                    @endforeach
                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script>
                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif

                    @if (Session::has('error'))
                        toastr.error("{{ Session::get('error') }}")
                    @endif

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

                    $('#exampleVaryingModalContent').on('show.bs.modal', function(event) {
                        var button = $(event.relatedTarget) // Button that triggered the modal
                        var recipient = button.data('whatever') // Extract info from data-* attributes
                        // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                        // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                        var modal = $(this)
                        modal.find('.modal-title').text('New message to ' + recipient)
                        modal.find('.modal-body input').val(recipient)
                    });

                    // $('[name=select_all]').on('click', function () {
                    //         $(':example').prop('checked', this.checked);
                    //     });

                    // function cetakidcard(url) {
                    //     if ($('input:checked').length < 1) {
                    //         swal ({
                    //             icon: "warning",
                    //            text : "Harap Pilih Buku"
                    //         });
                    //         return;
                    //     } else {
                    //         $('.from-anggota')
                    //             .attr('action', url)
                    //             .attr('target', '_blank')
                    //             .submit();
                    //     }
                    // }
                </script>


</body>

</html>
