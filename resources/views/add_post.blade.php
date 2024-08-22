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
                <form action="{{ route('addpost') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Masukan judul</label>
                        <input type="text" class="form-control" id="title" name="title">

                        @error('title')
                            <small class="text-danger">
                                {{ $message }}
                            </small>
                        @enderror

                    </div>

                    <div class="mb-3">
                        <label for="Category">Pilih category</label>
                        <select class="form-select" id="Category" name="category_id">
                            <option selected>Category</option>
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
                        <textarea class="form-control" id="blog" name="body" rows="6"></textarea>
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
