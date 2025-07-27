@extends('Admin.layouts.Master')

@section('content')
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('AdminAssets/plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAssets/assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" href="{{ asset('AdminAssets/plugins/table/datatable/dt-global_style.css') }}">
    <link href="{{ asset('AdminAssets/assets/css/scrollspyNav.css') }}" rel="stylesheet">
    <link href="{{ asset('AdminAssets/assets/css/tables/table-basic.css') }}" rel="stylesheet">

    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
            <div class="widget-content widget-content-area br-6">
                <div class="table-responsive mb-4 mt-4">
                    <table id="multi-column-ordering" class="table table-hover" style="width:100%">
                        <thead>
                        <tr>
                            <th>نام محصول</th>
                            <th>دسته‌بندی</th>
                            <th>قیمت</th>
                            <th>وضعیت</th>
                            <th>موجودی</th>
                            <th>خلاصه توضیحات</th>
                            <th>تاریخ ثبت محصول</th>
                            <th class="text-center">عملیات</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>
                                    <div class="d-flex">
                                        <div class="usr-img-frame mr-2 rounded-circle">
                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                 src="{{ $product->image ? asset('storage/' . $product->image) : asset('AdminAssets/assets/img/90x90.jpg') }}">
                                        </div>
                                        <p class="align-self-center mb-0 admin-name">{{ $product->name }}</p>
                                    </div>
                                </td>
                                <td>{{ $product->category ? $product->category->name : '-' }}</td>
                                <td>{{ number_format($product->price) }} تومان</td>
                                <td>{{ $product->is_active ? 'فعال' : 'غیرفعال' }}</td>
                                <td>{{ $product->stock }}</td>
                                <td>{{ Str::limit($product->description ?? '-', 60) }}</td>
                                <td>{{ $product->created_at->format('Y/m/d') }}</td>
                                <td class="text-center">
                                    <ul class="table-controls">
                                        <li class="mr-2">
                                            <a href="{{ route('product.show', $product->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye text-info">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>                                            </a>
                                        </li>
                                        <li class="mr-2">
                                            <a href="{{ route('product.edit', $product->id) }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                                    <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                </svg>                                            </a>
                                        </li>
                                        <li class="ml-2">
                                            <a href="javascript:void(0)" data-bs-toggle="modal"
                                               data-bs-target="#deleteModal{{ $product->id }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg>                                            </a>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-center">
                    {{ $products->appends(request()->query())->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Category Filter (used by DataTables) -->
    <form method="GET" action="{{ route('product.index') }}" id="category-filter-form" class="d-none">
        <div class="form-inline">
            <select name="category_id" id="category_id" class="form-control"
                    onchange="document.getElementById('category-filter-form').submit()">
                <option value="">همه دسته‌بندی‌ها</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Modals (outside of table to avoid DOM conflict) -->
    @foreach ($products as $product)
        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1"
             aria-labelledby="deleteModalLabel{{ $product->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 style="color: #009688" class="modal-title" id="deleteModalLabel{{ $product->id }}">تأیید حذف کالا:
                            <strong style="color: #9CDCFE">{{ $product->name }}</strong></h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('delete')

                            <p style="color: #009688">آیا مطمئن هستید که می‌خواهید کالای <strong style="color: #ff6666">{{ $product->name }}</strong> را حذف کنید؟
                                این اقدام غیرقابل بازگشت است.</p>
                            <div class="pt-3 text-end">
                                <button type="button" class="btn btn-secondary me-2 float-left"
                                        data-bs-dismiss="modal">لغو</button>
                                <button type="submit" class="btn btn-danger float-right">حذف محصول</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    <!-- Custom styles -->
    <style>
        .dataTables_filter input[type="search"] {
            width: 300px !important;
            display: inline-block;
            border-radius: 6px;
        }

        #category_id {
            width: 300px;
            display: inline-block;
            margin-right: 10px;
        }
    </style>

    <!-- JS -->
    <script src="{{ asset('AdminAssets/assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('AdminAssets/assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('AdminAssets/plugins/table/datatable/datatables.js') }}"></script>
    <script>
        $('#multi-column-ordering').DataTable({
            "oLanguage": {
                "oPaginate": {
                    "sPrevious": '<svg ...></svg>',
                    "sNext": '<svg ...></svg>'
                },
                "sInfo": "صفحه {{ $products->currentPage() }} از {{ $products->lastPage() }}",
                "sInfoEmpty": "",
                "sZeroRecords": "هیچ محصولی یافت نشد",
                "sSearch": '<svg ...></svg>',
                "sSearchPlaceholder": "جستجو کنید...",
            },
            "paging": false,
            "dom": '<"row justify-content-between align-items-center mb-3"<"col-md-4 custom-category-filter ml-3"><"col-md-4 mr-5"f>>tip',
            "initComplete": function() {
                $('.custom-category-filter').html($('#category-filter-form').removeClass('d-none'));
            }
        });
    </script>

@endsection
