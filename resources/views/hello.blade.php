@extends('layouts.main-html')

@section('title')Страница приветствия@endsection

@section('content')
    <h2>Пользователь {{$name}}</h2>

    <p>Приветствуем вас на программе обучающий курс по Laravel</p>
@endsection

