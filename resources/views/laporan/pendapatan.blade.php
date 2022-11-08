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
                                    <li class="breadcrumb-item"><a href="Pendapatan"><i class="fadeIn animated bx bx-book-alt"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Pendapatan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card">
                        <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">Bulan</th>
                                                    <th class="text-center">Tahun</th>
                                                    <th class="text-center">Pendapatan</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $no = 1;
                                            @endphp
                                            <tbody>
                                                @foreach ($harga as $wor)
                                                    <tr>
                                                        <td class="text-center">{{$wor->month}}</td>
                                                        <td class="text-center">{{$wor->year}}</td>
                                                        <td class="text-center">Rp {{ number_format($wor['denda'],2,'.','.') }}</td>                 
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                        </table>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!--end page-content-wrapper-->
                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script type="text/javascript">
                  

                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif
                    @if (Session::has('error'))
                        toastr.error("{{ Session::get('error') }}")
                    @endif
                    
                </script>

</body>

</html>
