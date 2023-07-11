@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Категории</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Добавить категорию</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('admin.messages')
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date created</th>
                <th>Actions</th>
            </tr>
            @foreach($categoryList as $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->title }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Edit</a>&nbsp; <a href="javascript:;" style="color:red" rel="{{ $category->id }}" class="delete">Delete</a> </td>
                </tr>
            @endforeach
        </table>

        {{ $categoryList->links() }}
    </div>
@endsection
@push('js')
    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function () {
            let elements = document.querySelectorAll(".delete");
            elements.forEach(function (element, key) {
                element.addEventListener('click', function () {
                    const id = element.getAttribute('rel');
                    if(confirm(`Подтверждаете удаление категории с #ID = ${id}`)) {
                        send(`/admin/categories/${id}`).then(() => {
                            location.reload();
                        });
                    } else {
                        alert('Вы отменили удаление категории');
                    }
                });
            });
        });

        async  function send(url) {
            let response = await fetch(url, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                }
            });

            let result = await response.json();
            return result.ok;
        }
    </script>
@endpush
