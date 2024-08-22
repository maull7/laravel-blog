<x-layouts>
    <x-slot:judul>selamat datang di{{ $judul }}</x-slot:judul>
    <div class="container">
        <div class="row justify-content-center d-flex">
            <div class="col-lg-12 align-items-center">
                <article class="justify-content-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{ $user['name'] }}</h2>
                            <h2>{{ $user['email'] }}</h2>
                            <form action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit">Logout</button>
                            </form>
                            <a href="/home">&laquo; Kembali</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>






</x-layouts>
