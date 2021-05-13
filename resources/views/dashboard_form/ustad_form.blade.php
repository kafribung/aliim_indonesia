<div class="form-group">
    <label for="img" class="control-label mb-1">Foto</label>
    @if ($ustad->name != null)
    <img src="{{url($ustad->takeImg)}}" alt="Gambar {{$ustad->name}}" title="Gambar {{$ustad->name}}" width="100"  height="100">
    @endif
    <input id="img" name="img" accept="image/*" type="file" class="form-control @error('img') is-invalid @enderror" autofocus accept="image/*" autocomplete="off"">

    @error('img')
        <p class=" alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="name" class="control-label mb-1">Nama</label>
    <input id="name" name="name" type="text" class="form-control @error('name') is-invalid @enderror" required  autocomplete="off" value="{{old('name') ?? $ustad->name}}">

    @error('name')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="email" class="control-label mb-1">Email</label>
    <input id="email" name="email" email="email" class="form-control @error('email') is-invalid @enderror" autocomplete="off" required value="{{old('email') ?? $ustad->email}}">

    @if ($errors->has('email'))
    <p class="alert alert-danger">{{$errors->first('email')}}</p>
    @endif
</div>

<div class="form-group">
    <label for="date_birth" class="control-label mb-1">Tgl Lahir</label>
    <input id="date_birth" name="date_birth" type="date" class="form-control @error('date_birth') is-invalid @enderror" required autocomplete="off" value="{{old('date_birth') ?? $ustad->date_birth}}">

    @error('date_birth')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="gender" class="control-label mb-1">Jenis Kelamin</label>
    <select id="gender" name="gender" class="form-control @error('gender') is-invalid @enderror" required  autocomplete="off">
        <option {{ $ustad->gender == 'Pria' ? 'selected' : ''}} value="Pria">Pria</option>
        <option {{ $ustad->gender == 'Wanita' ? 'selected' : ''}} value="Wanita">Wanita</option>
    </select>

    @error('gender')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div id="app">
    <dash-district-component/>
    @error('district')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="password" class="control-label mb-1">Password</label>
    <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" required ">

    @error('password')
        <p class=" alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="password_confirmation" class="control-label mb-1">Konfirmasi Password</label>
    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control @error('password') is-invalid @enderror" autocomplete="off" required ">

    @error('password')
        <p class=" alert alert-danger">{{$message}}</p>
    @enderror
</div>
@push('after_script')
    <script src="{{ asset('js/app.js') }}" defer></script>
@endpush