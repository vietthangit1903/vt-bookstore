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
            @foreach ($paginator as $publisher)
                <tr class="cart_item">
                    <td>{{ $publisher->id }}</td>
                    <td>{{ $publisher->name }}</td>
                    <td>
                        <a href="{{ route('admin.publishers', ['id'=>$publisher->id]) }}" title="Edit publisher"
                            class="table-link font-size-5 mr-2"><i class="fa-solid fa-pen"></i></a>
                        <a href="{{ route('admin.delete-publisher') }}" class="table-link font-size-5 delete"
                            data-id="{{ $publisher->id }}" data-csrf="{{ csrf_token() }}"
                            data-name="{{ $publisher->name }}" data-reload-url="{{ url()->current() }}"
                            title="Delete publisher"><i class="fa-solid fa-xmark"></i></a>
                    </td>
                </tr>
            @endforeach


        </tbody>
    </table>
    @include('layout.pagination')
</div>
