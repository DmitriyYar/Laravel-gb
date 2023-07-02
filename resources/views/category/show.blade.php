@extends('layouts.main')
@section('title')
    Список  новостей @parent
@endsection
@section('content')
    <div class="container">
        <h1 style="color: green;">Категория новостей: {{ $title }}</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse ($listCategoryNews as $category)
                <div class="col">
                    <div class="card shadow-sm">
                        <img src="{{ $category->image }}" alt="Image"/>
                        <div class="card-body">
                            <p>
                                <strong> <a href="{{ route('news.show', ['news' => $category]) }}">{{ $category->title }}</a></strong>
                            </p>
                            <p class="card-text">{!! $category->description !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('news.show', ['news' => $category]) }}" type="button"
                                       class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                </div>
                                <small class="text-muted">{{ $category->author }} - {{ $category->created_at }}</small>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Новостей нет</h2>
            @endforelse
        </div>
    </div>
@endsection
