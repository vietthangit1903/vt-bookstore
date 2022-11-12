<main id="content">
    <div class="container col-lg-8 col-md-8 col-sm-12 my-5">
        <div class="text-center mb-5">
            <h5 class="font-size-7 font-weight-medium">Manage Book Categories</h5>

        </div>
        <form class="form-row justify-content-center mb-3">
            <div class="col-md-5 mb-3 mb-md-2">
                <div class="input-group">
                    <input type="text" class="form-control px-5 height-60" name="name"
                        placeholder="Enter category name here." aria-label="Book categories">
                </div>
            </div>
            <div class="col-sm-2 col-md-4 ml-md-2">
                <button type="submit" class="btn btn-dark rounded-0 btn-wide py-3 font-weight-medium">Add new category
                </button>
            </div>
        </form>

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
                            <a href="#" class="table-link font-size-5"><i class="fa-solid fa-xmark"></i></a>
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul
                class="pagination pagination__custom justify-content-md-center flex-nowrap flex-md-wrap overflow-auto overflow-md-visble">
                @php
                    $pageAmount = ceil($paginator->total() / $paginator->perPage()) ;
                @endphp
                <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link"
                        href="{{ $paginator->previousPageUrl() }}">Previous</a>
                </li>
                @for ($i = 1; $i <= $pageAmount; $i++)
                    <li @class(['flex-shrink-0', 'flex-md-shrink-1', 'page-item', 'active'=> ($i == $paginator->currentPage())])>
                        <a class="page-link" href="{{ $paginator->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                <li class="flex-shrink-0 flex-md-shrink-1 page-item"><a class="page-link"
                        href="{{ $paginator->nextPageUrl() }}">Next</a>
                </li>
            </ul>
        </nav>
    </div>
</main>
