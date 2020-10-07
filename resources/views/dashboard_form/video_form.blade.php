<div class="form-group">
    <label for="title" class="control-label mb-1">Judul</label>
    <input id="title" name="title" type="text"
        class="form-control @error('title') is-invalid @enderror" autofocus required
        autocomplete="off" value="{{old('title') ?? $video->title}}">

    @error('title')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="video" class="control-label mb-1">Video</label>
    <input id="video" name="video" type="url"
        class="form-control @error('video') is-invalid @enderror" autocomplete="off"
        value="{{old('video') ?? $video->video}}">

    @if ($errors->has('video'))
    <p class="alert alert-danger">{{$errors->first('video')}}</p>
    @endif
</div>

<div class="form-group">
    <label for="kategori" class="control-label mb-1">Kategori (Ctrl + Shift )</label>
    <select id="kategori" name="kategori[]"
        class="form-control @error('kategori') is-invalid @enderror" multiple>
        @if ($video->kategori_videos != null)
        <optgroup label="Old Kategori">
            @foreach ($video->kategori_videos as $kategori)
            <option disabled>
                {{$kategori->title}}
            </option>
            @endforeach
        </optgroup>
        @endif

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
    <label for="description" class="control-label mb-1">deskripsi</label>
    <textarea id="description" name="description"
        class="form-control ckeditor @error('description') is-invalid @enderror"
        autocomplete="off">{{old('description') ?? $video->description}}</textarea>

    @error('description')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>