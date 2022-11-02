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
                                    <li class="breadcrumb-item"><a href="kategori"><i class="fadeIn animated bx bx-book-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Detail Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body">
                            <div>    
                                <a id="table2-new-row-button" href="/peminjaman" class="btn btn-outline-info btn-sm mb-2">Kembali Kepeminjaman</a>  
                                <div class="table-responsive">
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Buku</th>
                                                    <th>Kode Buku</th>
                                                    <th>Jumlah Buku Yang Dipinjam</th>
                                                    <th>Status Buku</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                @foreach ($data as $row)
                                                <?php
                                                            
                                                            $u_denda = 1000;
                                                            
                                                            $tgl1 = date('Y-m-d');
                                                            $tgl2 = $row->tanggalpengembalian;
                                                            
                                                            $pecah1 = explode('-', $tgl1);
                                                            $date1 = $pecah1[2];
                                                            $month1 = $pecah1[1];
                                                            $year1 = $pecah1[0];
                                                            
                                                            $pecah2 = explode('-', $tgl2);
                                                            $date2 = $pecah2[2];
                                                            $month2 = $pecah2[1];
                                                            $year2 = $pecah2[0];
                                                            
                                                            $jd1 = GregorianToJD($month1, $date1, $year1);
                                                            $jd2 = GregorianToJD($month2, $date2, $year2);
                                                            
                                                            $selisih = $jd1 - $jd2;
                                                            $denda = $selisih * $u_denda;
                                                            ?>
                                                    <tr>
                                                        <td scope="row">{{ $loop->iteration }}</td>
                                                        <td>{{$row->namabuku}}</td>
                                                        <td>{{$row->kodebuku}}</td>
                                                        <td>{{$row->jumlah}}</td>
                                                        <td>
                                                            <?php if ($selisih <= 0) { ?>
                                                            <span class="label label-primary">Masa
                                                                Peminjaman</span>
                                                            <?php } elseif ($selisih > 0) { ?>
                                                            <span class="label label-danger">
                                                                Rp.
                                                                <?= $denda ?>
                                                            </span>
                                                            <br> Terlambat :
                                                            <?= $selisih ?>
                                                            Hari
                                                        </td>
                                                        <?php } ?>
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
                    
                </script>


</body>

</html>
