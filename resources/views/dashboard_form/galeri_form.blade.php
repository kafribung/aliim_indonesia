<div class="form-group">
    <label for="img" class="control-label mb-1">Gambar</label>
    @if (!empty($galeri->img))
    <img class="lazy" data-src="{{ url($galeri->takeImg) }}" alt="Gambar {{ $galeri->slug }}" title="{{ $galeri->slug }}" width="100" height="100">
    @endif
    <input id="img" name="img" type="file" class="form-control @error('img') is-invalid @enderror" autocomplete="off"accept="image/*">
    @error('img')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>