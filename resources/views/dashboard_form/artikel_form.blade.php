<div class="form-group">
    <label for="title" class="control-label mb-1">Judul</label>
    <input id="title" name="title" type="text"
        class="form-control @error('title') is-invalid @enderror" autofocus required
        autocomplete="off" value="{{old('title')?? $artikel->title}}">

    @error('title')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="img" class="control-label mb-1">Gambar</label>
    @if ($artikel->slug != null)
    <img src="{{ url($artikel->takeImg) }}" alt="Gambar {{$artikel->slug}}"
    title="{{$artikel->slug}}" width="200" height="200">
    @endif
    <input id="img" name="img" type="file"
        class="form-control @error('img') is-invalid @enderror" accept="image/*">

    @if ($errors->has('img'))
    <p class="alert alert-danger">{{$errors->first('img')}}</p>
    @endif
</div>

<div class="form-group">
    <label for="kategori" class="control-label mb-1">Kategori (Ctrl + Shift )</label>

    <select id="kategori" name="kategori[]"
        class="form-control @error('kategori') is-invalid @enderror" required multiple>
        <optgroup label="Old Kategori">
            @foreach ($artikel->kategori_artikels as $kategori)
            <option disabled>
                {{$kategori->title}}
            </option>
            @endforeach

            @foreach ($kategoris as $kategori)
            <option {{old('kategori') == $kategori->id ? 'selected' : ''}}
                value="{{$kategori->id}}">
                {{$kategori->title}}
            </option>
            @endforeach
    </select>

    @error('kategori')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="description" class="control-label mb-1">Deskripsi</label>
    <textarea id="description" name="description"
        class="form-control ckeditor @error('description') is-invalid @enderror"
        required>
        {{old('description') ?? $artikel->description}}
    </textarea>

    @error('description')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>