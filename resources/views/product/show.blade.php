@extends('Admin.layouts.Master')
@section('content')
    {{$product->name}}

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

        <div class="statbox widget box box-shadow">
            <div class="account-settings-container layout-top-spacing">
                <div class="account-content">
                    <div class="scrollspy-example" data-spy="scroll" data-target="#account-settings-scroll" data-offset="-100">
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                <div id="general-info" class="section general-info">
                                    <div class="info">
                                        <h5 style="color: #009688" class="mb-5">اطلاعات محصول</h5>

                                        <div class="row">
                                            <div class="col-lg-11 mx-auto">
                                                <div class="row mb-4">
                                                    <div class="col-xl-2 col-lg-12 col-md-4">
                                                        <div class="upload mt-4 pr-md-4">
                                                            <img style="border-radius: 7%; width: 80%" src="{{asset('storage/' . $product->image)}}" alt="{{$product->name}}">
                                                            <p class="mt-2"><i class="flaticon-cloud-upload mr-1 ml-4"></i> پروفایل محصول</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-10 col-lg-12 col-md-8 mt-md-0 mt-4">
                                                        <div class="form">
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                    <div class="col">
                                                                        <label for="name" class="form-label">نام محصول</label>
                                                                        <input id="name" name="name" type="text" class="form-control" placeholder="نام"
                                                                               value="{{$product->name}}"
                                                                               autocomplete="given-name" disabled style="cursor: default; color: #009688">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 mb-0">
                                                                    <div class="col pl-0">
                                                                        <label for="status" class="form-label">وضعیت محصول</label>
                                                                        <select name="is_active" class="form-control" id="wes-from1" disabled style="cursor: default; color: #009688">
                                                                            <option {{ $product->is_active==1 ? 'selected=""' : '' }} value="1">فعال</option>
                                                                            <option {{ $product->is_active==0 ? 'selected=""' : '' }} value="0">غیر فعال</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group mt-4">
                                                                <div class="row">
                                                                    <div class="col-md-2 mb-0">
                                                                        <div class="col pl-3">
                                                                            <label for="stock" class="form-label">موجودی</label>
                                                                            <input id="stock" name="stock" type="number" class="form-control" value="{{$product->stock}}" disabled
                                                                                   style="cursor: default; color: #009688">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4 mb-0">
                                                                        <div class="col pl-0">
                                                                            <label for="category_id" class="form-label">دسته‌بندی</label>
                                                                            <select name="category_id" class="form-control" id="category_id" required disabled style="cursor: default; color: #009688">
                                                                                <option>{{ $product->category->name }}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6 mb-0">
                                                                        <div class="col pl-0">
                                                                            <label for="currency" class="form-label">قیمت (ریال)</label>
                                                                            <div class="input-group">
                                                                                <input style="border-radius: 6px;cursor: default; color: #009688" id="currency" type="text" class="form-control"
                                                                                       value=" {{ number_format($product->price, 0, ',', ',') }} " disabled>
                                                                                <span style="border-radius: 6px; background-color: #1b2e4b; color: #009688; border-color: #1b2e4b"
                                                                                      class="input-group-text">ریال</span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12 mb-0">
                                                                        <div class="col pl-3 mt-4">
                                                                            <label for="description" class="form-label">توضیحات</label>
                                                                            <textarea name="description" id="description" class="form-control text-left" rows="4"  disabled style="cursor: default; color: #009688; text-align: right">{{$product->description}}
                                                                            </textarea>

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

                <div class="statbox widget box box-shadow mt-4">
                    <div >
                        <h5 style="color: #009688" class="mb-5">گالری محصول</h5>
                        <div class="custom-file-container" data-upload-id="mySecondImage">
                            <div class="custom-file-container__image-preview">
                                @foreach($product->images as $image)
                                    <div class="custom-file-container__image-multi-preview" style="background-image: url({{asset('storage/' . $image->image_path)}}); ">
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex items-center mt-4  row">
                <button type="submit" class="btn btn-primary ml-3">
                    <a href="{{ route('product.edit', $product->id) }}">ویرایش محصول</a>

                </button>
                <div class="ml-auto">
                    <button onclick="history.back()" class="btn btn-primary mr-3">
                        بازگشت
                    </button>
                </div>
            </div>

        </div>

    </div>
    @if (session('status') === 'product-updated')
        <script>
            Toastify({
                text: "محصول با موفقیت ویرایش شد",
                position: "left",
                duration: 6000,
                className: "custom-toast",
            }).showToast();
        </script>
    @endif
    <script src="{{asset('AdminAssets/plugins/file-upload/file-upload-with-preview.min.js')}}"></script>

@endsection

