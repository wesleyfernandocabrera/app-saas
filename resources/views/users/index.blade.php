@extends ('layouts.default')   
@section('page-title', 'Usuários') 

@section('page-actions')
<a href="{{route('users.create')}}" class="btn btn-primary">Adicionar</a>
@endsection

@section('content')

@if (session('status'))
<div class="alert alert-success">
 {{ session('status') }}
</div>
@endif

<form action="{{ route('users.index') }}" method="GET" class="mb-3">
    <div class="input-group">
        <input type="text" 
               name="search" 
               class="form-control" 
               placeholder="Pesquisar por nome ou email">
               <button class="btn btn-primary btn-sm" type="submit">
    <i class="bi bi-search"></i> Pesquisar
</button>
    </div>
</form>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col" class="text-end">Ação</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td class="text-end">
        <a href="{{route('users.edit', $user->id )}}" class="btn btn-primary btn-sm">Editar</a>

        <form action="{{route('users.destroy', $user->id )}}" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

{{$users->links()}}

@endsection