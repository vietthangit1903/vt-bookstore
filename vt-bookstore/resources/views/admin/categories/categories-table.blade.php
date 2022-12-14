<div class="custom-table">
    <table class="shop_table shop_table_responsive cart mb-2">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($paginator as $category)
                <tr class="cart_item">
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('admin.categories', ['id' => $category->id]) }}" title="Edit category"
                            class="table-link font-size-5 mr-2"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('admin.delete-category') }}" class="table-link font-size-5 delete"
                            data-id="{{ $category->id }}" data-csrf="{{ csrf_token() }}"
                            data-name="{{ $category->name }}" data-reload-url="{{ url()->current() }}"
                            title="Delete category"><i class="fa-solid fa-xmark"></i></a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    @include('layout.pagination')
</div>
