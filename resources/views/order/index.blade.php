@extends('layouts.main')
@section('title') Форма заказа @parent @endsection
@section('content')
    <div class="container">
        <h1>Заказ</h1>
        @if ($errors->any())
            @foreach($errors->all() as $error)
                <x-alert type="danger" :message="$error"></x-alert>
            @endforeach
        @endif
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <form method="post" action="{{ route('order.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name">Имя</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="telephone">Телефон</label>
                    <input type="tel" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}">
                </div>
                <div class="form-group">
                    <label for="email">email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
                </div>
                 <div class="form-group">
                    <label for="description">Описание заказа</label>
                    <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">Отправить</button>
            </form>
        </div>
    </div>
@endsection
