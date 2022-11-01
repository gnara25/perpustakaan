                        
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
                        <div class="breadcrumb-title pe-3">Peminjaman</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class="bx bx-home-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjaman Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body">
                            <div>

                                <a id="table2-new-row-button" href="/tambahpeminjaman"
                                    class="btn btn-outline-info btn-sm mb-2">Tambah Peminjaman</a>

                                {{-- @if (auth()->user()->role == 'petugas')
                                    <a id="table2-new-row-button" href="/scane" class="btn btn-outline-info btn-sm mb-2">Scane QR Code</a>
                                    @endif  --}}
                                <div class="row">
                                    <hr>
                                    <div class="table-responsive">
                                        <table  class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Judul Buku</th>
                                                        <th>Kode Buku</th>
                                                        <th>Jumlah</th>
                                                        <th></th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($cartbuku as $buku)
                                                        <tr>
                                                            <td scope="row">{{ $loop->iteration }}</td>
                                                            <td>{{ $buku->name }}</td>
                                                            <td>{{ $buku->attributes->kodebuku }}</td>
                                                            <td>{{ $buku->quantity }}</td>
                                                            <td>{{ $buku->price }}</td>
                                                            <td >
                                                            {{-- <form action="{{ route('remov') }}" method="POST">
                                                            @csrf
                                                            <input type="hidden" value="{{ $buku->id }}" name="id">
                                                            <button class="btn btn-danger">x</button>
                                                            </form> --}}
                                                            
                                                            
                                                        
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

                <script>
                   

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
                </script>


</body>

</html>
