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
                                    <li class="breadcrumb-item"><a href="kategori"><i class="fadeIn animated bx bx-book-add"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Kategori Buku</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                
                                {{-- <a id="table2-new-row-button" href="tambahkategori" class="btn btn-outline-info btn-sm mb-2">Tambah Kategori</a> --}}
                                <a data-bs-toggle="modal" 
                                data-bs-target="#modaltambah" class="btn btn-outline-info btn-sm mb-3">Tambah Kategori</a>
                               
                                <div class="table-responsive" > 
                                    <hr>
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered"
                                            style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Kategori Buku</th>
                                                    <th>Aksi</th>
                                                    

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <td>dd</td>
                                                <td>dd</td>
                                                <td>dd</td>
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
</body>

</html>
