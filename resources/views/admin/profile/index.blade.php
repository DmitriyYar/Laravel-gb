@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактирование профиля пользователя</h1>
    </div>
    @if(Session::has('MSG'))
        <x-alert type="success" message="{{ Session::get('MSG') }}"></x-alert>
    @endif

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <x-alert type="danger" :message="$error"></x-alert>
        @endforeach
    @endif
    <form method="post" action="{{ route('admin.profile.update')}}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Пользователь</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label for="email">Почта</label>
            <input type="text" name="email" id="email" class="form-control" value="{{ $user->email }}">
        </div>
        <div class="form-group">
            <label for="password">Текущий пароль</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>
        @error('password') <x-alert type="danger" :message="$message"></x-alert> @enderror
        <div class="form-group">
            <label for="newPassword">Новый пароль</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control">
        </div>
        @error('newPassword') <x-alert type="danger" :message="$message"></x-alert> @enderror
        <br>
        <div class="form-group">
            <label for="isAdmin">Администратор &nbsp</label>
            <input type="hidden" name="isAdmin" id="isAdmin" class="form-check-input" value="0">
            <input type="checkbox" name="isAdmin" id="isAdmin" class="form-check-input" value="1" @if($user->isAdmin) ? checked : @endif>
        </div>
        <br>
        <button type="submit" class="btn btn-success">Изменить</button>
    </form>
@endsection
