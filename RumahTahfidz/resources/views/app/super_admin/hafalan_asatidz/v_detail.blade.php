@extends('.app.layouts.template')

@section('app_title', 'Hafalan Asatidz')

@section('app_content')
    <link rel="stylesheet" href="{{ url('vendors/select2/dist/css/select2.min.css') }}" />

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Data @yield('app_title')</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-4">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-plus"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form action="{{ url('/app/sistem/hafalan/asatidz/') }}" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="id" value="{{ $detail->id }}">
                        <div class="form-group">
                            <label for="quran_awal"> Quran Awal </label>
                            <select name="quran_awal" class="form-control" id="quran_awal">
                                <option value="0">- Pilih -</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_awal">
                            <label for="ayat_awal"> Ayat Awal </label>
                            <select name="ayat_awal" class="form-control" id="ayat_awal"></select>
                        </div>
                        <div class="form-group">
                            <label for="quran_akhir"> Quran Akhir </label>
                            <select name="quran_akhir" class="form-control" id="quran_akhir">
                                <option value="0">- Pilih -</option>
                            </select>
                        </div>
                        <div class="form-group" id="div_akhir">
                            <label for="ayat_akhir"> Ayat Akhir </label>
                            <select name="ayat_akhir" class="form-control" id="ayat_akhir"></select>
                        </div>
                        <div id="cob"></div>
                        <div class="ln_solid"></div>
                        <button type="reset" class="btn btn-danger btn-sm">
                            <i class="fa fa-times"></i> Batal
                        </button>
                        <button type="submit" class="btn btn-primary btn-sm">
                            <i class="fa fa-plus"></i> Tambah
                        </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i>
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Quran Awal</th>
                                            <th>Quran Akhir</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_hafalan_asatidz as $data)
                                            <tr>
                                                <td class="text-center">{{ ++$no }}</td>
                                                <td>{{ $data->quran_awal }}</td>
                                                <td>{{ $data->quran_awal }}</td>
                                                <td>{{ $data->keterangan }}</td>
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

@endsection
@section('app_scripts')

    <script src="{{ url('vendors/select2/dist/js/select2.full.min.js') }}"></script>
    <script>
        function searchQuranAwal() {
            $.ajax({
                url: 'https://api.quran.sutanlab.id/surah',
                success: function(response) {
                    let optionSurat = '';
                    optionSurat += '<option>- Pilih -</option>'
                    response.data.forEach(surat => {
                        optionSurat += '<option value="' + surat.number + '">' + surat.name
                            .transliteration.id + '</option>'
                    });

                    $('#quran_awal').html(optionSurat);
                }
            })
        }

        function searchQuranAkhir() {
            $.ajax({
                url: 'https://api.quran.sutanlab.id/surah',
                success: function(response) {
                    let optionSurat = '';
                    optionSurat += '<option>- Pilih -</option>'
                    response.data.forEach(surat => {
                        optionSurat += '<option value="' + surat.number + '">' + surat.name
                            .transliteration.id + '</option>'
                    });

                    $('#quran_akhir').html(optionSurat);
                }
            })
        }

        $(document).ready(function() {
            searchQuranAwal();
            searchQuranAkhir();

            $('#quran_awal').select2();
            $('#quran_akhir').select2();

            $('#ayat_awal').select2();
            $('#ayat_akhir').select2();

            $('#div_awal').hide();
            $('#div_akhir').hide();

            $("#quran_awal").change(function() {
                if ($(this).val() == 0) {
                    $('#div_awal').hide();
                } else {
                    $.ajax({
                        url: 'https://api.quran.sutanlab.id/surah/' + $(this).val(),
                        success: function(response) {
                            $('#div_awal').show();
                            console.log(response.data.numberOfVerses);
                            let optionAyat = '';
                            for (let i = 1; i <= response.data.numberOfVerses; i++) {
                                optionAyat += '<option value="' + i +
                                    '">Ayat ' +
                                    i + '</option>'
                            }

                            $('#ayat_awal').html(optionAyat);
                        }
                    })
                }
            })

            $("#quran_akhir").change(function() {
                if ($(this).val() == 0) {
                    $('#div_akhir').hide();
                } else {
                    $.ajax({
                        url: 'https://api.quran.sutanlab.id/surah/' + $(this).val(),
                        success: function(response) {
                            $('#div_akhir').show();
                            console.log(response.data.numberOfVerses);
                            let optionAyat = '';
                            for (let i = 1; i <= response.data.numberOfVerses; i++) {
                                optionAyat += '<option value="' + i +
                                    '">Ayat ' +
                                    i + '</option>'
                            }

                            $('#ayat_akhir').html(optionAyat);
                        }
                    })
                }
            })
        })
    </script>
@endsection