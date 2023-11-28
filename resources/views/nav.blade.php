<ul class="nav nav-underline mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
            role="tab" aria-controls="pills-home" aria-selected="true">Siswa</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile"
            type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Karyawan/Guru</button>
    </li>
</ul>
<div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab"
        tabindex="0">
        <h3 class="card-title text-center fw-bold">Form Kunjungan Siswa</h3>
        <form action="/kunjungan" method="post">
            @csrf
            <label class="mt-3 fw-bold" for="nama">Nama</label>
            <input type="text" value="{{ old('nama') }}" id="nama" class="form-control" name="nama">

            <label class="mt-3 fw-bold" for="kelas">Kelas</label>
            <select class="form-select" aria-label="Default select example" id="kelas" name="ruangan_id">
                <option selected>Kelas</option>
                @foreach ($kelass as $kelas)
                    <option value="{{ $kelas->id }}">{{ $kelas->nama_kelas }}</option>
                @endforeach

            </select>

            <label class="mt-3 fw-bold" for="tujuan">Tujuan</label>
            <select class="form-select" aria-label="Default select example" id="tujuan" name="tujuan">
                <option selected>Tujuan</option>
                <option value="baca">Baca</option>
                <option value="pinjam">Pinjam</option>
                <option value="kembali">Kembali</option>
                <option value="tugas">Tugas</option>
            </select>

            <label class="mt-3 fw-bold" for="jumlah">Jumlah Siswa</label>
            <input type="number" value="1" class="form-control" id="jumlah" name="jumlah">
            <div style="font-size: 14px" class="text-danger fw-bold">
                Note : Jika Berkunjung Satu Kelas isi Perwakilan Saja dan isi Jumlah Siswa
            </div>

            <div class="row text-center">
                <div class="col">
                    <button onclick="formSiswa(this,'none')" class="btn btn-success">kirim</button>
                    <button id="button-siswa" style="display:none" class="btn btn-success" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>

    {{-- Form Karyawan --}}
    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
        <h3 class="card-title text-center fw-bold">Form Kunjungan Karyawan/Guru</h3>
        <form action="/kunjungan-karyawan" method="post">
            @csrf
            <label class="mt-3 fw-bold" for="namakaryawan">Nama</label>
            <input type="text" value="{{ old('nama') }}" id="namakaryawan" class="form-control" name="nama">



            <label class="mt-3 fw-bold" for="jabatan">Jabatan</label>
            <select class="form-select" aria-label="Default select example" name="jabatan">
                <option selected>Jabatan</option>
                <option value="karyawan">Karyawan</option>
                <option value="guru">Guru</option>
            </select>

            <label class="mt-3 fw-bold" for="tujuan1">Tujuan</label>
            <input type="text" class="form-control" id="tujuan1" name="tujuan">
            <div class="row mt-3 text-center">
                <div class="col">
                    <button onclick="formKaryawan(this,'none')" class="btn btn-success">kirim</button>
                    <button id="button-karyawan" style="display:none" class="btn btn-success" type="button"
                        disabled>
                        <span class="spinner-border spinner-border-sm" aria-hidden="true"></span>
                        <span role="status">Loading...</span>
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
