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
                                    <th> pilih buku <input type="checkbox" name="select_all" id="select_all"></th>
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody id="tbody-cart">
                                @foreach ($detail as $buku)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $buku->namabuku }}</td>
                                        <td>{{ $buku->kodebuku }}</td>
                                        <td>{{ $buku->jumlah }}</td>
                                        <td>
                                            <input type="hidden" value="{{ $buku->id }}" name="id">
                                            <input type="hidden" value="{{ $buku->namabuku }}" name="namabuku">
                                            <input type="hidden" value="{{ $buku->kodebuku }}" name="kodebuku">
                                            <input type="hidden" value="{{$buku->jumlah}}" name="quantity">
                                            <button type="button"  onclick="tambahbuku(this)"
                                                data-id1="{{ $buku->id }}" data-namabu="{{ $buku->namabuku }}" data-kodebu="{{ $buku->kodebuku }}" data-jumlah="{{ $buku->jumlah }}" data-bs-dismiss="modal"
                                                    class="btn btn-secondary"></i> pilih</button>
                                            {{-- <input type="checkbox" id="pilibuku" name="id[]" value="{{$buku->id}}"> --}}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            </form>
                        </table>
                    </div>
                    <div class="modal-footer"> 
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        {{-- <button type="button"  onclick="tambahbuku(this)"
                        data-id1="{{ $buku->id }}" data-namabu="{{ $buku->namabuku }}" data-kodebu="{{ $buku->kodebuku }}" data-jumlah="{{ $buku->jumlah }}" data-bs-dismiss="modal"
                            class="btn btn-secondary"></i> pilih</button> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('[name=select_all]').on('click', function() {
            $(':pilibuku').prop('checked', this.checked);
        });

        function pilihbuku(url) {
            if ($('input:checked').length < 1) {
                swal({
                    icon: "warning",
                    text: "Harap Pilih Buku Yang Ingin Dikembalikan"
                });
                return;
            } else {
                $('.from-buku')
                    .attr('action', url)
                    .attr('target', '_blank')
                    .submit();
            }
        }
    </script>
