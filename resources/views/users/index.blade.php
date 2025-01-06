@extends ('layouts.default')   
@section('page-title', 'Usuários') 

@section('page-actions')
<a href="{{route('users.create')}}" class="btn btn-primary">Adicionar</a>
@endsection

@section('content')

@session('status')
<div class="alert alert-success">
 {{ $value }}
</div>
@endsession


    <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Ação</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th scope="row">{{$user->id}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td>
        <a href="" class="btn btn-primary btn-sm">Editar</a>
        <a href="" class="btn btn-danger btn-sm">Excluir</a>
    </tr>
    @endforeach
  </tbody>
</table>


@endsection