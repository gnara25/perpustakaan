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
                        <div class="breadcrumb-title pe-3">Scane Qr Code</div>
                        <div class="ps-3">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 p-0">
                                    <li class="breadcrumb-item"><a href="beranda"><i class='bx bx-home-alt'></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Peminjamn/Scane Qr Code
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4" style="text-center">
                                    <div id="reader" width="600px"></div>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="scane" id="scane" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
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

    @include('vendor.sweetalert.alert')

    {{-- <script type="text/javascript">
        @if (Session::has('error'))
            toastr.error("{{ Session::get('error') }}")
        @endif

        const selection = document.getElementById('nama');
        selection.onchange = function(e) {
            const kelas = e.target.options[e.target.selectedIndex].dataset.kelas
            document.getElementById('kelas').value = kelas;
        }
    </script> --}}

    <!-- scane -->

    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>

    <script>
        function onScanSuccess(decodedText, decodedResult) {
            // handle the scanned code as you like, for example:
            // console.log(`Code matched = ${decodedText}`, decodedResult);
            $("#scane").val(decodedText)

            let id = decodedText

            csrf_token = $('meta[name="csrf-token"]').attr('content');

            swal.fire({
                title: 'success',
                text: 'Berhasil Scane Barcode',
                showCancelButton : true,
                confirmButtoncollor : '#3085d6',
                cancelButtoncollor : '#d33',
                confirmButtonText: 'Ok '
            }).then((scane) => {
                if(scane.value){
                    $.ajax({
                        url : "{{ route('validasi')}}",
                        type : 'post',
                        data : {
                            '_method' : 'POST',
                            '_token' : csrf_token,
                            'qr_code' : id
                        },
                        success: function(response){
                            swal.fire({
                                icon : 'success',
                                type : 'success',
                                title : 'success!',
                                text : 'ok'
                            });
                        },
                        error: function(xhr){
                            swal.fire({
                                type : 'error',
                                title : 'opps!',
                                text : 'error'
                            })
                        }  
                    })
                }
            })
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
            "reader", {
                fps: 10,
                qrbox: {
                    width: 250,
                    height: 250
                }
            },
            /* verbose= */
            false);
        html5QrcodeScanner.render(onScanSuccess);
    </script>
</body>

</html>
