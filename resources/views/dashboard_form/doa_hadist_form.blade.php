<div class="form-group">
    <label for="title" class="control-label mb-1">Judul</label>
    <input id="title" name="title" type="text"
        class="form-control @error('title') is-invalid @enderror" autofocus required
        autocomplete="off" value="{{old('title') ?? $doaHadist->title}}">

    @error('title')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="img" class="control-label mb-1">Gambar</label>
    @if (!empty($doaHadist->title))
    <img src="{{url($doaHadist->takeImg)}}" alt="Gambar {{$doaHadist->slug}}" title="{{$doaHadist->slug}}"
    width="200" height="200">
    @endif
    <input id="img" name="img" type="file"
        class="form-control @error('img') is-invalid @enderror" autocomplete="off"
        accept="image/*">

    @error('img')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>