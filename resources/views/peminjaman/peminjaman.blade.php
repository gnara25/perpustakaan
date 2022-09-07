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
    @include('template.head')
    
  </head>

  <body>
    <!-- data tabel -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.12.1/datatables.min.css"/>

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
               <center><span class="text-muted fw-light">Peminjaman</span></center> 
              </h4>
              <!-- Bordered Table -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <a href="/tambahpeminjaman" class="btn btn-warning" class="icon text-white-50">Pinjam Buku</a>
                    <a href="#" class="btn btn-info" class="icon text-white-50"> kode QR</a>
                </div>
               
                <div class="card">
                  <h5 class="card-header"></h5>
                  <div class="card-body">
                    <div class="table-responsive ">
                      <table class="table table-bordered" id="myTable">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Siswa</th>
                          <th>Kelas</th>
                          <th>Judul Buku</th>
                          <th>Tgl. Peminjaman</th>
                          <th>Tgl. Pengembalian</th>
                          <th>Jumlah Buku</th>
                          <th >Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        @php
                            $no = 1;
                        @endphp

                    @foreach ($data as $row)
                       <tr>
                          <th scope="row">{{ $no++ }}</th>
                          <td> {{ $row->nama }} </td>
                          <td>{{ $row->kelas }}</td>
                          <td>{{ $row->namabuku }}</td>
                          <td>{{ $row->tanggalpinjam }}</td>
                          <td>{{ $row->tanggalpengembalian }}</td>
                          <td>{{ $row->jumlah }}</td>
                          
                         <td class="b">
                              <a href="/editpeminjaman/{{ $row->id }}"
                                  class="btn btn-success">
                                  <i class="fa-solid fa-square-pen"></i>
                              </a>
                              <a href="#" class="btn btn-danger delete"
                                  data-id="{{ $row->id }}"
                                  data-nama="{{ $row->nama }}">
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
              <!--/ Bordered Table -->
            </div>
            <!-- / Content -->

           @include('template.footer')

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
    @include('template.script')

    <!-- data tabel -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/datatables.min.js"></script>
    <script>
      $(document).ready( function () {
          $('#myTable').DataTable();
      });
  </script>

<script>
  $('.delete').click(function() {
      var mahasiswaid = $(this).attr('data-id');
      var nama = $(this).attr('data-nama');
      swal({
              title: "YAKIN?",
              text: "Kamu Akan Menghapus Data Manajer Dengan Nama " + nama + " ",
              icon: "warning",
              buttons: true,
              dangerMode: true,
          })
          .then((willDelete) => {
              if (willDelete) {
                  window.location = "/deletepeminjaman/" + mahasiswaid + ""
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
