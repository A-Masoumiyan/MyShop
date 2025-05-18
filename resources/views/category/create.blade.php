@extends('Admin.layouts.Master')
@section('content')
    <div class="col-lg-12 layout-spacing mt-4">
        <div class="statbox widget box box-shadow">

            <div class="account-settings-container layout-top-spacing">

                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">

                                <form id="general-info" class="section general-info" method="post" action="{{ route('category.store') }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="info">
                                        <h5>ویرایش اطلاعات</h5>
                                        <p style="color: #009688 " class="mb-3">برای ویرایش محتوای هر یک از فیلدهای زیر را تغییر دهید.</p>
                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row mb-4">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">

                                                            <input type="file" name="category_image" id="input-file-max-fs" class="dropify"
                                                                   data-default-file="{{asset('AdminAssets/assets/img/user-default.png')}}"
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
                                                                               value="" required autofocus
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
                                                                            <option selected="" value="1">فعال</option>
                                                                            <option value="0">غیر فعال</option>

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
                                            <button type="submit" class="btn btn-primary">ایجاد</button>
                                            @if (session('status') === 'profile-updated')
                                                <script>
                                                    Toastify({
                                                        text: "با موفقیت ثبت شد",
                                                        position: "left",
                                                        duration: 6000,
                                                        className: "custom-toast",
                                                    }).showToast();
                                                </script>
                                            @endif
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
