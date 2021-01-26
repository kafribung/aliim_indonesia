<div class="form-group">
    <label for="img" class="control-label mb-1">Foto</label>
    <img src="{{url($admin->takeImg)}}" alt="Gambar {{$admin->name}}"
        title="Gambar {{$admin->name}}" width="100" height="100">
    <input id="img" name="img" type="file"
        class="form-control @error('img') is-invalid @enderror" autofocus required
        autocomplete="off">

    @error('img')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="name" class="control-label mb-1">nama</label>
    <input id="name" name="name" type="text"
        class="form-control @error('name') is-invalid @enderror" required
        autocomplete="off" value="{{old('name') ?? $admin->name}}">

    @error('name')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="email" class="control-label mb-1">email</label>
    <input id="email" name="email" email="email"
        class="form-control @error('email') is-invalid @enderror" autocomplete="off"
        required value="{{old('email') ?? $admin->email}}">

    @if ($errors->has('email'))
    <p class="alert alert-danger">{{$errors->first('email')}}</p>
    @endif
</div>


<div class="form-group">
    <label for="date_birth" class="control-label mb-1">Tgl Lahir</label>
    <input id="date_birth" name="date_birth" type="date"
        class="form-control @error('date_birth') is-invalid @enderror" required
        autocomplete="off"
        value="{{old('date_birth') ?? $admin->date_birth}}">

    @error('date_birth')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="gender" class="control-label mb-1">Jenis Kelamin</label>
    <select id="gender" name="gender"
        class="form-control @error('gender') is-invalid @enderror" required
        autocomplete="off">
        <option {{$admin->gender == 'Pria' ? 'selected' : ''}} value="Pria">Pria
        </option>
        <option {{$admin->gender == 'Wanita' ? 'selected' : ''}} value="Wanita">Wanita
        </option>
    </select>

    @error('gender')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div>

{{-- <div class="form-group">
    <label for="provinci" class="control-label mb-1">Provinsi</label>
    <select id="provinci" name="provinci"
        class="form-control @error('provinci') is-invalid @enderror" required
        autocomplete="off">
        @foreach ($provincis['rajaongkir']['results'] as $provinci)
        <option {{ $admin->provinci == $provinci['province'] ? 'selected' : '' }}
            value="{{$provinci['province']}}">{{$provinci['province']}}
        </option>
        @endforeach
    </select>

    @error('provinci')
    <p class="alert alert-danger">{{$message}}</p>
    @enderror
</div> --}}

<div class="form-group">
    
</div>

<div class="form-group">
    <label for="password" class="control-label mb-1">Password</label>
    <input id="password" name="password" type="password"
        class="form-control @error('password') is-invalid @enderror" autocomplete="off"
        required ">

    @error('password')
        <p class=" alert alert-danger">{{$message}}</p>
    @enderror
</div>

<div class="form-group">
    <label for="password_confirmation" class="control-label mb-1">Konfirmasi Password</label>
    <input id="password_confirmation" name="password_confirmation" type="password"
        class="form-control @error('password') is-invalid @enderror" autocomplete="off" required ">

    @error('password')
        <p class=" alert alert-danger">{{$message}}</p>
    @enderror
</div>