<x-layouts>
    <x-slot:judul>selamat datang di {{ Auth::user()->name }} {{ $judul }}</x-slot:judul>
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-9">
                <form action="/editpost/{{ $post->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="title" class="form-label">Masukan judul</label>
                        <input type="text" class="form-control" id="title" name="title"
                            value="{{ $post['title'] }}">

                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="Category">Pilih category</label>
                        <select class="form-select" id="Category" name="category_id">
                            <option selected value="{{ $post->category->id }}">{{ $post->category->category }}</option>
                            @foreach ($category as $ctr)
                                <option value="{{ $ctr->id }}">{{ $ctr->category }}</option>
                            @endforeach

                        </select>
                        @error('category_id')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="blog" class="form-label">Masukan isi text blog</label>
                        <textarea class="form-control edit-body" id="blog" name="body" rows="6" value="{{ $post['body'] }}">{{ $post['body'] }}</textarea>
                        @error('body')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <button class="btn btn-primary">TAMBAHKAN</button>
                </form>
            </div>
        </div>

    </div>


</x-layouts>
<style>
    /* .edit-body {
        height: 700px;
    } */
</style>
