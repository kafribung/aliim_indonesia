<div class="form-group">
    <label for="title" class="control-label mb-1">Kategori</label>
    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus required autocomplete="off" value="{{old('title') ? old('title') : $kategori->title}}">
    @error('title')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>
<div class="form-group">
    <button type="submit" class="btn btn-md {{ $create ? 'btn-info ' : 'btn-warning ' }} btn-block">{{ $create ? 'Tambah Kategori' : ' Update Kategori' }}</button>
</div>