@extends("app.administrator.layouts.template")

@section("app_title", "Cabang")

@section("app_content")

<section class="section">
    <div class="section-header">
        <h1>
            @yield("app_title")
        </h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active">
                <a href="{{ url('/app/sistem/home') }}">Home</a>
            </div>
            <div class="breadcrumb-item">
                @yield("app_title")
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-plus"></i>
                        <span>Tambah Form Cabang</span>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_cabang"> Nama Cabang </label>
                        <input type="text" name="nama_cabang" class="form-control input-sm" id="nama_cabang" placeholder="Masukkan Nama Cabang">
                    </div>
                </div>
                <div class="card-footer">
                    <button name="btn-tambah" class="btn btn-primary" id="btn-tambah">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                    <button name="btn-reset" class="btn btn-danger" id="btn-reset">
                        <i class="fa fa-times"></i> Batal
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-md-6 col-sm-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4>
                        <i class="fa fa-bars"></i>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover" id="tampilData">
                            <thead>
                                <tr>
                                    <th class="text-center">No.</th>
                                    <th>Keterangan</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Data -->
<div class="modal fade" tabindex="-1" role="dialog" id="modalEdit">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fa fa-edit"></i>
                    <span>Edit Data</span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="editCabang">
                <div class="modal-body">
                    <input type="hidden" id="id">
                    <div class="form-group">
                        <label for="nm_cabang"> Nama Cabang </label>
                        <input type="text" name="nm_cabang" class="form-control input-sm" id="nm_cabang" placeholder="Masukkan Keterangan">
                    </div>
                </div>
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="button" class="btn btn-success" id="btn-edit">
                        <i class="fa fa-save"></i> Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- END -->

@endsection

@section("app_scripts")

<script type="text/javascript">

    function tampilData() {
        let empTable = document.getElementById("tampilData").getElementsByTagName("tbody")[0];
        empTable.innerHTML = "";
        $.ajax({
            url: "{{ url('') }}/api/cabang",
            type: "GET",
            success: function (response) {
                let no = 1;
                for (let key in response.data) {
                    if (response.data.hasOwnProperty(key)) {
                        let val = response.data[key];
                        let newRow = empTable.insertRow(-1);
                        let nomer = newRow.insertCell(0);
                        let namaCabangCell = newRow.insertCell(1);
                        let aksiCell = newRow.insertCell(2);

                        nomer.innerHTML = no++;
                        namaCabangCell.innerHTML = val['nama_cabang'];
                        aksiCell.innerHTML = '<button class="btn btn-warning" id="btnEdit" data-target="#modalEdit" data-toggle="modal" data-id="'+val['id']+'"><i class="fa fa-edit"></i> Edit </button> &nbsp;'
                        aksiCell.innerHTML += '<button class="btn btn-danger" onclick="hapusData('+val['id']+')"><i class="fa fa-trash"></i> Hapus</button>'
                    }
                }
            }
        });
    }

    $(document).ready(function() {
        $("body").on('click', '#btnEdit', function() {
            let id = $(this).data('id');

            $.get('{{ url("api/cabang/") }}/' + id, function (response) {
                $("#id").val(id)
                $("#nm_cabang").val(response.data.nama_cabang)
            })
        });

        $("#btn-tambah").on('click', function() {
            let nama_cabang = $("#nama_cabang").val().trim();

            if (nama_cabang == "") {
                Swal.fire({
                    title : "Oops",
                    text : "Data Tidak Boleh Kosong",
                    icon : "error"
                })
            } else {
                $.ajax({
                    url : "{{ url('/api/cabang') }}",
                    type : "POST",
                    data : { nama_cabang : nama_cabang, _token: "{{ csrf_token() }}" },
                    success : function(response) {
                        if (response.status == true) {
                            $("#nama_cabang").val('')
                            tampilData()
                            Swal.fire({
                                title : "Berhasil",
                                text : "Berhasil di Tambahkan",
                                icon : "success"
                            })
                        } else {
                            Swal.fire({
                                title : "Oops",
                                text : "Data Gagal di Inputkan",
                                icon : "error"
                            })
                        }
                    }
                })
            }
        })

        $("#btn-edit").on('click', function() {
            let id = $("#id").val().trim();
            let nm_cabang = $("#nm_cabang").val().trim();

            if (nm_cabang == "") {
                Swal.fire({
                    title : "Oops",
                    text : "Data tidak boleh kosong",
                    icon : "error"
                })
            } else {
                $.ajax({
                    url : "{{ url('/api/cabang/') }}/" + id,
                    type : "POST",
                    data : { id : id, nama_cabang : nm_cabang, _token: "{{ csrf_token() }}", _method : "PUT" },
                    success : function(response) {
                        console.log(response)
                        if (response.status == true) {
                            $("#id").val('')
                            $("#nm_cabang").val('')
                            tampilData()
                            $("#modalEdit").modal('hide')
                            Swal.fire({
                                title : "Berhasil",
                                text : "Berhasil di Simpan",
                                icon : "success"
                            })
                        } else {
                            Swal.fire({
                                title : "Oops",
                                text : "Data Gagal di Simpan",
                                icon : "error"
                            })
                        }
                    }
                })
            }
        })
    })

    function hapusData(id)
    {
        Swal.fire({
            title : "Apakah Yakin ?",
            text : "Untuk Menghapus Data Ini",
            icon : "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url : "{{ url('/api/cabang/') }}/" + id,
                    type : "POST",
                    data : { _token: "{{ csrf_token() }}", _method : "DELETE" },
                    success : function(response) {
                        console.log(response)
                        if (response.status == true) {
                            tampilData()
                            Swal.fire(
                                'Berhasil!',
                                'Data Berhasil di Hapus',
                                'success'
                                )
                        } else {
                            Swal.fire(
                                'Gagal!',
                                'Data Gagal di Hapus',
                                'error'
                                )
                        }
                    }
                })
            } else {

            }
        })
    }


    tampilData();
</script>

@endsection
