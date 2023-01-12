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
                        <div class="breadcrumb-title pe-3">User</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="buku"><i class="fadeIn animated bx bx-book-add"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Keranjang</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                
                              
                               
                                <div class="table-responsive" > 
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Buku</th>
                                                    <th>Judul Buku</th>
                                                    <th>Jumlah Buku</th>
                                                    <th>Aksi</th>
                                           

                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($data as $row)
                                                    <tr>
                                                        <td scope="row">{{ $no++ }}</td>
                                                       <td>{{ $row->attributes->kodebuku }}</td>
                                                        <td>{{ $row->name }}</td>
                                                       <td>{{ $row->quantity }}</td>
                                                        <td class="b">
                                                            <a href="/hapuscart/{{$row->id}}" class="btn btn-danger"> hapus
                                                                <i class="fa-solid fa-trash"></i>
                                                            </a>
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
                @include('kategori.modaltambah')
                <!-- end wrapper -->
                @include('template.script')


                <script>
                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif
                    @if (Session::has('error'))
                        toastr.error("{{ Session::get('error') }}")
                    @endif
                    
                </script>

                <script>
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
                                    window.location = "/deletekategori/" + mahasiswaid + ""
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
                {{-- <script>
                    function create() {
                        $.get("{{ url ('create')}}", {}, function(data, kategori) {
                            $("#pages").html(data);
                            $("#modaltambah").modal('show');
                        });
                     }

                    function createmodal() {
                        var kategori = $("#kategori").val();
                        $.ajax({
                            type: "get",
                            url: "{{ url('createmodal') }}",
                            data: "kategori=" + kategori,
                            success: function(data) {
                                console.log(data)
                            }
                        });
                    }

                </script> --}}
</body>

</html>
