<div>
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col col-12 col-md-8 col-lg-6 mt-5">
                <div class="card mt-5 border-0 shadow-sm rounded-3">
                    <div class="card-body mb-4 mt-4">
                        <h3 class="text-center mb-3">Masuk</h3>
                        <h1 class=" text-center bi bi-file-person-fill fs-1 fw-bold mb-4 text-primary"></h1>
                        <form wire:submit.prevent="login">
                            @csrf
                        <div class="form-floating mb-3">
                            <input wire:model="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                            <label for="floatingInput">Email address</label>
                            @error('email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="form-floating">
                            <input wire:model="password" type="{{ $is_visible ? 'password' : 'text' }}" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mt-3 form-check">
                            <input type="checkbox" wire:click="$toggle('is_visible')" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label" for="exampleCheck1">Show Password</label>
                          </div>
                        <button class=" btn btn-primary mt-4" type="submit">Masuk</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
