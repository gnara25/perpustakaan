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
                    
                    <div class="col-24 col-lg-24 col-xl-12 d-flex">
                        <div class="card radius-15 w-100">
                            <div class="card-body">
                                <div class="row ">
                                    <div class="col-md-3">
                                        <label class="mb-1" style="font-size: 100%;">Pilih Tahun :</label>
                                        <form action="{{ url('filter') }}" method="get">
                                            @csrf
                                            <select class="form-control" name="year" id="tahun">
                                                <?php
                                                $year = date('Y');
                                                $min = $year - 2;
                                                $max = $year;
                                                for ($i = $max; $i >= $min; $i--) {
                                                    echo '<option value=' . $i . '>' . $i . '</option>';
                                                }
                                                ?>
                                            </select>
                                        </form>
                                    </div>
                                    <div class="card-body">
                                        <div id="grapik"></div>
                                    </div>
                                </div>
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
                                            @foreach ($harga as $wor)
                                                <tr>
                                                    <td class="text-center">{{ $wor->month }}</td>
                                                    <td class="text-center">{{ $wor->year }}</td>
                                                    <td class="text-center">Rp.
                                                        {{ number_format($wor['denda'], 2, '.', '.') }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- end wrapper -->
                @include('template.script')

                <script>
                    var bulandenda = ['jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'aug', 'sep', 'okt', 'nov', 'des']
                </script>

                <script>
                    const urlStr = "{{ url('/grafik') }}";

                    $(document).ready(function() {
                        var datadenda = JSON.parse("<?php echo json_encode($datadenda); ?>");
                        var chart;

                        $("#tahun").change(function(e) {
                            e.preventDefault();
                            $.ajax({
                                url: urlStr,
                                type: "GET",
                                data: {
                                    tahun: $("#tahun").val()
                                },
                                success: function(datas) {
                                    console.log(datas);
                                    chart.data.w.config.series[0].data = datas.denda
                                    chart.update()
                                },
                                error: function(error) {
                                    console.log(`error ${error}`);
                                }
                            });
                        });



                        var element = document.getElementById("grapik");

                        var options = {
                            series: [{
                                name: 'Denda',
                                data: datadenda,
                            }],
                            chart: {
                                foreColor: '#9ba7b2',
                                height: 400,
                                type: 'line',
                                zoom: {
                                    enabled: false
                                },
                                toolbar: {
                                    show: true
                                },
                                dropShadow: {
                                    enabled: true,
                                    top: 3,
                                    left: 14,
                                    blur: 4,
                                    opacity: 0.10,
                                }
                            },
                            stroke: {
                                width: 5,
                                curve: 'smooth'
                            },
                            xaxis: {
                                type: 'date',
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov',
                                    'Des'
                                ],
                            },
                            title: {
                                text: 'Laporan Denda PerBulan',
                                align: 'center',
                                style: {
                                    fontSize: "16px",
                                    color: '#666'
                                }
                            },
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shade: 'light',
                                    gradientToColors: ['#673ab7'],
                                    shadeIntensity: 1,
                                    type: 'horizontal',
                                    opacityFrom: 1,
                                    opacityTo: 1,
                                    stops: [0, 100, 100, 100]
                                },
                            },
                            markers: {
                                size: 4,
                                colors: ["#673ab7"],
                                strokeColors: "#fff",
                                strokeWidth: 2,
                                hover: {
                                    size: 7,
                                }
                            },
                            colors: ["#673ab7"],
                            yaxis: {
                                title: {
                                    text: 'Engagement',
                                },
                            }
                        };

                        var chart = new ApexCharts(document.querySelector("#grapik"), options);
                        chart.render();
                    });
                </script>

                <script>
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

                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

                {{-- 
                <script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
                <script src="assets/plugins/apexcharts-bundle/js/apex-custom.js"></script> --}}
</body>

</html>
