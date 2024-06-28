<div>
    <div class="container mt-5" wire:poll>
        @if ($is_create)
            <div class="fs-2 mb-3">Tambah Data</div>
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <form action="" wire:submit.prevent="create" enctype="multipart/form-data">
                        <div class="row mb-4 mt-2">
                            <label for="foto_calon" class="col col-sm-2 col-form-label">Foto Calon</label>
                            <div class="col col-sm-10">
                                <input wire:model="foto_calon" name="foto_calon" type="file" class="form-control">
                            </div>
                        </div>
                        @error('foto_calon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4 mt-2">
                            <label for="nama_calon" class="col col-sm-2 col-form-label">Nama Calon</label>
                            <div class="col col-sm-10">
                                <input wire:model="nama_calon" name="nama_calon" type="text" class="form-control">
                            </div>
                        </div>
                        @error('nama_calon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4 mt-2">
                            <label for="alamat" class="col col-sm-2 col-form-label">Alamat</label>
                            <div class="col col-sm-10">
                                <input wire:model="alamat" name="alamat" type="text" class="form-control">
                            </div>
                        </div>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4 mt-2">
                            <label for="no_hp" class="col col-sm-2 col-form-label">No HP</label>
                            <div class="col col-sm-10">
                                <input wire:model="no_hp" name="no_hp" type="text" class="form-control">
                            </div>
                        </div>
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="no_urut" class="col col-sm-2 col-form-label">No Urut</label>
                            <div class="col col-sm-10">
                                <input wire:model="no_urut" name="no_urut" type="text" class="form-control">
                            </div>
                        </div>
                        @error('no_urut')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="jenis_kelamin" class="col col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col col-sm-10">
                                <select wire:model="jenis_kelamin" class="text-center form-control" id="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="keterangan" class="col col-sm-2 col-form-label">Keterangan RT</label>
                            <div class="col col-sm-10">
                                <select wire:model="keterangan" class="text-center form-control" id="keterangan">
                                    <option value="">Pilih</option>
                                    @foreach ($datarts as $datart)
                                        <option value="{{ $datart->no_rt }}">Rt. {{ $datart->no_rt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('keterangan')
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
            <div class="card shadow-sm rounded-3">
                <div class="card-body">
                    <form action="" wire:submit.prevent="update" enctype="multipart/form-data">
                        <div class="row mb-4 mt-2">
                            <label for="foto_calon" class="col col-sm-2 col-form-label">Foto Calon</label>
                            <div class="col col-sm-10">
                                <input wire:model="foto_calon" name="foto_calon" type="file" class="form-control">
                            </div>
                        </div>
                        @error('foto_calon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4 mt-2">
                            <label for="nama_calon" class="col col-sm-2 col-form-label">Nama Calon</label>
                            <div class="col col-sm-10">
                                <input wire:model="nama_calon" name="nama_calon" type="text" class="form-control">
                            </div>
                        </div>
                        @error('nama_calon')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4 mt-2">
                            <label for="alamat" class="col col-sm-2 col-form-label">Alamat</label>
                            <div class="col col-sm-10">
                                <input wire:model="alamat" name="alamat" type="text" class="form-control">
                            </div>
                        </div>
                        @error('alamat')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4 mt-2">
                            <label for="no_hp" class="col col-sm-2 col-form-label">No HP</label>
                            <div class="col col-sm-10">
                                <input wire:model="no_hp" name="no_hp" type="text" class="form-control">
                            </div>
                        </div>
                        @error('no_hp')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="no_urut" class="col col-sm-2 col-form-label">No Urut</label>
                            <div class="col col-sm-10">
                                <input wire:model="no_urut" name="no_urut" type="text" class="form-control">
                            </div>
                        </div>
                        @error('no_urut')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="jenis_kelamin" class="col col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col col-sm-10">
                                <select wire:model="jenis_kelamin" class="text-center form-control"
                                    id="jenis_kelamin">
                                    <option value="">Pilih</option>
                                    <option value="laki-laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        @error('jenis_kelamin')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                        <div class="row mb-4">
                            <label for="keterangan" class="col col-sm-2 col-form-label">Keterangan RT</label>
                            <div class="col col-sm-10">
                                <select wire:model="keterangan" class="text-center form-control" id="keterangan">
                                    <option value="">Pilih</option>
                                    @foreach ($datarts as $datart)
                                        <option value="{{ $datart->no_rt }}">Rt. {{ $datart->no_rt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        @error('keterangan')
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
                @if ($admin)
                    <div class="card-header">
                        <div class="text-end">
                            <div wire:click="onCreate" class="btn btn-primary">Tambah</div>
                        </div>
                    </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="table-dark">
                                <tr>
                                    <th>Foto</th>
                                    <th>Nama Calon</th>
                                    <th>No. Urut</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Keterangan</th>
                                    <th>Alamat</th>
                                    <th>No HP</th>
                                    @if ($admin)
                                        <th>Aksi</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($datas as $data)
                                    <tr>
                                        <td><img src="{{ Storage::url($data->foto) ?? asset('assets/brand/logo.jpeg') }}"
                                                alt="{{ Storage::url($data->foto) ?? 'foto-calon' }}"
                                                style="width: 50px; height: 50px" width="50px" height="50px"></td>
                                        <td>{{ $data->nama_calon ?? '-' }}</td>
                                        <td>{{ $data->no_urut ?? '-' }}</td>
                                        <td>{{ $data->jenis_kelamin ?? '-' }}</td>
                                        <td>Rt. {{ $data->keterangan ?? '-' }}</td>
                                        <td>Rt. {{ $data->alamat ?? '-' }}</td>
                                        <td>Rt. {{ $data->no_hp ?? '-' }}</td>
                                        @if ($admin)
                                            <td>
                                                <div wire:click="onUpdate('{{ $data->id }}')"
                                                    class="btn btn-primary bi bi-pencil-square"></div>
                                                <div wire:click="delete('{{ $data->id }}')"
                                                    class="btn btn-danger bi bi-trash-fill"></div>
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5">
                                            <div class="text-center">Data Kosong</div>
                                        </td>
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
