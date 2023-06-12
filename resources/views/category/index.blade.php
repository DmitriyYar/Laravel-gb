@extends('layouts.main')
@section('title') Категории  новостей @parent @endsection
@section('content')
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse ($listCategoryNews as $key => $news)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#55595c"/>
                            <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                        </svg>
                        <div class="card-body">
                            <p><strong><a href="{{ route('category.show', ['category' => $news]) }}">{{ $news }}</a></strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ route('category.show', ['category' => $news]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
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
