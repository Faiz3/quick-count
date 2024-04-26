<div>
    <aside class="navbar navbar-vertical navbar-expand-lg navbar-dark bg-primary fw-semibold fs-3 shadow">
        <div class="container-fluid">
          @include('livewire.components.sidebar')
        </div>
    </aside>
    {{-- @dd($daftar_pemilih) --}}
    @php
        $pesertas = 0;
        foreach ($daftar_pemilih as $peserta) {
            $pesertas = $pesertas + $peserta->jumlah_daftar;
        }
        @endphp
    <div class="page-wrapper">
        <div class="page-header d-print-none">
            <div class="container-xl">
                <div class="row g-2 align-items-center">
                    <div class="col">
                        <h1 class="text-center text-primary mt-5">
                            APLIKASI QUICK COUNT RT KELURAHAN 16 ULU
                        </h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-body">
            @if ($is_datart)
            {{-- data rt --}}
                @livewire('menu.data-rt')
            {{-- data rt --}}

            @elseif ($is_nama_calonrt)
            {{-- nama calon rt --}}
                @livewire('menu.nama-calon-rt')
            {{-- nama calon rt --}}

            @elseif ($is_jumlah_daftar_pemilih)
            {{-- jumlah daftar pemilih --}}
                @livewire('menu.jumlah-daftar-pemilih')
            {{-- jumlah daftar pemilih --}}

            @elseif ($is_data_suara)
            {{-- data suara --}}
                @livewire('menu.data-suara')
            {{-- data suara --}}

            @elseif ($is_rekapitulasi_data_suara)
            {{-- rekapitulasi data suara --}}
                @livewire('menu.rekapitulasi-data-suara')
            {{-- rekapitulasi data suara --}}

            @elseif($is_user)
            {{-- tambah user --}}
                @livewire('menu.tambah-user')
            {{-- tambah user --}}

            {{-- dashboard --}}
            @else
            <div class="container mt-5">
                <div class="row">
                    <div class="col col-12 col-md-8 col-lg-4 mt-4">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-body">
                                <div class="text-center fw-bold text-primary">
                                    Jumlah RT
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <div class="fs-3 fw-bold">
                                        {{ $count }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-8 col-lg-4 mt-4">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-body">
                                <div class="text-center fw-bold text-primary">
                                    Jumlah Calon RT
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <div class="fs-3 fw-bold">
                                        {{ $calon ?? 0 }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col col-12 col-md-8 col-lg-4 mt-4">
                        <div class="card shadow-sm rounded-3">
                            <div class="card-body">
                                <div class="text-center fw-bold text-primary">
                                    Jumlah Daftar Pemilih
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="text-center">
                                    <div class="fs-3 fw-bold">
                                        {{ $pesertas }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
