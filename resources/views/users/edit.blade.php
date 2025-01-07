@extends ('layouts.default')
@section('page-title', 'Editar Usuários')
@section('content')
<form action="{{route('users.update', $user->id )}}" method="POST">
@csrf
@method('PUT')  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="text" 
           name="name" 
           class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{old('name') ?? $user->name}}">
    @error('name')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"  value="{{old('email')?? $user->email}}">
    @error('email')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror">
    @error('password')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
  </div>
  <button type="submit" class="btn btn-primary">Editar</button>
</form>
@endsection