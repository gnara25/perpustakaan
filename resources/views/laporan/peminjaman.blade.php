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
                                    <li class="breadcrumb-item"><a href="laporanpinjam"><i class="fadeIn animated bx bx-upload"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Peminjaman</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                <a id="table2-new-row-button" href="/cetaklaporan"
                                    class="btn btn-outline-info btn-sm mb-4"></i>PDF</a>
                                    {{-- <a id="table2-new-row-button" href="/export_excel"
                                    class="btn btn-outline-info btn-sm mb-4"></i>Excel</a> --}}
                                <div class="table-responsive">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Siswa</th>
                                                    <th>Kelas</th>
                                                    <th>Tanggal Peminjaman</th>
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
                                                        <td>{{$row->nama}}</td>
                                                        <td>{{ $row->kelas }}</td>
                                                        <td>{{ Carbon\Carbon::parse($row->tanggalpinjam)->format('d-m-Y') }}</td>
                                                        
                                                        <td>
                                                         <a class="btn btn-primary"
                                                            data-id="{{ $row->id }}"
                                                            onclick="btnDetail(this)">
                                                            <i class="fadeIn animated bx bx-show-alt"></i>
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

                     
                        @include('laporan.modaldetail')
                    
                    <!--end page-content-wrapper-->
                </div>
                <!-- end wrapper -->
                @include('template.script')

                   <script>
                    const btnDetail = (e) => {
                        const data_id = e.getAttribute('data-id')
                        $.ajax({
                            url: "/detailpinjam/" + data_id,
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
                        </tr>
                        `
                                })

                                $('#tbody-cart').html(td)
                                $("#Buku").modal('show')
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
                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif
                    @if (Session::has('error'))
                        toastr.error("{{ Session::get('error') }}")
                    @endif
                </script>
                 


</body>

</html>
