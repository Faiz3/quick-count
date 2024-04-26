<div>
    <div class="container mt-5" wire:poll>
        @if ($is_create)
            <div class="card mt-5 shadow-sm rounded-3">
                <div class="card-body">
                    <form wire:submit.prevent="create">
                        <div class="row">
                            <label for="" class="col col-3 col-form-label">Nama</label>
                            <div class="col col-9">
                                <input wire:model="nama" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col col-3 col-form-label">Email</label>
                            <div class="col col-9">
                                <input wire:model="email" class="form-control" type="email">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col col-3 col-form-label">Password</label>
                            <div class="col col-9">
                                <input wire:model="password" class="form-control" type="text">
                            </div>
                        </div>
                        
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
                            <label for="" class="col col-3 col-form-label">Nama</label>
                            <div class="col col-9">
                                <input wire:model="nama" class="form-control" type="text">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col col-3 col-form-label">Email</label>
                            <div class="col col-9">
                                <input wire:model="email" class="form-control" type="email">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <label for="" class="col col-3 col-form-label">Password</label>
                            <div class="col col-9">
                                <input wire:model="password" class="form-control" type="text">
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
                                {{-- <th>No</th> --}}
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->on_password }}</td>
                                <td>
                                    <div wire:click="onUpdate('{{ $user->id }}')" class="btn btn-primary"><i class="bi bi-pencil-square"></i></div>
                                    <div wire:click="delete('{{ $user->id }}')" class="btn btn-danger"><i class="bi bi-trash-fill"></i></div>
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
