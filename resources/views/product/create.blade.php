@extends('Admin.layouts.Master')
@section('content')
    <link href="{{asset('AdminAssets/plugins/file-upload/file-upload-with-preview.min.css')}}" rel="stylesheet" type="text/css"/>
    <style>
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
            appearance: textfield;
        }
    </style>
    <div class="col-lg-12 layout-spacing mt-4">
        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="statbox widget box box-shadow">
                <div class="account-settings-container layout-top-spacing">
                    <div class="account-content">
                        <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div id="general-info" class="section general-info">
                                        <div class="info">
                                            <h5 style="color: #009688" class="mb-5">ثبت محصول جدید</h5>
                                            <div class="row">
                                                <div class="col-lg-11 mx-auto">
                                                    <div class="row mb-4">
                                                        <div class="col-xl-2 col-lg-12 col-md-4">
                                                            <div class="upload mt-4 pr-md-4">
                                                                <input type="file" name="product_image" id="input-file-max-fs" class="dropify"
                                                                       data-default-file="{{asset('AdminAssets/assets/img/user-default.png')}}"
                                                                       data-max-file-size="2M"/>
                                                                <p class="mt-2"><i class="flaticon-cloud-upload mr-1 ml-3"></i> پروفایل محصول</p>
                                                                @error('product_image')
                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                            <div class="form">
                                                                <div class="row">
                                                                    <div class="col-sm-6">
                                                                        <div class="col">
                                                                            <label for="name" class="form-label">نام محصول</label>
                                                                            <input id="name" name="name" type="text" class="form-control" placeholder="نام"
                                                                                   value="{{old('name')}}" required autofocus
                                                                                   autocomplete="given-name">
                                                                            @error('name')
                                                                            <span class="text-danger text-sm">{{ $message }}</span>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-0">
                                                                        <div class="col pl-0">
                                                                            <label for="status" class="form-label">وضعیت محصول</label>
                                                                            <select name="is_active" class="form-control" id="wes-from1">
                                                                                <option value="1" {{ old('is_active', '1') == '1' ? 'selected' : '' }}>فعال</option>
                                                                                <option value="0" {{ old('is_active') == '0' ? 'selected' : '' }}>غیرفعال</option>
                                                                            </select>
                                                                            @error('is_active')
                                                                            <span class="text-danger text-sm">{{ $message }}</span>
                                                                            @enderror

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group mt-4">
                                                                    <div class="row">
                                                                        <div class="col-md-2 mb-0">
                                                                            <div class="col pl-3">
                                                                                <label for="stock" class="form-label">تعداد موجودی</label>
                                                                                <input id="stock" name="stock" type="number" class="form-control" placeholder="0" required value="{{old('stock')}}">
                                                                                @error('stock')
                                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 mb-0">
                                                                            <div class="col pl-0">
                                                                                <label for="category_id" class="form-label">دسته‌بندی</label>
                                                                                <select name="category_id" class="form-control" id="category_id" required>
                                                                                    <option value="">انتخاب دسته‌بندی</option>
                                                                                    @foreach (\App\Models\Category::all() as $category)
                                                                                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                                                                            {{ $category->name }}
                                                                                        </option>
                                                                                    @endforeach
                                                                                </select>
                                                                                @error('category_id')
                                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>

                                                                        </div>
                                                                        <div class="col-md-6 mb-0">
                                                                            <div class="col pl-0">
                                                                                <label for="currency" class="form-label">قیمت (ریال)</label>
                                                                                <div class="input-group">
                                                                                    <input style="border-radius: 6px" id="currency" type="text" class="form-control" placeholder="1,250,900"
                                                                                           value="{{ number_format(old('price'), 0, '.', ',') }}"
                                                                                           oninput="updatePrice(this)">
                                                                                    <input type="hidden" name="price" id="price-hidden">
                                                                                    <span style="border-radius: 6px; background-color: #1b2e4b; color: #009688; border-color: #1b2e4b"
                                                                                          class="input-group-text">ریال</span>
                                                                                </div>
                                                                                @error('price')
                                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-12 mb-0">
                                                                            <div class="col pl-3 mt-4">
                                                                                <label for="description" class="form-label">توضیحات</label>
                                                                                <textarea name="description" id="description" class="form-control" rows="4"
                                                                                          placeholder="توضیحات محصول">{{ old('description') }}</textarea>
                                                                                @error('description')
                                                                                <span class="text-danger text-sm">{{ $message }}</span>
                                                                                @enderror
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div id="fuMultipleFile" class="col-lg-12 layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="custom-file-container" data-upload-id="mySecondImage">
                                <label>تصاویر محصول <a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">x</a></label>
                                <label class="custom-file-container__custom-file">
                                    <input type="file" name="product_images[]" class="custom-file-container__custom-file__custom-file-input" multiple>
                                    @foreach ($errors->all() as $error)
                                        @if (str_contains($error, 'تصویر'))
                                            <span class="text-danger text-sm d-block">{{ $error }}</span>
                                        @endif
                                    @endforeach


                                    <span class="custom-file-container__custom-file__custom-file-control">انتخاب فایل...<span
                                            class="custom-file-container__custom-file__custom-file-control__button"> Browse </span></span>
                                </label>
                                <div class="custom-file-container__image-preview"></div>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mt-4">
                            <button type="submit" class="btn btn-primary">ثبت محصول</button>
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
                </div>
            </div>
        </form>
    </div>


    <script>
        function updatePrice(input) {
            let rawValue = input.value.replace(/[^0-9]/g, '');
            document.getElementById('price-hidden').value = rawValue || '';
            input.value = rawValue ? parseInt(rawValue).toLocaleString('en-US') : '';
        }
    </script>
    <script src="{{asset('AdminAssets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>
    <script>
        const secondUpload = new FileUploadWithPreview('mySecondImage');
    </script>
@endsection
