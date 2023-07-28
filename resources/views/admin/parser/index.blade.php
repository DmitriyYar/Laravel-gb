@extends('layouts.admin')
@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Парсер</h1>
    </div>

    <div>
        @foreach($data as $d)
            <div>
                <pre>{{print_r($d)}}</pre>
            </div>
        @endforeach
    </div>
@endsection
