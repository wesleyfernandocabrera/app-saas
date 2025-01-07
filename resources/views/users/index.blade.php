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


@include('users.parts.basic-details')


@endsection