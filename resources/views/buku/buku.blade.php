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

    <!-- Favicon -->
   @include('template.head')
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <!-- Menu -->

        @include('template.sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

            @include('template.navbar')

          <!-- / Navbar -->

          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Daftar Buku</span>
              </h4>
              <a href="/tambahbuku" type="button" class="btn btn-success mb-4">Tambah Data</a>
              <!-- Bordered Table -->
              <div class="card">
                <h5 class="card-header"></h5>
                <div class="card-body">
                  <div class="table-responsive text-nowrap">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Foto</th>
                          <th>Nama Buku</th>
                          <th>Kategori buku</th>
                          <th>Kode Buku</th>
                          <th>Penerbit</th>
                          <th>Tahun Terbit</th>
                          <th>Jumlah Buku</th>
                          <th>Opsi</th>
                        </tr>
                      </thead>
                      <tbody>
                                @php
                                    $no = 1;
                                @endphp

                                @foreach ($data as $row)
                                    <tr>
                                    <td>
                            
                                        <strong>{{$no++}}</strong>
                                    </td>
                                    <td>
                                        <img src="{{ asset('fotobuku/'.$row->foto)}}" style="width: 100px; height: 100px;">
                                    </td>
                                    <td>{{$row->nama}}</td>
                                    <td>{{$row->idkategori ? $row->idkategori->kategori : '-' }}</td>
                                    <td>{{$row->kodebuku}}</td>
                                    <td>{{$row->penerbit}}</td>
                                    <td>{{$row->tahunterbit}}</td>
                                    <td>{{$row->jumlah}}</td>
                                
                                        <td>
                                            <a href="/editbuku/{{ $row->id }}" class="btn btn-info">Edit</a>
                                            <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}">Hapus</a>
                                        </td>                     
                                    
                                    </tr>
                                @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <!--/ Bordered Table -->
            </div>
            <!-- / Content -->

            <!-- Footer -->
            @include('template.footer')
            <!-- / Footer -->

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

    @include('template.script')
  </body>
</html>
