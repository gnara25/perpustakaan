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
                        <div class="breadcrumb-title pe-3">Laporan</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="denda"><i class="fadeIn animated bx bx-coin-stack"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Denda</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div id="grafik"></div>
                            <div>
                                <div class="table-responsive">
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Denda</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($data as $row)
                                                @if ($row->denda > 0)              
                                                <tr>
                                                <td>{{$no++}}</td>
                                                <td>{{$row->nama}}</td>
                                                <td>{{$row->kelas}}</td>
                                                <td>Rp. {{ number_format($row['denda'],2,'.','.') }}</td>
                                                <td>
                                                    <a class="btn btn-primary"
                                                            data-id="{{ $row->id }}"
                                                            onclick="btnDetail(this)">
                                                            <i class="fadeIn animated bx bx-show-alt"></i>
                                                    </a>
                                                </td>
                                                </tr>

                                                @endif

                                                @endforeach
                                            </tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    @include('laporan.detaildenda')

                    <!--end page-content-wrapper-->
                    @foreach ($data as $buku)
                        @include('laporan.modaldenda')
                    @endforeach
                </div>
                <!-- end wrapper -->
                @include('template.script')

                   <script type="text/javascript">

                    

                    const btnDetail = (e) => {
                        const data_id = e.getAttribute('data-id')
                        $.ajax({
                            url: "/detaildenda/" + data_id,
                            method: "GET",
                            success: function(datas) {
                                // console.log()
                                console.log("datanya adalah ", datas.datas)
                                let td = ''

                                datas.datas.forEach(val => {
                                    td += `
                        <tr>
                            <td>${val.namabuku}</td>
                            <td>${val.kodebuku}</td>
                            <td>${val.jumlah}</td>
                            <td>Rp.${val.denda}</td>
                        </tr>
                        `
                                })

                                $('#tbody-cart').html(td)
                                $("#Denda").modal('show')
                            }
                        })
                    }

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

                <script>
                    const btnmodalBuk = (e) => {
                        const data_id = e.getAttribute('data-id')
                        $.ajax({
                            url: "/modaldenda/" + data_id,
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

                                $('#tbody-cartbu').html(td)
                                $("#detail_buku").html(data)
                                $("#ModalBuk").modal('show')
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
                                    window.location = "/deletekategori/" + mahasiswaid + ""
                                    swal("Data Ini Berhasil Dihapus!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Data Ini Tidak Jadi Dihapus!");
                                }
                            });
                    });
                </script>

</body>

</html>
