<x-layouts>
    <x-slot:judul>selamat datang di {{ Auth::user()->name }} {{ $judul }}</x-slot:judul>
    <div class="container">
        <div class="row justify-content-center d-flex">

            <div class="col-lg-12 align-items-center">
                <article class="justify-content-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <h2 class="card-title">{{ $post['title'] }}</h2>
                            <a class="text-dark"href="/posts?author={{ $post->author->username }}">
                                <h4>Penulis: {{ $post->author->name }}</h4>
                            </a>
                            <a class="text-dark" href="/posts?category={{ $post->category->slug }}">Tentang :
                                {{ $post->category->category }}</a>

                            <p class="card-text">{{ $post['body'] }}</p>

                            <a href="/home">&laquo; Kembali</a>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>






</x-layouts>
