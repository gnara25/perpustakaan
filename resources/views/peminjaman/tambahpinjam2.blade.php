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
                    <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                        <div class="breadcrumb-title pe-3">Tambah Peminjaman</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjamn/Tambah Peminjaman
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="row">
                               <form action="" method="POST" enctype="multipart/form-data">             
                        <div class="row">
                            <div class="col-sm-5">
                                <table class="table table-striped">
                                    <tr style="background:yellowgreen">
                                        <td colspan="3">Data Transaksi</td>
                                    </tr>
                                    <tr>
                                        <td>No Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <input type="text" name="nopinjam" value="<?= $kd;?>" readonly class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tgl Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <input type="date" value="<?= date('Y-m-d');?>" name="tgl" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>ID Anggota</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" required autocomplete="off" name="nisn" id="search-box" placeholder="Contoh ID Anggota : AG001" type="text" value="">
                                                <span class="input-group-btn">
                                                    <a data-bs-toggle="modal"
                                                                data-bs-target="#exampleExtraLargeModal"
                                                                class="btn btn-primary">
                                                                <i class="fa-solid fa fa-search"></i>
                                                            </a>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Biodata</td>
                                        <td>:</td>
                                        <td>
                                            <div id="result_tunggu"> <p style="color:red">* Belum Ada Hasil</p></div>
                                            <div id="result"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Lama Peminjaman</td>
                                        <td>:</td>
                                        <td>
                                            <input type="number" required placeholder="Lama Pinjam Contoh : 2 Hari (2)" name="lama" class="form-control">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-sm-7">
                                <table class="table table-striped">
                                    <tr style="background:yellowgreen">
                                        <td colspan="3">Pinjam Buku</td>
                                    </tr>
                                    <tr>
                                        <td>Kode Buku</td>
                                        <td>:</td>
                                        <td>
                                            <div class="input-group">
                                                <input type="text" class="form-control" autocomplete="off" name="kodebuku" id="buku-search" placeholder="Contoh ID Buku : BK001" type="text" value="">
                                                <span class="input-group-btn">
                                                    <a data-bs-toggle="modal"
                                                                data-bs-target="#Bukuid"
                                                                class="btn btn-primary">
                                                                <i class="fa-solid fa fa-search"></i>
                                                            </a>
                                                </span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Data Buku</td>
                                        <td>:</td>
                                        <td>
                                            <div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
                                            <div id="result_buku"></div>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="pull-right">
                            <input type="hidden" name="tambah" value="tambah">
                            <button type="submit" class="btn btn-primary btn-md">Submit</button> 
          </form>
                            <a href="" class="btn btn-danger btn-md">Kembali</a>
                        </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end page-content-wrapper-->
            
                @include('peminjaman.modalbuku') 
                
                
                @include('peminjaman.modalanggota')
            </div>
            <!--end page-wrapper-->
            <!--start overlay-->
            <div class="overlay toggle-btn-mobile"></div>
            <!--end overlay-->
            <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i
                    class='bx bxs-up-arrow-alt'></i></a>
            <!--End Back To Top Button-->
            @include('template.footer')
        </div>
        <!-- end wrapper -->
        @include('template.script')

    <!-- /.modal --> 
    


</body>

        <script>
    $(".fileSelection1 #Select_File1").click(function (e) {
        document.getElementsByName('nisn')[0].value = $(this).attr("data_id");
        $('#exampleExtraLargeModal').modal('hide');
        $.ajax({
            type: "POST",
            url: "/result",
            data:'nisn='+$(this).attr("data_id"),
            beforeSend: function(){
                $("#result").html("");
                $("#result_tunggu").html('<p style="color:green"><blink>cu sebentar</blink></p>');
            },
            success: function(html){
                $("#result").html(html);
                $("#result_tunggu").html('');
            }
        });
    });
    </script>
      
    <script>
    // AJAX call for autocomplete 
    $(document).ready(function(){
        $("#search-box").keyup(function(){
            $.ajax({
                type: "POST",
                url: "/result",
                data:'nisn='+$(this).val(),
                beforeSend: function(){
                    $("#result").html("");
                    $("#result_tunggu").html('<p style="color:green"><blink>tu sebentar</blink></p>');
                },
                success: function(html){
                    $("#result").html(html);
                    $("#result_tunggu").html('');
                }
            });
        });
    });
    </script>

<script type="text/javascript">
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
    $(".fileSelection1 #Select_File2").click(function (e) {
        document.getElementsByName('kodebuku')[0].value = $(this).attr("data_id");
        $('#Bukuid').modal('hide');
        $.ajax({
            type: "POST",
            url: "/cart",
            data:'kodebuku='+$(this).attr("data_id"),
            beforeSend: function(){
                $("#result_buku").html("");
                $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
            },
            success: function(html){
                $("#result_buku").load("/buku_list");
                $("#result_tunggu_buku").html('');
            }
        });
    });
    </script>
      
    <script>
    // AJAX call for autocomplete 
    $(document).ready(function(){
        $("#buku-search").keyup(function(){
            $.ajax({
                type: "POST",
                url: "/cart",
                data:'kodebuku='+$(this).val(),
                beforeSend: function(){
                    $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                },
                success: function(html){
                    $("#result_buku").load("/buku_list");
                    $("#result_tunggu_buku").html('');
                }
            });
        });
    });
    </script>
</html>
