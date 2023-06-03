@extends('layouts.dashboard')
@section('content')
    <section id="create-song">
        <div class="container card py-3">
            <form action="/dashboard/song/{{ $song->id }}" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control @error('name') is-invalid
                    @enderror"
                        id="name" name="name" placeholder="Ex. RM" required value="{{ old('name', $song->name) }}">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="duration" class="form-label">Duration</label>
                    <input type="text" class="form-control @error('duration') is-invalid
                    @enderror"
                        id="duration" name="duration" placeholder="Ex. 04.00" required
                        value="{{ old('duration', $song->duration) }}">
                    @error('duration')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="album" class="form-label">Album</label>
                    <select class="form-select" aria-label="Default select example" name="album_id" required>
                        <option selected>Select album</option>
                        @foreach ($album as $a)
                            <option value="{{ $a->id }}" {{-- @if (old('album_id', $song->album_id) == $a->id) selected @endif --}}>
                                {{ $a->name }}</option>
                        @endforeach
                    </select>
                </div>



                <button type="submit" class="btn btn-primary">update</button>
            </form>
        </div>
    </section>
@endsection
