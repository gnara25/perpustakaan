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
                               <a id="table2-new-row-button" href="scanner"
                                    class="btn btn-outline-info btn-sm mb-4 pr-3">Tambah Rekap</a>
                                <div class="row">
                                    <div class="table-responsive">
                                        <form action="" method="POST" class="from-buku">
                                            @csrf
                                            <table id="example" class="table table-striped table-bordered"
                                                style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Nisn</th>
                                                        <th>Nama Siswa</th>
                                                        <th>Jenis Kelamin</th>
                                                        <th>Kelas</th>
                                                        <th>Waktu</th>
                                                    </tr>
                                                </thead>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                <tbody>
                                                    @foreach ($data as $row)
                                                        
                                                        <tr>
                                                           
                                                            <td scope="row">{{ $no++ }}</td>
                                                            <td>{{ $row->nisn }}</td>
                                                            <td>{{ $row->nama }}</td>
                                                             <td>{{ $row->jeniskelamin }}</td>
                                                            <td>{{ $row->kelas }}</td>
                                                            <td>{{ $row->created_at }}</td>

                                                            
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
                    
                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script>
                  
                </script>


</body>

</html>
