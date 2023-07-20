@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Перевести пользователя в администраторы</h1>
    </div>

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.profile.updateIsAdmin') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="id">ID</label>
            <input type="text" name="id" id="id" class="form-control" value="{{ $user->id }}" style="background-color: #dcdfe3" readonly>
        </div>
        <div class="form-group">
            <label for="name">Пользователь</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}" style="background-color: #dcdfe3" readonly>
        </div>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}" style="background-color: #dcdfe3" readonly>
        </div>
        <div class="form-group">
            <label for="password">Введите пароль</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        <br>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>
@endsection
