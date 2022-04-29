@extends(".app.layouts.template")

@section("app_title", "Tambah Asatidz")

@section("app_content")

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>
                @yield("app_title")
            </h3>
        </div>
    </div>
</div>

<div class="clearfix"></div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-plus"></i> Tambah
                </h2>
                <div class="clearfix"></div>
            </div>
            <form action="{{ url('/app/sistem/asatidz') }}" method="POST">
                <div class="x_content">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nomor_induk"> Nomor Induk </label>
                                <input type="text" class="form-control" name="nomor_induk" id="nomor_induk" placeholder="Masukkan Nomor Induk">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_ktp"> No. KTP </label>
                                <input type="text" class="form-control" name="no_ktp" id="no_ktp" placeholder="Masukkan No. KTP">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama"> Nama </label>
                                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukkan Nama">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email"> Email </label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pendidikan_terakhir"> Pendidikan Terakhir </label>
                                <input type="text" class="form-control" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="Masukkan Pendidikan Terakhir">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tempat_lahir"> Tempat Lahir </label>
                                <input type="text" class="form-control" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tanggal_lahir"> Tanggal Lahir </label>
                                <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="jenis_kelamin"> Jenis Kelamin </label>
                                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                                    <option value="">- Pilih -</option>
                                    <option value="L">Laki - Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="no_hp"> No. Handphone </label>
                                <input type="number" class="form-control" name="no_hp" id="no_hp" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="aktivitas_utama"> Aktivitas Utama </label>
                                <textarea name="aktivitas_utama" id="aktivitas_utama" class="form-control" rows="5" placeholder="Masukkan Aktivitas Utama"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="motivasi_mengajar"> Motivasi Mengajar </label>
                                <textarea name="motivasi_mengajar" id="motivasi_mengajar" class="form-control" rows="5" placeholder="Masukkan Motivasi Mengajar"></textarea>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat"> Alamat </label>
                                <textarea name="alamat" id="alamat" class="form-control" rows="5" placeholder="Masukkan Alamat"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <button type="reset" class="btn btn-danger">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                        <div class="pull-right">
                            <a href="{{ url('/app/sistem/asatidz') }}" class="btn btn-warning">
                                <i class="fa fa-sign-in"></i> Kembali ke Halaman Sebelumnya
                            </a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection