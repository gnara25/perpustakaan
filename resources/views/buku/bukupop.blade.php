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
                                    <li class="breadcrumb-item"><a href="buku"><i class="fadeIn animated bx bx-book-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Buku Populer</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                <div class="row">
                                    <div class="table-responsive">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <th>No</th>
                                                    <th>Judul Buku </th>
                                                    <th>Kategori Buku</th>
                                                    <th>Tahun Terbit</th>
                                                    <th>Dipinjam</th>
                                                    <th>Foto</th></thead>
                                                <tbody>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    @foreach ($data as $row)
                                                    @if ($row->dipinjam > 0)
                                                        
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $row->namabuku }}</td>
                                                        <td>{{ $row->idkategori->kategori }}</td>
                                                        <td>{{ $row->tahunterbit }}</td>
                                                        <td>{{ $row->dipinjam }} Kali</td>
                                                        <td> <img src="{{ asset('fotobuku/' . $row->foto) }}"
                                                                alt="" style="width: 70px; height: 70px">
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
                    <!--end page-content-wrapper-->
                </div>

                <!-- end wrapper -->
                @include('template.script')

                @include('vendor.sweetalert.alert')

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

                    $('[name=select_all]').on('click', function() {
                        $(':example').prop('checked', this.checked);
                    });

                    function cetakbarcode(url) {
                        if ($('input:checked').length < 1) {
                            swal({
                                icon: "warning",
                                text: "Harap Pilih Buku"
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
</body>

</html>
