@extends(".app.layouts.template")

@section("app_title", "Pelajaran Tadribat")

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
    <div class="col-md-4 col-sm-8 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-plus"></i> Tambah Data @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <form method="POST" action="{{ url('/app/sistem/pelajaran/tadribat') }}">
                    @csrf
                    <div class="form-group">
                        <label for="pelajaran"> Pelajaran </label>
                    <input type="text" class="form-control" name="pelajaran" id="pelajaran" placeholder="Masukkan Pelajaran">
                    </div>
                    <div class="ln_solid"></div>
                    <button class="btn btn-danger" type="reset">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fa fa-plus"></i> Tambah
                    </button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 col-sm-4 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>
                    <i class="fa fa-bars"></i> Data @yield("app_title")
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="card-box table-responsive">
                            <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th class="text-center">No.</th>
                                        <th class="text-center">Pelajaran</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 0
                                    @endphp
                                    @foreach ($data_pelajaran_tadribat as $data)
                                    <tr>
                                        <td class="text-center">{{ ++$no }}.</td>
                                        <td class="text-center">{{ $data->pelajaran }}</td>
                                        <td class="text-center">
                                            <button onclick="editDataPelajaranTadribat({{ $data->id }})" class="btn btn-warning" data-target="#modalEdit" data-toggle="modal">
                                                <i class="fa fa-edit"></i> Edit
                                            </button>
                                            <button id="deletePelajaranTadribat" data-id="{{ $data->id }}" class="btn btn-danger">
                                                <i class="fa fa-trash"></i> Hapus
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Data -->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-hidden="true" id="modalEdit">
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
            <form action="{{ url('/app/sistem/pelajaran/tadribat/simpan') }}" method="POST">
                @method("PUT")
                @csrf
                <div class="modal-body" id="modal-content-edit">

                </div>
                <div class="modal-footer">
                    <button type="reset" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Kembali
                    </button>
                    <button type="submit" class="btn btn-success" id="btn-edit">
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

<script>
    function editDataPelajaranTadribat(id) {
        $.ajax({
            url : "{{ url('/app/sistem/pelajaran/tadribat/edit') }}",
            type : "GET",
            data : { id : id },
            success : function(data) {
                $("#modal-content-edit").html(data);
                return true;
            }
        });
    }

    $(document).ready(function() {
        $("#table-1").dataTable();

        $('body').on('click', '#deletePelajaranTadribat', function () {
            let id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form_string = "<form method=\"POST\" action=\"{{ url('/app/sistem/pelajaran/tadribat/') }}/"+id+"\" accept-charset=\"UTF-8\"><input name=\"_method\" type=\"hidden\" value=\"DELETE\"><input name=\"_token\" type=\"hidden\" value=\"{{ csrf_token() }}\"></form>"

                    form = $(form_string)
                    form.appendTo('body');
                    form.submit();
                } else {
                    Swal.fire('Selamat!', 'Data anda tidak jadi dihapus', 'error');
                }
            })
        })
    })
</script>

@endsection
