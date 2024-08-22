<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header text-center">Login</div>
                <div class="card-body">
                    <form wire:submit.prevent="loginUser">
                        <div class="mb-3">
                            <label for="Email" class="form-label">Masukan alamat email anda</label>
                            <input type="email" name="email"
                                class="form-control @error('email') is-invalid @enderror" id="Email"
                                wire:model="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror

                        </div>

                        <div class="mb-3">
                            <label for="Password" class="form-label">Masukan kata sandi anda</label>
                            <input type="password" name="password"
                                class="form-control  @error('password') is-invalid @enderror" id="Password"
                                aria-describedby="emailHelp" wire:model="password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div id="emailHelp" class="form-text">Masukanlah kata sandi anda dengan benar</div>
                        </div>

                        {{-- <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input @error('remember') is-invalid @enderror"
                                    id="remember" wire:model="remember_token">
                                <label for="remember" class="form-check-label">Remember me ? </label>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>


                        </div> --}}

                        <div class="mb-4">
                            <button type="submit" class="btn btn-primary">LOGIN</button>
                        </div>
                        <a href="/register" class="text-primary">Belum punya akun ? register dulu yuk</a>
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>

                </div>
            </div>
        </div>

    </div>
</div>
