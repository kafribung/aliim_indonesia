<div class="form-group">
    <label for="img" class="control-label mb-1">Gambar</label>
    @empty(!$iklan->img)
    <img src="{{url($iklan->takeImg)}}" alt="Gambar Error" width="100" height="100">
    @endempty
    <input id="img" name="img" type="file" class="form-control @error('img') is-invalid @enderror" autofocus  autocomplete="off" accept="image/*">
    @error('img')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="owner" class="control-label mb-1">Pemilik</label>
    <input id="owner" name="owner" type="text" class="form-control @error('owner') is-invalid @enderror" required autocomplete="off" value="{{old('owner') ?? $iklan->owner}}">
    @error('owner')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="wa" class="control-label mb-1">WA</label>
    <input id="wa" name="wa" type="number" class="form-control @error('wa') is-invalid @enderror" required autocomplete="off" value="{{old('wa') ??  $iklan->wa}}">
    @error('wa')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="link" class="control-label mb-1">Website (Optional)</label>
    <input id="link" name="link" type="url" class="form-control @error('link') is-invalid @enderror" autocomplete="off" value="{{old('link') ?? $iklan->link}}">
    @error('link')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>
