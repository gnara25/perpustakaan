<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>Perpustakaan || Kita</title>

    <meta name="description" content="" />
    @include('templates.head')
    
  </head>

  <body>
    <!-- data tabel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('templates.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

        @include('templates.navbar')
            
          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              {{-- <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light"></span>Peminjaman
              </h4> --}}
              <!-- Bordered Table -->
              <div class="col-xxl">
                <div class="card mb-4">
                  {{-- <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                  </div> --}}
                  <div class="card-body">
                    <form action="/editpeminjamanpost/{{$data->id}}" method="POST" enctype="multipart/form-data">
                      @csrf
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Siswa</label>
                        <div class="col-sm-10"> 
                          <input type="text" name="nama" class="form-control" id="basic-default-name" placeholder="Nama Siswa" value="{{$data->nama}}" readonly>  
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Kelas</label>
                        <div class="col-sm-10">
                          <div class="form-check form-check-inline ">
                            <input
                                class="form-check-input @error('kelas') is-invalid @enderror"
                                type="radio" name="kelas" id="inlineRadio1"
                                value="X"
                                <?php echo $data->kelas == 'X' ? 'checked' : ''; ?>>
                            <label class="form-check-label"
                                for="inlineRadio1">X</label>
                        </div>
                        <div class="form-check form-check-inline ">
                            <input
                                class="form-check-input @error('kelas') is-invalid @enderror"
                                type="radio" name="kelas" id="inlineRadio1"
                                value="XI"
                                <?php echo $data->kelas == 'XI' ? 'checked' : ''; ?>>
                            <label class="form-check-label"
                                for="inlineRadio1">XI
                        </div>
                        <div class="form-check form-check-inline ">
                            <input
                                class="form-check-input @error('kelas') is-invalid @enderror"
                                type="radio" name="kelas" id="inlineRadio1"
                                value="XII"
                                <?php echo $data->kelas == 'XII' ? 'checked' : ''; ?>>
                            <label class="form-check-label"
                                for="inlineRadio1">XII
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Judul Buku</label>
                        <div class="col-sm-10">
                          <input type="text" name="namabuku" class="form-control" id="basic-default-name" placeholder="Judul Buku" value="{{$data->namabuku}}">
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Tgl.Peminjaman</label>
                        <div class="col-sm-10">
                          <input type="date" name="tanggalpinjam" class="form-control" id="basic-default-name" value="{{$data->tanggalpinjam}}" >
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Tgl.Pengembalian</label>
                        <div class="col-sm-10">
                          <input type="date" name="tanggalpengembalian" class="form-control" id="basic-default-name" value="{{$data->tanggalpengembalian}}" >
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-phone">Jumlah Buku</label>
                        <div class="col-sm-10">
                          <input type="number" name="jumlah" class="form-control" id="basic-default-name" placeholder="Jumlah Buku" value="{{$data->jumlah}}" >
                        </div>
                      </div>
                      <div class="row justify-content-end">
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Tambah</button>
                          <a type="submit" href="/peminjaman" class="btn btn-dark">Kembali</a>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
            </div>
            <!-- / Content -->

           @include('templates.footer')

            <div class="content-backdrop fade"></div>
          </div>
          <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
      </div>

      <!-- Overlay -->
      <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    @include('templates.script')

    <!-- data tabel -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      });
  </script>


  </body>
</html>
