<!-- Modal -->
<div class="modal fade" id="detail{{ $buku->id }}Modal" tabindex="-1"
    aria-labelledby="detail{{ $buku->id }}ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <h6 class="fw-bold">Impresium</h6>
                        <p>{{ $buku->impresium }}</p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">Jumlah JDL</h6>
                        <p>{{ $buku->jml_jdl }}</p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">Jumlah EXS</h6>
                        <p>{{ $buku->jml_exs }}</p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">No Inven</h6>
                        <p>{{ $buku->no_inven }}</p>
                    </div>
                    <div class="col">
                        <h6 class="fw-bold">No Kelas</h6>
                        <p>{{ $buku->no_kelas }}</p>
                    </div>


                </div>
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <h6 class="fw-bold">Bahasa</h6>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            @foreach (explode(',', $buku->bahasa) as $bahasa)
                                <button type="button"
                                    class="btn btn-sm btn-outline-success">{{ $bahasa }}</button>
                            @endforeach

                        </div>

                    </div>
                    <div class="col">
                        <h6 class="fw-bold">Macam</h6>
                        <div class="btn-group" role="group" aria-label="Basic outlined example">
                            @foreach (explode(',', $buku->macam) as $macam)
                                <button type="button"
                                    class="btn btn-sm btn-outline-success">{{ $macam }}</button>
                            @endforeach

                        </div>
                    </div>
                </div>



            </div>

        </div>
    </div>
</div>
