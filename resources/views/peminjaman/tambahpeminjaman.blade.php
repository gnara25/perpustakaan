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
                                <form action="/insert" method="POST" enctype="multipart/form-data">
                                    @csrf

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
                                                        <input type="text" name="nopinjam" value="" readonly
                                                            class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Tgl Peminjaman</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="date" value="<?= date('Y-m-d') ?>"
                                                            name="tgl" class="form-control">
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>ID Anggota</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" required
                                                                autocomplete="off" name="anggota_id" id="search-box"
                                                                placeholder="Contoh ID Anggota : AG001" type="text"
                                                                value="">
                                                            <span class="input-group-btn">
                                                                <a data-toggle="modal" data-target="#TableAnggota"
                                                                    class="btn btn-primary"><i
                                                                        class="fa fa-search"></i></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Biodata</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div id="result_tunggu">
                                                            <p style="color:red">* Belum Ada Hasil</p>
                                                        </div>
                                                        <div id="result"></div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Lama Peminjaman</td>
                                                    <td>:</td>
                                                    <td>
                                                        <input type="number" required
                                                            placeholder="Lama Pinjam Contoh : 2 Hari (2)" name="lama"
                                                            class="form-control">
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
                                                            <input type="text" class="form-control"
                                                                autocomplete="off" name="buku_id" id="buku-search"
                                                                placeholder="Contoh ID Buku : BK001" type="text"
                                                                value="">
                                                            <span class="input-group-btn">
                                                                <a data-toggle="modal" data-target="#TableBuku"
                                                                    class="btn btn-primary"><i
                                                                        class="fa fa-search"></i></a>
                                                            </span>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Data Buku</td>
                                                    <td>:</td>
                                                    <td>
                                                        <div id="result_tunggu_buku">
                                                            <p style="color:red">* Belum Ada Hasil</p>
                                                        </div>
                                                        <div id="result_buku"></div>
                                                    </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="pull-left">
                                         <button type="submit" class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                            <span class="icon text-white-50">
                                                <i class="fas fa-plus-circle"></i>
                                            </span>
                                            <span class="text">Tambah Peminjaman</span>
                                        </button>
                                        <div class=" mb-3">
                                            <a href="/peminjaman" class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-arrow-circle-left"></i>
                                                </span>
                                                <span class="text">Kembali</span>
                                            </a>
                                    
                                    </div>
                                    {{-- <button type="submit"  class="btn btn-primary">Tambah</button>
                                <a href="pemasukan" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('peminjaman.modalbuku')

            <!--end page-content-wrapper-->
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

    

    <script type="text/javascript">
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif

        const selection = document.getElementById('nama');
        selection.onchange = function(e) {
            const kelas = e.target.options[e.target.selectedIndex].dataset.kelas
            document.getElementById('kelas').value = kelas;
        }
    </script>

<script>
	$(".fileSelection1 #Select_File2").click(function (e) {
		document.getElementsByName('buku_id')[0].value = $(this).attr("data_id");
		$('#TableBuku').modal('hide');
		$.ajax({
			type: "POST",
			url: "",
			data:'kode_buku='+$(this).attr("data_id"),
			beforeSend: function(){
				$("#result_buku").html("");
				$("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
			},
			success: function(html){
				$("#result_buku").load();
				$("#result_tunggu_buku").html('');
			}
		});
	});
	</script>
</body>

</html>
