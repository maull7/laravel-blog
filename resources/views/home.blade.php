<x-layouts>
    <x-slot:judul>selamat datang di {{ Auth::user()->name }} {{ $judul }}</x-slot:judul>
    <div class="container">
        <div class="row">
            @if (count($posts) == 0)
                {{ 'anda belum pernah memosting apapun' }}
            @else
                @foreach ($posts as $post)
                    <div class="col-lg-4 col-md-6 col-xs-12 mb-3 mt-4">
                        <article>
                            <div class="card p-4 border-0 shadow">
                                <div class="card-body">
                                    <h4 class="card-title">{{ Str::limit($post['title'], 10) }}</h4>
                                    <h6><a class="text-dark" href="/home/{{ $post->author->id }}">Autor :
                                            {{ $post->author->name }}</a> ||
                                        {{ $post->created_at->diffForHumans() }}</h6>
                                    <h6><a class="text-dark" href="/home/category/{{ $post->category->id }}">Tentang :
                                            {{ $post->category->category }}</a>
                                        <p class="card-text">{{ Str::limit($post['body'], 50) }}</p>
                                        <a href="/posts/{{ $post['id'] }}">baca selengkapnya
                                            &raquo;</a>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            @endif
        </div>
    </div>






</x-layouts>
