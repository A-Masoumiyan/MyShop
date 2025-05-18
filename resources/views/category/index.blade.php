@extends('Admin.layouts.Master')
@section('content')
    @if (session('success'))
        <script>
            Toastify({
                text: {!! json_encode(session('success')) !!},
                gravity: 'bottom',
                position: "left",
                duration: 6000,
                className: "custom-toast",
                style :{
                    background:'rgba(1,140,127,0.87)'
                }
            }).showToast();
        </script>
    @endif
    <div class="row layout-spacing">

        @foreach($categories as $category)
        <div class="col-xl-3 col-lg-6 col-md-5 col-sm-12 layout-top-spacing">

            <div class="education layout-spacing ">
                <div class="widget-content widget-content-area">
                    <div class="d-flex justify-content-between">
                        <h3 class="pb-1 pl-2">{{$category->name}}</h3>
                        <a href="{{route('category.edit',$category->id)}}" class="mt-2 edit-profile"> <svg style="background-color: #009688; border-radius: 50%; height: 32px; width: 32px; padding: 5px" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg></a>
                    </div>

                    <div class="timeline-alter">

                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">وضعیت دسته بندی</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>
                                    @switch($category->is_active)
                                        @case('1')
                                        فعال
                                        @break
                                        @case('0')
                                        غیر فعال
                                        @break
                                    @endswitch
                                </p>
                            </div>
                        </div>
                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">زیر گروه ها</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>خالی</p>

                            </div>
                        </div>
                        <div class="item-timeline">
                            <div class="t-meta-date">
                                <p class="">دسته بندی</p>
                            </div>
                            <div class="t-dot" data-original-title="" title="">
                            </div>
                            <div class="t-text">
                                <p>گروه اصلی</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
        @endforeach
    </div>

@endsection
