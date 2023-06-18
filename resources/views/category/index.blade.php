@extends('layouts.main')
@section('title')
    Категории  новостей @parent
@endsection
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse ($listCategoryNews as $key => $news)
                <div class="col">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <p>
                                <strong> <a href="{{ route('category.show', ['category' => $news->id]) }}">{{ $news ->title}}</a></strong>
                            </p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('category.show', ['category' => $news->id]) }}" type="button"
                                       class="btn btn-sm btn-outline-secondary">Подробнее</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <h2>Категорий нет</h2>
            @endforelse
        </div>
    </div>
@endsection
