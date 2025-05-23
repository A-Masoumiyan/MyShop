@extends('Admin.layouts.Master')
@section('content')
    <link href="{{asset('AdminAssets/assets/css/scrollspyNav.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('AdminAssets/assets/css/tables/table-basic.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="{{asset('AdminAssets/assets/css/forms/theme-checkbox-radio.css')}}">
    @if (session('success'))
        <script>
            Toastify({
                text: {!! json_encode(session('success')) !!},
                gravity: 'bottom',
                position: "left",
                duration: 6000,
                className: "custom-toast",
                style: {
                    background: 'rgba(1,140,127,0.87)'
                }
            }).showToast();
        </script>
    @endif

    <div class="row layout-top-spacing">

        <div id="tableCheckbox" class="col-lg-12 col-12 layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-header">
                    <div class="row">
                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                            <h4>دسته بندی ها</h4>
                        </div>
                    </div>
                </div>
                <div class="widget-content widget-content-area">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                            <tr>
                                <th class="">نام دسته بندی</th>
                                <th class="">تصویر</th>
                                <th class="">وضعیت</th>
                                <th class="text-center">عملیات</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>

                                    <td>
                                        <p class="mb-0">{{$category->name}}</p>
                                    </td>
                                    <td style="text-align: center"><img src="{{asset('storage/' . $category->category_image)}}" style="width: 72px; height: 52px; margin: -8px; border-radius: 5px">
                                    </td>
                                    @switch($category->is_active)
                                        @case('1')
                                            <td class="text-center" style="width: 23%"><span class="badge badge-success" style="width: 18%">فعال</span></td>
                                            @break
                                        @case('0')
                                            <td class="text-center" style="width: 23%"><span class="badge badge-danger" style="width: 28%">غیر فعال</span></td>
                                            @break
                                    @endswitch


                                    <td class="text-center" style="width: 15%">
                                        <ul class="table-controls">
                                            <li class="mr-3"><a href="{{route('category.edit',$category->id)}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 text-success">
                                                        <path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path>
                                                    </svg>
                                                </a></li>

                                            <li class="ml-3"><a href="#" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                         stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2 text-danger">
                                                        <polyline points="3 6 5 6 21 6"></polyline>
                                                        <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        <line x1="10" y1="11" x2="10" y2="17"></line>
                                                        <line x1="14" y1="11" x2="14" y2="17"></line>
                                                    </svg>
                                                </a></li>

                                            <div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="confirmUserDeletionLabel"> تأیید حذف دسته بندی: {{$category->name}}</h5>
                                                            <a class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                                     stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                                                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                                                </svg>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form method="post" action="{{ route('category.destroy', $category->id) }}">
                                                                @csrf
                                                                @method('delete')

                                                                <p> آیا مطمئن هستید که می‌خواهید دسته بندی <span> {{ $category->name }} </span> را حذف کنید؟ این اقدام غیرقابل بازگشت است .</p>

                                                                <div class="pt-3">
                                                                    <button type="button" class="btn btn-primary me-2 float-left" data-bs-dismiss="modal">لغو</button>
                                                                    <button type="submit" class="btn btn-danger float-right">حذف دسته بندی</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <script src="{{asset('AdminAssets/assets/js/scrollspyNav.js')}}"></script>

@endsection
