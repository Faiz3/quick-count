<div>
    <div class="container mt-5" wire:poll>
        @if ($is_create)
            <div class="card mt-5 shadow-sm rounded-3">
                <div class="card-body">
                    <form wire:submit.prevent="create">
                        <div class="row">
                            <label for="" class="col col-3 col-form-label">No RT</label>
                            <div class="col col-9">
                                <select class="form-control text-center" wire:model="keterangan" name="" id="">
                                    <option value="">Pilih</option>
                                    @foreach ($datarts as $data)
                                        <option value="{{ $data->no_rt }}">{{ $data->no_rt }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <hr>
                        <div class="row mt-3">
                            <div class="col col-3"></div>
                            <label for="" class="col col-9 col-form-label text-center">Jumlah Suara</label>
                        </div>
                        @php
                        $n = 1
                        @endphp
                        @foreach ($isdata as $data)
                            @php
                            $n++;
                            $this->nocalon[] = $data->no_urut;
                            $this->idcalon[] = $data->id;
                            @endphp

                            <div class="row mt-2">
                                <label for="" class="col col-3 col-form-label">No Urut {{ $data->no_urut }}</label>
                                <div class="col col-9">
                                    <input wire:model="datasuara.{{ $n }}" type="text" class="form-control">
                                </div>
                            </div>
                        @endforeach
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <div wire:click="onCreate" class="btn btn-scondary">Batal</div>
                    </form>
                </div>
            </div>
        @elseif ($is_update)
            <div class="card">
                <div class="card-body">
                    <form wire:submit.prevent="update">
                        <div class="row">
                            <label class="col col-3 col-form-label">NO RT</label>
                            <div class="col col-9">
                                <input wire:model="no_rt" disabled type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col col-3 col-form-label">NO URUT</label>
                            <div class="col col-9">
                                <input wire:model="no_urut" disabled type="text" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col col-3 col-form-label">JUMLAH SUARA</label>
                            <div class="col col-9">
                                <input wire:model="jumlah_suara" type="text" class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <div wire:click="onUpdate({{ $this->id }})" type="button" class="btn btn-secondary btn-sm">Batal</div>
                    </form>
                </div>
            </div>
        @else
            <div class="card shadow-sm rounded-3">
                <div class="card-header">
                    <div wire:click="onCreate" class="btn btn-primary">Tambah</div>
                </div>
                <div class="card-body">
                    <table class="table responsive">
                        <thead>
                            <tr>
                                <th>No RT</th>
                                <th>No Urut</th>
                                <th>Jumlah Suara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($datasuaras as $data)
                            <tr>
                                <td>{{ $data->no_rt }}</td>
                                <td>{{ $data->no_urut }}</td>
                                <td>{{ $data->jumlah_suara }}</td>
                                <td>
                                    <div wire:click="onUpdate('{{ $data->id }}')" class="btn btn-primary"><i class="bi bi-pencil-square"></i></div>
                                    <div wire:click="delete('{{ $data->id }}')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
