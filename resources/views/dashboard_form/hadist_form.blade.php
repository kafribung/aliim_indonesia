<div class="form-group">
    <label for="title" class="control-label mb-1">Judul</label>
    <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" autofocus  required autocomplete="off" value="{{old('title') ?? $hadist->title}}">

    @error('title')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="info" class="control-label mb-1">Sanad</label>
    <input id="info" name="info" type="text" class="form-control @error('info') is-invalid @enderror"  required autocomplete="off" value="{{old('info') ?? $hadist->info}}">

    @error('info')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="description" class="control-label mb-1">Deskripsi</label>
    <textarea id="description" name="description" class="form-control ckeditor @error('description') is-invalid @enderror"  >{{old('description') ?? $hadist->description}}</textarea>

    @error('description')
        <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>