@extends('layouts.main')
@section('title') Список  новостей @parent @endsection
@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse ($newsList as $key => $news)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ $news->image }}" alt="Image" />

                <div class="card-body">
                    <p><strong><a href="{{ route('news.show', ['news' => $news->id]) }}">{{ $news->title }}</a></strong></p>
                    <p class="card-text">{!! $news->description !!}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a href="{{ route('news.show', ['news' =>$news->id]) }}" type="button" class="btn btn-sm btn-outline-secondary">Подробнее</a>
                        </div>
                        <small class="text-muted">{{ $news->author }} - {{ $news->created_at }}</small>
                    </div>
                </div>
{{--                @if($loop->last)--}}
{{--                    <strong>Это последняя новость</strong>--}}
{{--                @endif--}}
            </div>
        </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
    </div>
</div>
@endsection

