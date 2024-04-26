<div>
    <div class="container mt-5" wire:poll>
        @if ($is_create)
            <div class="fs-2 mb-3">Tambah Data</div>
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <form action="" wire:submit.prevent="create">
                        <div class="row mb-4">
                            <label for="alamat" class="col col-sm-2 col-form-label">No RT</label>
                            <div class="col col-sm-10">
                                <select wire:model="no_rt" class="text-center form-control" id="">
                                    <option value="">Pilih</option>
                                    @foreach ($norts as $nort)
                                        <option value="{{ $nort->no_rt }}">{{ $nort->no_rt }}</option>
                                    @endforeach
                                    {{-- <option value="perempuan">PEREMPUAN</option> --}}
                                </select>
                            </div>
                        </div>
                        @error('no_rt')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="alamat" class="col col-sm-2 col-form-label">Jumlah Daftar Pemilih</label>
                            <div class="col col-sm-10">
                                <input wire:model="jumlah_daftar" name="alamat" type="text" class="form-control">
                            </div>
                        </div>
                        @error('jumlah_daftar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <div wire:click="onCreate" class="btn btn-light">Batal</div>
                        </div>
                    </form>
                </div>
            </div>
        @elseif ($is_update)
            <div class="fs-2 mb-3">Edit Data</div>
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="" wire:submit.prevent="update">
                        <div class="row mb-4">
                            <label for="no_rt" class="col col-sm-2 col-form-label">NO RT</label>
                            <div class="col col-sm-10">
                                {{-- <input wire:model="no_urut" name="alamat" type="text" class="form-control"> --}}
                                <select name="no_rt" wire:model="no_rt" class="form-control text-center">
                                    @foreach($rt as $r)
                                        <option value="{{ $r->no_rt }}">{{ $r->no_rt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('no_rt')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="jumlah_daftar" class="col col-sm-2 col-form-label">JUMLAH DAFTAR</label>
                            <div class="col col-sm-10">
                                <input type="number" wire:model="jumlah_daftar" name="jumlah_daftar" type="text" class="form-control">
                            </div>
                        </div>
                        @error('jumlah_daftar')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="text-end mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <div wire:click="onUpdate('{{ $this->id }}')" class="btn btn-light">Batal</div>
                        </div>
                    </form>
                </div>
            </div>
        @else
            <div class="card mt-5 shadow-sm rounded-3">
                <div class="card-header">
                    <div class="text-end">
                        <div wire:click="onCreate" class="btn btn-primary">Tambah</div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>No RT</th>
                                    <th>Jumlah Daftar Pemilih</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($datas as $data)
                                    <tr>
                                        <td>{{ $data->no_rt ?? '-' }}</td>
                                        <td>{{ $data->jumlah_daftar ?? '-' }}</td>
                                        <td>
                                            <div wire:click="onUpdate('{{ $data->id }}')" class="btn btn-primary bi bi-pencil-square"></div>
                                            <div wire:click="delete('{{ $data->id }}')" class="btn btn-danger bi bi-trash-fill"></div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5"><div class="text-center">Data Kosong</div></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
