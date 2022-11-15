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
                                    <li class="breadcrumb-item"><a href="pendapatan"><i
                                                class="bx bx-line-chart"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page"> Pendapatan</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!--end breadcrumb-->

                    <div class="card radius-15">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-2" style="float: right;">
                                    <label class="mb-1" style="font-size: 100%;"> TAHUN :</label>
                                    <form action="{{ url('filter')}}" method="get">
                                        @csrf
                                        <select name="year" id="tahun">
                                            <?php 
                                                $year = date('Y');
                                                $min = $year - 1;
                                                $max = $year;
                                                for ($i = $max; $i >= $min; $i--){
                                                    echo '<option value=' .$i .'>' . $i .'</option>'; 
                                                }                                           
                                             ?>
                                        </select>
                                    </form>
                                    </select>
                                </div>
                            </div>
                            <div class="chart radius-15 mb-5">
                                <figure class="highcharts-figure">
                                    <div id="chartnilai"></div>
                                    {{-- <button id="plain">Plain</button>
                                        <button id="inverted">Inverted</button>
                                        <button id="polar">Polar</button> --}}
                                </figure>
                            </div>
                        </div>
                    </div>
                    <div class="card radius-15">
                        <div class="card-body">
                            <div>
                                {{-- <a id="table2-new-row-button" href="tambahkategori" class="btn btn-outline-info btn-sm mb-2">Tambah Kategori</a> --}}


                                <div class="table-responsive mb-4">
                                    <table id="example2" class="table table-bordered mb-4" style="width:100%">
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
                                        <tbody id="tahun">
                                            @if (count($harga))
                                                @foreach ($harga as $wor)
                                                    <tr>
                                                        <td class="text-center">{{ $wor->month }}</td>
                                                        <td class="text-center">{{ $wor->year }}</td>
                                                        <td class="text-center">Rp.
                                                            {{ number_format($wor['denda'], 2, '.', '.') }}</td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <script>
                    const chart = Highcharts.chart('chartnilai', {
                        title: {
                            text: 'Laporan Denda Bulanan'
                        },
                        xAxis: {
                            categories: {!! json_encode($previousMonths) !!},
                        },
                        series: [{
                            type: 'column',
                            name: 'Total Denda',
                            colorByPoint: true,
                            data: {!! json_encode($array_pengeluaran) !!},
                            showInLegend: false
                        }]
                    });


                    @if (Session::has('success'))
                        toastr.success("{{ Session::get('success') }}")
                    @endif
                    @if (Session::has('error'))
                        toastr.error("{{ Session::get('error') }}")
                    @endif

                    $('.delete').click(function() {
                        var mahasiswaid = $(this).attr('data-id');
                        var kategori = $(this).attr('data-kategori');
                        swal({
                                title: "YAKIN?",
                                text: "Akan Menghapus Data Dengan Kategori " + kategori + " ",
                                icon: "warning",
                                buttons: true,
                                dangerMode: true,
                            })
                            .then((willDelete) => {
                                if (willDelete) {
                                    window.location = "/deletekategori/" + mahasiswaid + ""
                                    swal("Data Ini Berhasil Dihapus!", {
                                        icon: "success",
                                    });
                                } else {
                                    swal("Data Ini Tidak Jadi Dihapus!");
                                }
                            });
                    });
                </script>

                <script>
                    var select = document.getElementById('tahun');

                    select.addEventListener('change', (e) => {
                        // alert("ok");

                        // Highcharts.setData(json_encode($previousMonths));
                        // Highcharts.setData(json_encode($array_pengeluaran));
                        // Highcharts.redraw();
                        // console.log(Highcharts.redraw());
                    });
                </script>

                <script>
                    $(document).ready(function() {
                        $("#tahun").on('change', function() {
                            var tahun = $(this).val();
                            console.log(tahun);
                            $.ajax({
                                url: "{{ route('pendapatant') }}",
                                type: "GET",
                                data: {
                                    'tahun': tahun
                                },
                                success: function(data) {
                                    var harga = data.harga;
                                    console.log(data);
                                    //     var html = '';
                                    //     if (harga.length > 0) {
                                    //         console.log(harga)
                                    //         for (let i = 0; i < harga.length; i++) {
                                    //             html += '<tr>\
                                    //                                                                         <td>' + harga[i]['chartnilai'] + '</td>\
                                    //                                                                         </tr>';
                                    //         }
                                    //     } else {
                                    //         html += '<tr>\
                                    //                                                                <td colspan="6"> ** Buku Dengan Kategori Ini Tidak Ada **</td>\
                                    //                                                                         </tr>';
                                    //     }

                                    //     $('#tahun').html(html);
                                }

                            });
                        });
                    });
                </script>


</body>

</html>
