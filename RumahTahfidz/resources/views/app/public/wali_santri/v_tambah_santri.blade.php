<input type="hidden" name="id_wali" value="{{ $data_wali->id }}">
<input type="hidden" name="kode_halaqah" value="{{ $data_wali->kode_halaqah }}">
<input type="hidden" name="id_nominal" value="{{ $data_nominal_iuran->id }}">
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nis"> NIS </label>
            <input type="text" class="form-control" name="nis" id="nis" placeholder="Masukkan NIS">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="kode_halaqah"> Halaqah </label>
            <input type="text" class="form-control" value="{{ $data_wali->getHalaqah->nama_halaqah }}" readonly>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_lengkap"> Nama Lengkap </label>
            <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap"
                placeholder="Masukkan Nama Lengkap">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nama_panggilan"> Nama Panggilan </label>
            <input type="text" class="form-control" name="nama_panggilan" id="nama_panggilan"
                placeholder="Masukkan Nama Panggilan">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="tempat_lahir"> Tempat Lahir </label>
            <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir"
                placeholder="Masukkan Tempat Lahir">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="tanggal_lahir"> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir" placeholder="0">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="sekolah"> Sekolah </label>
    <input type="text" class="form-control" name="sekolah" id="sekolah" placeholder="Masukkan Nama Sekolah">
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="prestasi_anak"> Prestasi Anak </label>
            <input type="text" class="form-control" name="prestasi_anak" id="prestasi_anak"
                placeholder="Masukkan Data Prestasi">
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="id_kelas"> Kelas </label>
            <select class="form-control" name="id_kelas" id="id_kelas">
                <option value="">- Pilih -</option>
                @foreach ($data_kelas as $kelas)
                    <option value="{{ $kelas->id }}">
                        {{ $kelas->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="alamat"> Alamat </label>
    <textarea name="alamat" class="form-control" id="alamat" rows="5" placeholder="Masukkan Data Alamat"></textarea>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="jenis_kelamin"> Jenis Kelamin </label>
            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin">
                <option value="">- Pilih -</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
            </select>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="nominal"> Nominal </label>
            <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukkan Nominal">
        </div>
    </div>
</div>
<div class="form-group">
    <label for="foto"> Foto </label>
    <img class="gambar-lihat" id="tampilGambar">
    <input type="file" class="form-control" name="foto" id="foto" onchange="imagePreview()">
</div>

<script>
    function imagePreview() {
        const image = document.querySelector("#foto");
        const imgPreview = document.querySelector(".gambar-lihat");
        imgPreview.style.display = "block";
        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);
        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
            $("#tampilGambar").addClass('mb-3');
            $("#tampilGambar").width("100%");
            $("#tampilGambar").height("300");
        }
    }
</script>
