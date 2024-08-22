<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Registrasi</div>
                <div class="card-body">
                    <form wire:submit.prevent="registersUsers">

                        <div class="mb-3">
                            <label for="nama" class="form-label">Masukan nama lengkap anda</label>
                            <input type="text" class="form-control" id="name" wire:model="name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">Masukan alamat email anda</label>
                            <input type="email" class="form-control" id="Email" wire:model="email">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="Password" class="form-label">Masukan kata sandi anda</label>
                            <input type="password" class="form-control" wire:model="password" id="Password"
                                aria-describedby="emailHelp">
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div id="emailHelp" class="form-text">Masukanlah kata sandi anda dengan benar</div>
                        </div>
                        <div class="mb-3">
                            <label for="Password_confirmation" class="form-label">Masukan ulang kata sandi anda</label>
                            <input type="password" class="form-control" wire:model="password_confirmation">
                            <div id="emailHelp" class="form-text">Masukanlah kata sandi anda dengan benar</div>
                        </div>
                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">Register</button>
                        </div>
                        <a href="/login" class="text-primary"> Sudah punya akun ? yuk login aja</a>
                    </form>


                </div>
            </div>
        </div>

    </div>
</div>
