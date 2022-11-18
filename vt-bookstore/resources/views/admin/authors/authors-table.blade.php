<div class="custom-table">
    <table class="shop_table shop_table_responsive cart mb-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($paginator as $author)
                <tr class="cart_item">
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->description }}</td>
                    <td>
                        <a href="{{ route('admin.authors', ['id'=>$author->id]) }}" title="Edit author"
                            class="table-link font-size-5 mr-2"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('admin.delete-authors') }}" class="table-link font-size-5 delete"
                            data-id="{{ $author->id }}" data-csrf="{{ csrf_token() }}"
                            data-name="{{ $author->name }}" data-reload-url="{{ url()->current() }}"
                            title="Delete author"><i class="fa-solid fa-xmark"></i></a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    @include('layout.pagination')
</div>
