<div class="col">
    <!-- Button trigger modal -->
    <!-- Modal -->
    <div class="modal fade" id="Bukuid" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-center">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body fileSelection1">
                    <div class="table-responsive">

                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <form action="" method="POST" class="from-buku">
                                @csrf
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Judul Buku</th>
                                        <th>Kode Buku</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>pilih buku</th>
                                    </tr>
                                </thead>
                                @php
                                    $no = 1;
                                @endphp
                                <tbody id="tbody-cart">
                                    @foreach ($detail as $buku)
                                        <?php
                                        
                                        $u_denda = 1000;
                                        
                                        $tgl1 = date('Y-m-d');
                                        $tgl2 = $buku->tanggalpengembalian;
                                        
                                        $pecah1 = explode('-', $tgl1);
                                        $date1 = $pecah1[2];
                                        $month1 = $pecah1[1];
                                        $year1 = $pecah1[0];
                                        
                                        $pecah2 = explode('-', $tgl2);
                                        $date2 = $pecah2[2];
                                        $month2 = $pecah2[1];
                                        $year2 = $pecah2[0];
                                        
                                        $jd1 = GregorianToJD($month1, $date1, $year1);
                                        $jd2 = GregorianToJD($month2, $date2, $year2);
                                        
                                        $selisih = $jd1 - $jd2;
                                        $denda = $selisih * $u_denda;
                                        ?>
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $buku->namabuku }}</td>
                                            <td>{{ $buku->kodebuku }}</td>
                                            <td>{{ $buku->jumlah }}</td>
                                            <td>
                                                <?php if ($selisih <= 0) { ?>
                                                <span class="label label-primary">Masa
                                                    Peminjaman</span>
                                                <?php } elseif ($selisih > 0) { ?>
                                                <span class="label label-danger">
                                                    Rp.
                                                    <?= $denda ?>
                                                </span>
                                                <br> Terlambat :
                                                <?= $selisih ?>
                                                Hari
                                                <?php } ?>
                                            </td>
                                            
                                            <td>
                                                <input type="hidden" value="{{ $buku->id }}" name="id">
                                                <input type="hidden" value="{{ $buku->namabuku }}" name="namabuku">
                                                <input type="hidden" value="{{ $buku->kodebuku }}" name="kodebuku">
                                                <input type="hidden" value="{{ $buku->jumlah }}" name="quantity">
                                                <?php if ($selisih <= 0) { ?>
                                                <input type="text" value="0" name="price">
                                                 <?php } elseif ($selisih > 0) { ?>
                                                <input type="text" value="{{ $denda }}" name="price">    
                                                <?php } ?>    

                                                <?php if ($selisih <= 0) { ?>

                                                <button type="button" onclick="tambahbuku(this)"
                                                    data-id1="{{ $buku->id }}" data-namabu="{{ $buku->namabuku }}"
                                                    data-kodebu="{{ $buku->kodebuku }}"
                                                    data-jumlah="{{ $buku->jumlah }}" data-price="0"
                                                    data-bs-dismiss="modal" class="btn btn-secondary"></i>
                                                    pilih</button>
                                                 <?php } elseif ($selisih > 0) { ?>    
                                                    <button type="button" onclick="tambahbuku(this)"
                                                    data-id1="{{ $buku->id }}" data-namabu="{{ $buku->namabuku }}"
                                                    data-kodebu="{{ $buku->kodebuku }}"
                                                    data-jumlah="{{ $buku->jumlah }}" data-price="{{ $denda}}"
                                                    data-bs-dismiss="modal" class="btn btn-secondary"></i>
                                                    pilih</button>

                                                 <?php } ?>     
                                            </td>
                                        
                                        </tr>
                                    @endforeach
                                </tbody>
                            </form>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // $(function() {
        //     $('input[type="button"]').prop('disabled', true);
        //     $('#non').on('input', function(e) {
        //         if (this.value.length === 1) {
        //             $('input[type="button"]').prop('disabled', false);
        //         } else {
        //             $('input[type="button"]').prop('disabled', true);
        //         }
        //     });
        // });

        $('.postpilihan').change(function() {
            var $this = $(this);
            var id = $this.val();
            var id_transaksi = this.checked;

            if (id_transaksi) {
                id_transaksi = 1;
            } else {
                id_transaksi = 0;
            }
            axios
                .post('{{ route('pilihan') }}', {
                    _token: '{{ csrf_token() }}',
                    _method: 'patch',
                    id: id,
                    id_transaksi: id_transaksi,

                })
            swal({
                    text: "Product is already featured",
                    type: 'error',
                    confirmButtonColor: '#4fa7f3',

                })
                .then(function(responsive) {
                    console.log(responsive);

                })
                .catch(function(error) {
                    console.log(error);
                });
        });
    </script>
</div>