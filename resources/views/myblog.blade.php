<x-layouts>
    <x-slot:judul>selamat datang di {{ Auth::user()->name }} {{ $judul }}</x-slot:judul>
    <div class="container">
        <div class="row">
            @if (count($posts) == 0)
                {{ 'anda belum pernah memosting apapun' }}
            @else
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-xs-12 mb-3 mt-4">
                        <article class="justify-content-center">
                            <div class="card border-0 shadow">
                                <a href="/post_edit/{{ $post['id'] }}"><i class="bi bi-pencil-square"></i></a>

                                <div class="card-body">
                                    <h2 class="card-title">{{ $post['title'] }}</h2>
                                    <a class="text-dark"href="/posts?author={{ $post->author->username }}">
                                        <h4>Penulis: {{ $post->author->name }}</h4>
                                    </a>
                                    <h6><a class="text-dark" href="/home/category/{{ $post->category->id }}">Tentang :
                                            {{ $post->category->category }}</a>
                                        <p class="card-text">{{ Str::limit($post['body'], 50) }}</p>
                                        <a href="/posts/{{ $post['id'] }}">baca selengkapnya
                                            &raquo;</a>
                                </div>
                                <form action="{{ route('hapus', $post->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </article>
                    </div>
                @endforeach
            @endif
        </div>
    </div>






</x-layouts>
