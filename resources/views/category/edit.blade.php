@extends('Admin.layouts.Master')
@section('content')
    <div class="col-lg-12 layout-spacing mt-4">
        <div class="statbox widget box box-shadow">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                                <form id="general-info" class="section general-info" method="post" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('patch')

                                    <div class="info">
                                        <h5>ویرایش اطلاعات</h5>
                                        <p style="color: #009688 " class="mb-3">برای ویرایش محتوای هر یک از فیلدهای زیر را تغییر دهید.</p>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row mb-4">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">

                                                            <input type="file" name="category_image" id="input-file-max-fs" class="dropify"
                                                                   data-default-file="{{ $category->category_image ? asset('storage/' . $category->category_image) : asset('AdminAssets/assets/img/user-default.png') }}"
                                                                   data-max-file-size="4M"/>
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1"></i> آپلود عکس</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="col">
                                                                        <label for="name" class="form-label">نام دسته بندی</label>
                                                                        <input id="name" name="name" type="text" class="form-control" placeholder="نام"
                                                                               value=" {{old('name', $category->name)}} " required autofocus
                                                                               autocomplete="given-name">
                                                                        @error('name')
                                                                        <span class="text-danger text-sm">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="form-group mt-4">
                                                                <div class="col-md-6 mb-0">
                                                                    <div class="col pl-0">
                                                                        <label for="status" class="form-label">وضعیت دسته بندی</label>
                                                                        <select name="is_active" class="form-control" id="wes-from1">
                                                                            <option {{$category->is_active == '1' ? 'selected=""' : '' }} value="1">فعال</option>
                                                                            <option {{$category->is_active == '0' ? 'selected=""' : '' }}value="0">غیر فعال</option>

                                                                        </select>

                                                                    </div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-4">
                                            <button type="submit" class="btn btn-primary">ویرایش</button>

                                            <button type="button" class="btn btn-warning ml-1">
                                            <a href="{{ url()->previous() }}" >بازگشت</a>
                                            </button>

                                            <button type="button" class="btn btn-danger float-right" data-bs-toggle="modal" data-bs-target="#confirmUserDeletion">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                            </button>

                                        </div>
                                    </div>

                                </form>
                                <div class="modal fade" id="confirmUserDeletion" tabindex="-1" aria-labelledby="confirmUserDeletionLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmUserDeletionLabel"> تأیید حذف دسته بندی: {{$category->name}}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('category.destroy', $category->id) }}">
                                                    @csrf
                                                    @method('delete')

                                                    <p>آیا مطمئن هستید که می‌خواهید این دسته بندی را حذف کنید؟ این اقدام غیرقابل بازگشت است .</p>

                                                    <div class="pt-3">
                                                        <button type="button" class="btn btn-primary me-2 " data-bs-dismiss="modal">لغو</button>
                                                        <button type="submit" class="btn btn-danger float-right">حذف دسته بندی</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
