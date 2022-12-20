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
                        <div class="breadcrumb-title pe-3">Daftar Anggota</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="daftaranggota"><i
                                                class="fadeIn animated bx bx-user-circle"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Siswa</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                @if (auth()->user()->role == 'admin')
                                <a id="table2-new-row-button" href="tambahanggota"
                                    class="btn btn-outline-info btn-sm mb-2 pr-3">Tambah Siswa</a>
                                <a data-bs-toggle="modal" data-bs-target="#importexcel" class="btn btn-outline-success btn-sm mb-2">Import Excel 
                                </a>    
                                @endif

                                  <button onclick="cetakid('{{ route('cetakidcard') }}')"
                                        class="btn btn-outline-primary btn-sm mb-2"> Cetak
                                        ID Card</button>
                                <div class="row">
                                    <div class="table-responsive">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                   <th>
                                                        <input type="checkbox" name="select_all" id="select_all">
                                                    </th>
                                                        <th>No.</th>
                                                        <th>Foto</th>
                                                        <th>Nisn</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Tgl.Lahir</th>
                                                        <th>Kelas</th>
                                                        <th>Alamat</th>
                                                        {{-- <th>Qr Code</th> --}}
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($data as $row)
                                                        
                                                        <tr>
                                                            <td><input type="checkbox" id="example" name="id[]" value="{{$row->id}}"  class="checkbox_check">
                                                            </td> 
                                                            <td scope="row">{{ $no++ }}</td>
                                                            <td><img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                    alt="" style="width: 70px; height: 70px">
                                                            </td>
                                                            <td>{{ $row->nisn }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                             <td>{{ $row->jenis_kelamin }}</td>
                                                            <td>{{ Carbon\Carbon::parse($row->tgl_lahir)->format('d-m-Y') }}
                                                            </td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ $row->alamat }}</td>
                                                            {{-- <td> {!! QrCode::size(65)->generate($row->nisn) !!}
                                                            </td> --}}

                                                            <td class="b">
                                                                <a href="/detail/{{ $row->id }}"
                                                                    class="btn btn-info">
                                                                    <i class="fadeIn animated bx bx-show-alt"></i>
                                                                </a>
                                                                @if (auth()->user()->role == 'admin')
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
                                                                @endif

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
                    @include('anggota.importexcel')
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

                    function cetakbarcode(url) {
                        if ($('input.checkbox_check').is(':checked')) {
                            $('.from-buku')
                                .attr('action', url)
                                .attr('target', '_blank')
                                .submit();
                           
                        } else {
                            swal({
                                icon: "warning",
                                text: "Harap Pilih Buku"
                            });
                            return; 
                        }
                    }

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
                </script>


</body>

</html>
