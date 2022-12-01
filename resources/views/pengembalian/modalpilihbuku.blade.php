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
                                        @if ($buku->status == 'dipinjam')
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
                                        $jumlah = $buku->jumlah;
                                         $dendas = $jumlah * $denda;
                                        ?>
                                        
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $buku->namabuku }}</td>
                                            <td>{{ $buku->kodebuku }}</td>
                                            <td id="jumlahBuku">{{ $buku->jumlah }}</td>
                                            <td>
                                                <?php if ($selisih <= 0) { ?>
                                                <span class="label label-primary">Masa
                                                    Peminjaman</span>
                                                <?php } elseif ($selisih > 0) { ?>
                                                <span class="label label-danger">
                                                    Rp.
                                                    <?= $dendas  ?>
                                                </span>
                                                <br> Terlambat :
                                                <?= $selisih ?>
                                                Hari
                                                <?php } ?>
                                            </td>

                                            <td>
                                                <input type="hidden" name="id_detail" value="{{ $buku->id }}">
                                                <input type="hidden" value="{{ $buku->id_buku }}" name="id">
                                                <input type="hidden" value="{{ $buku->namabuku }}" name="namabuku">
                                                <input type="hidden" value="{{ $buku->kodebuku }}" name="kodebuku">
                                                <input type="hidden" value="{{ $buku->jumlah }}" name="quantity">
                                                <?php if ($selisih <= 0) { ?>
                                                <input type="hidden" value="0" name="price">
                                                <?php } elseif ($selisih > 0) { ?>
                                                <input type="hidden" value="{{ $dendas }}" name="price">
                                                <?php } ?>

                                             <?php if ($selisih <= 0) { ?>

                                                {{-- <input type="hidden" name="id_pilih" value="{{ $buku->id_buku }}">
                                                <input type="hidden" name="is_confirmed"
                                                    value="{{ $buku->is_confirmed }}"> --}}

                                                <button type="button" id="nonaktif"
                                                    onclick="tambahbuku(this)"
                                                    data-detail="{{$buku->id}}"
                                                     data-id1="{{ $buku->id_buku }}"
                                                    data-namabu="{{ $buku->namabuku }}"
                                                    data-kodebu="{{ $buku->kodebuku }}"
                                                    data-jumlah="{{ $buku->jumlah }}" data-price="0"
                                                    data-bs-dismiss="modal" class="btn btn-secondary"></i>
                                                    Pilih</button>
                                                <?php } elseif ($selisih > 0) { ?>
                                                <button type="button" id="nonaktif"
                                                    onclick="tambahbuku(this)"
                                                    data-detail="{{$buku->id}}"
                                                     data-id1="{{ $buku->id_buku }}"
                                                    data-namabu="{{ $buku->namabuku }}"
                                                    data-kodebu="{{ $buku->kodebuku }}"
                                                    data-jumlah="{{ $buku->jumlah }}" data-price="{{ $dendas }}"
                                                    data-bs-dismiss="modal" class="btn btn-secondary"></i>
                                                    Pilih</button>

                                                <?php } ?>
                                            </td>

                                        </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </form>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="confirm">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    let jumlah = `{{ $buku->jumlah }}`
    $('#nonaktif').click((e) => {
        let hasilKurang = jumlah - 1
        jumlah = hasilKurang
        $('#jumlahBuku').html(hasilKurang)
    })
</script>
<script>
    function tambahbuku(){
        var x = document.getElementById("nonaktif").disabled = true;
    }
</script>
