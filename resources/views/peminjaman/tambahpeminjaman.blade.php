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
                                    <li class="breadcrumb-item active" aria-current="page">Peminjaman/Tambah Peminjaman
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
                                    <div class="form-group row mb-3">
                                        <label for="nisn" class="col-sm-4 col-form-label">No Transaksi :</label>
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('transaksi') is-invalid @enderror" id="transaksi" value="{{ 'PJM-'.$kd }}" 
                                                name="transaksi" readonly>
                                            @error('transaksi')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <label for="nama" class="col-sm-4 col-form-label">Nama Siswa </label>
                                        <div class="col-sm-8">
                                            
                                            <select class="form-control single-select @error('nama') is-invalid @enderror"
                                            name="nama" aria-label="Default select example" id="nama">
                                            <option value="" disabled selected> Pilih Nama Siswa </option>
                                            @foreach ($anggota as $anggota)
                                                <option value="{{ $anggota->id }}" data-kelas='{{$anggota->kelas}}'>
                                                    {{ $anggota->nama }}</option>
                                            @endforeach
                                            </select>
                                            @error('nama')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">  
                                      <label for="kelas" class="col-sm-4 col-form-label">Kelas </label> 
                                        <div class="col-sm-8">
                                            <input type="text"
                                                class="form-control @error('kelas') is-invalid @enderror" id="kelas"
                                                name="kelas" value="{{ old('kelas') }}" readonly>
                                            @error('kelas')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            
                                        </div>
                                    </div>
                                    
                                   
                                        <div class="form-group row mb-3">
                                                 <label for="tgl_lahir" class="col-sm-4 col-form-label">Tanggal Pengembalian
                                            </label>
                                            <div class="col-sm-8">
                                             <input type="date" value="{{date('Y-m-d', strtotime('+3 days'))}}"
                                                class="form-control text-center @error('tanggalpengembalian')
                                                is-invalid
                                                @enderror"
                                                id="tanggalpengembalian" name="tanggalpengembalian" >
                                             @error('tanggalpengembalian')
                                                <div class="invalid-feedback">{{ $message }}
                                                </div>
                                             @enderror
                                            </div>
                                        </div>

                                     <div class="form-group row mb-3">  
                                      <label for="kelas" class="col-sm-4 col-form-label">Kode Buku </label> 
                                             <div class="col-sm-8">
                                                <div class="input-group has-validation">
                                                     <select class="form-control single-select @error('kodebuku') is-invalid @enderror"
                                                name="kodebuku" aria-label="Default select example" id="kodebuku">
                                                <option value="" disabled selected> Pilih kodebuku Siswa </option>
                                                @foreach ($bukuid as $buku)
                                                    <option value="{{ $buku->id }}" data-namabuku='{{$buku->namabuku}}'>
                                                        {{ $buku->kodebuku }}</option>
                                                @endforeach 
                                                </select>
                                                @error('kodebuku')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-btn">
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#Bukuid"
                                                                class="btn btn-primary">
                                                                <i class="fa-solid fa fa-search"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                    </div>
                                            <table  class="table table-striped table-bordered"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>No.</th>
                                                            <th>Judul Buku</th>
                                                            <th>Kode Buku</th>
                                                            <th>Jumlah</th>
                                                            <th>Aksi</th>
                                                        </tr>
                                                    </thead>
                                                    @php
                                                        $no = 1;
                                                    @endphp
                                                    <tbody id="tbody-cart">
                                                    </tbody>
                                            </table>                                  
                                    <div id="result_tunggu_buku"> <p style="color:red">* Belum Ada Hasil</p></div>
                                            <div id="result_buku"></div>
                                        
                                    </div> 
                                  <!--   <div id="table_field">
                                        <div class="row mb-3 mr-4 ml-4">

                                            <div class="col-md-4">
                                                <label for="validationCustom01" class="form-label"> Kode Buku :</label>
                                                <select class="form-control single-select @error('kodebuku') is-invalid @enderror"
                                                name="kodebuku" aria-label="Default select example" id="kodebuku">
                                                <option value="" disabled selected> Pilih kodebuku Siswa </option>
                                                @foreach ($bukuid as $buku)
                                                    <option value="{{ $buku->id }}" data-namabuku='{{$buku->namabuku}}'>
                                                        {{ $buku->kodebuku }}</option>
                                                @endforeach 
                                                </select>
                                                @error('kodebuku')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                @enderror
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustom02" class="form-label"> Judul Buku :</label>
                                                <input type="text" class="form-control " id="namabuku"
                                                    value="" name="namabuku">
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <label for="validationCustomUsername" class="form-label">Jumlah Buku :</label>
                                                <div class="input-group has-validation">
                                                    <input type="text" class="form-control" id="validationCustomUsername"
                                                        name="jumlah">
                                                    <div class="invalid-feedback">
                                                        Please choose a username.
                                                    </div>
                                                    <div class="col-md-4">
                                                        <span class="input-group-btn">
                                                            <a data-bs-toggle="modal"
                                                                data-bs-target="#Bukuid"
                                                                class="btn btn-primary">
                                                                <i class="fa-solid fa fa-search"></i>
                                                            </a>
                                                        </span>
                                                        <span class="input-group-btn">
                                                               <a id="idf" class="btn btn-primary" onclick="AddMasterDetail()">
                                                                <i class="fa-solid fa-plus-circle"></i>
                                                            </a>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                    </div> -->
                                        <center>
                                            <div class="mb-4 mt-4">
                                                <button type="submit"
                                                    class="btn btn-info btn-icon-split col-sm-3 mb-3">
                                                    <span class="icon text-white-50">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </span>
                                                    <span class="text">Tambah Peminjaman</span>
                                                </button>
                                                <div class="mb-3">
                                                    <a href="/peminjaman"
                                                        class="btn btn-dark btn-icon-split mb-3 col-sm-3">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-arrow-circle-left"></i>
                                                        </span>
                                                        <span class="text">Kembali</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </center>
                                       {{-- <button type="submit"  class="btn btn-primary">Tambah</button>
                                <a href="pemasukan" class="btn btn-primary fas fa-arrow-circle-left">Kembali</a> --}}
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
                <!--end page-content-wrapper-->
            
                @include('peminjaman.modalbuku')
                
                
                {{-- @include('peminjaman.modalanggota') --}}
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
            const selection1 = document.getElementById('kodebuku');
                selection1.onchange = function(e) {
                const namabuku = e.target.options[e.target.selectedIndex].dataset.namabuku
                document.getElementById('namabuku').value = namabuku;
            }

            $(document).ready(function() {
                //Default data table
                $('#mytable').DataTable();
                var table = $('#example2').DataTable({
                    lengthChange: false,
                    buttons: ['copy', 'excel', 'pdf', 'print', 'colvis']
                });
                table.buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');
            });

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
           <!--  <script type="text/javascript">
                 function AddMasterDetail() {
                var idf = document.getElementById("idf").value;
                stre=" <div class='row mb-3 mr-4 ml-4' id='srow" + idf + "'>";
                stre=stre+"<div class='col-md-4 mb-4'> <label for='validationCustom01' class='form-label'> Kode Buku </label> <select class='form-control kodebuku' id='kodebukus" + idf + "' data-idf='" + idf + "' name='kodebuku[]'  aria-label='Default select example'> <option value='' disabled selected> Pilih kodebuku Siswa </option> @foreach ($bukuid as $k) <option value='{{ $k->id }}' data-judulbuku='{{$k->namabuku}}'> {{ $k->kodebuku }}</option> @endforeach  </select> @error('kodebuku') <div class='invalid-feedback'>{{ $message }}</div> @enderror <div class='valid-feedback'> Looks good! </div></div>";
                stre=stre+"<div class='col-md-4 mb-4'> <label for='validationCustom02' class='form-label'> Judul Buku</label> <input type='text' class='form-control c-namabuku' id='namabuku" + idf + "' value='' name='namabuku[]'> <div class='valid-feedback'> Looks good! </div> </div>";

                stre=stre+"<div class='col-md-4 mb-4'> <label for='validationCustomUsername' class='form-label'>Jumlah Buku</label> <div class='input-group has-validation'> <input type='text' class='form-control' id='validationCustomUsername' name='Jumlah'> <div class='invalid-feedback'> Please choose a username. </div> <div class='col-md-4'> <span class='input-group-btn'> <a data-bs-toggle='modal' data-bs-target='#exampleExtraLargeModal' class='btn btn-primary'> <i class='fa-solid fa fa-search'></i> </a> </span><span class='input-group-btn'><a  onclick='removeFormField(\"#srow" + idf + "\"); return false;' class='btn btn-danger'><i class='fa-solid fa-trash'></i></a></span></div></div></div>";
                stre=stre+"</div>";         

            $("#table_field").append(stre);    
            idf++;
            document.getElementById("idf").value = idf;
        }
         function removeFormField(idf) {
            $(idf).remove();
        }
        $(document).on("change", ".kodebuku", function(e) {
            var select = $(this);
            var id = select.val();
            var idf = select.data("idf");

         $.ajax({
            url:'/getBooks',
            method: 'GET',
            dataType: 'JSON',
                }).done(function(data) {
            $("#namabuku" + idf).val(data[0].namabuku);
        });
    });
            </script> -->
            <script src="assets/plugins/select2/js/select2.min.js"></script>
    <script>
        $('.single-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
        $('.multiple-select').select2({
            theme: 'bootstrap4',
            width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            placeholder: $(this).data('placeholder'),
            allowClear: Boolean($(this).data('allow-clear')),
        });
    </script>
            <!-- <script type="text/javascript">
                $(document).ready(function() {
                    getBooks();
                    function getBooks(){
                        $.ajax({
                            method: 'GET',
                            url : '/getBooks',
                            dataType: 'JSON',
                            success: function(e){
                                var html = ""
                                e.map(val => {
                                    html += `<option value="${val.id}"> ${val.kodebuku} </option>`
                                })
                                $('.c-kodebuku').html(html)
                                $('.c-namabuku').val(e[0].namabuku)
                                console.log($('.c-namabuku'))
                            }
                        })
                    }
                    // //add field
                    // var aidi = 1;
                    $('#add').on('click',function(){
                       var html = '' ;
                       html+= '<div class="row mb-3 mr-4 ml-4" id="konten">';
                       html+= '<div class="col-md-4"> <label for="validationCustom01" class="form-label"> Kode Buku </label> <select class="form-control c-kodebuku" id="kodeid" name="kodebuku" aria-label="Default select example"> <option value="" disabled selected> Pilih kodebuku Siswa </option> @foreach ($bukuid as $k) <option value="{{ $k->id }}" data-judulbuku="{{$k->namabuku}}"> {{ $k->kodebuku }}</option> @endforeach  </select> @error('kodebuku') <div class="invalid-feedback">{{ $message }}</div> @enderror <div class="valid-feedback"> Looks good! </div></div>' ;
                       html+= `<div class="col-md-4"> <label for="validationCustom02" class="form-label"> Judul Buku</label> <input type="text" class="form-control c-namabuku" id="namabukuid" value="" name="namabuku"> <div class="valid-feedback"> Looks good! </div> </div>`;
                       html+= '<div class="col-md-4"> <label for="validationCustomUsername" class="form-label">Jumlah Buku</label> <div class="input-group has-validation"> <input type="text" class="form-control" id="validationCustomUsername" name="Jumlah"> <div class="invalid-feedback"> Please choose a username. </div> <div class="col-md-4"> <span class="input-group-btn"> <a data-bs-toggle="modal" data-bs-target="#exampleExtraLargeModal" class="btn btn-primary"> <i class="fa-solid fa fa-search"></i> </a> </span><span class="input-group-btn"><a id="remove" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a></span></div></div></div>';
                       html+= '</div>';
                       
                       $('#table_field').append(html);
                        getBooks();
                    });
                });

                $(document).on('click','#remove',function(){
                    $(this).closest('#konten').remove();
                });

             
            </script>
 -->
 <script>
    // $(".fileSelection1 #Select_File2").click(function (e) {
    //     document.getElementsByName('kodebuku')[0].value = $(this).attr("data_id");
    //     $('#Bukuid').modal('hide');
    //     $.ajax({
    //         type: "POST",
    //         url: "/cartpost",
    //         data:'kodebuku='+$(this).attr("data_id"),
    //         beforeSend: function(){
    //             $("#result_buku").html("");
    //             $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
    //         },
    //         success: function(html){
    //             $("#result_buku").load("/buku_list");
    //             $("#result_tunggu_buku").html('');
    //         }
    //     });
    // });
</script>

    <script>
        $(document).ready(function() {

            getCartList()
            function getCartList() {
                $.ajax({
                    method: 'GET',
                    url: '/cartlist',
                    dataType: 'JSON',
                    success: function(e){
                        let html = ''
                        let no = 1;
                        e.data.map(val => {
                            html += `<tr>
                                        <td scope="row">${no++}</td>
                                        <td>${val.name}</td>
                                        <td>${val.attributes.kodebuku}</td>
                                        <td>${val.quantity}</td>
                                        <td class="hidden text-right md:table-cell">
                                        <a href="/remove/${val.id} "onclick="return confirm('apakah anda yakin ingin menghapus data ini');"
                                    class="btn btn-danger"> X</a>
            
                                        </td>
                                    </tr>`
                        })

                        $('#tbody-cart').html(html)
                    }
                })
            }

            $('#form-tambah').submit(function(e) {
                e.preventDefault()

                const fd = new FormData(document.getElementById('form-tambah'))

                $.ajax({
                    method: 'POST',
                    url: '/cartpost',
                    processData: false,
                    contentType: false,
                    cache: false,
                    data: fd,
                    dataType: 'JSON',
                    success: function(e){
                        console.log(e)
                        getCartList()
                        $('#Bukuid').hide()
                    }
                })
            })

        })
    </script>

 <script>
    // AJAX call for autocomplete 
    // $(document).ready(function(){
    //     $("#kodebuku").keyup(function(){
    //         $.ajax({
    //             type: "POST",
    //             url: "/cartpost",
    //             data:'kodebuku='+$(this).val(),
    //             beforeSend: function(){
    //                 $("#result_tunggu_buku").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
    //             },
    //             success: function(html){
    //                 $("#result_buku").load("/buku_list");
    //                 $("#result_tunggu_buku").html('');
    //             }
    //         });
    //     });
    // });
    </script>



</body>

</html>
