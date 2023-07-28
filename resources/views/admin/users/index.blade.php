@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Пользователи</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="#" type="button" class="btn btn-sm btn-outline-secondary">Добавить пользователя</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('admin.messages')
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>isAdmin</th>
                <th>Date created</th>
            </tr>
            @foreach($usersList as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <th>{{ $user->isAdmin }}</th>
                    <td>{{ $user->created_at }}</td>
                    <td>
                        @if(!$user->isAdmin)
                            <a href="{{ route('admin.users.edit', ['user' => $user]) }}">addAdmin</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
        {{ $usersList->links() }}
    </div>
@endsection
