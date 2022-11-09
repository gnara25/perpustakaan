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
                                            <tbody>
                                                @foreach ($harga as $wor)
                                                    <tr>
                                                        <!-- <td scope="row">{{ $no++ }}</td> -->
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

                <script src="https://code.highcharts.com/highcharts.js"></script>
                

                <script>
                    var pendapatan = <?php echo json_encode($total_denda) ?>;
                    var bulan = <?php echo json_encode($bulan) ?>;

                    const chart = Highcharts.chart('chartnilai', {
                        title: {
                            text: 'Laporan Denda Bulanan'
                        },
                        xAxis: {
                            categories: bulan,
                        },
                        series: [{
                            type: 'column',
                            name: 'Unemployed',
                            colorByPoint: true,
                            data: pendapatan,
                            showInLegend: false
                        }]
                    });

                    document.getElementById('plain').addEventListener('click', () => {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: false
                            },
                            subtitle: {
                                text: 'Chart option: Plain | Source: ' +
                                    '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                                    'target="_blank">NAV</a>'
                            }
                        });
                    });

                    document.getElementById('inverted').addEventListener('click', () => {
                        chart.update({
                            chart: {
                                inverted: true,
                                polar: false
                            },
                            subtitle: {
                                text: 'Chart option: Inverted | Source: ' +
                                    '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                                    'target="_blank">NAV</a>'
                            }
                        });
                    });

                    document.getElementById('polar').addEventListener('click', () => {
                        chart.update({
                            chart: {
                                inverted: false,
                                polar: true
                            },
                            subtitle: {
                                text: 'Chart option: Polar | Source: ' +
                                    '<a href="https://www.nav.no/no/nav-og-samfunn/statistikk/arbeidssokere-og-stillinger-statistikk/helt-ledige"' +
                                    'target="_blank">NAV</a>'
                            }
                        });
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


</body>

</html>
