@php
use App\Models\AbsensiAsatidz;
@endphp
@extends('.app.layouts.template')

@section('app_title', 'Laporan Absensi Asatidz')

@section('app_content')

    <section class="section">
        <h3>
            @yield('app_title')
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ url('app/sistem/home') }}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Laporan</li>
                <li class="breadcrumb-item active" aria-current="page">Absensi</li>
                <li class="breadcrumb-item active" aria-current="page">Asatidz</li>
            </ol>
        </nav>
    </section>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>
                        <i class="fa fa-book"></i> @yield('app_title')
                    </h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-box table-responsive">
                                <table id="table-1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th>Nama</th>
                                            <th class="text-center">No. HP</th>
                                            <th class="text-center">Hadir</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 0;
                                        @endphp
                                        @foreach ($data_asatidz as $data)
                                            @php
                                                $jumlah_hadir = AbsensiAsatidz::where('id_asatidz', $data->id)->count();
                                            @endphp
                                            <tr>
                                                <td class="text-center">{{ ++$no }}.</td>
                                                <td>{{ $data->getUser->nama }}</td>
                                                <td class="text-center">{{ $data->getUser->no_hp }}</td>
                                                <td class="text-center">
                                                    {{ $jumlah_hadir }}
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ url('/app/sistem/laporan/absensi/asatidz/' . $data->getUser->id) }}"
                                                        class="btn btn-warning btn-sm">
                                                        <i class="fa fa-search"></i> Detail
                                                    </a>
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

@endsection

@section('app_scripts')

    <script>
        $(document).ready(function() {
            $("#table-1").dataTable();
        })
    </script>

@endsection
