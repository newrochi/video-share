{{-- @extends('layout')

@section('content')
<div id="upload">
    <div class="row">
        <!-- upload -->
        <div class="col-md-8">
            <h1 class="page-title"><span>آپلود</span> فیلم</h1>
            <form action="/videos" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        <label>عنوان</label>
                        <input type="text" name="name" class="form-control" placeholder="عنوان">
                    </div>
                    <div class="col-md-6">
                        <label>دسته بندی</label>
                        <input type="text" class="form-control" placeholder="دسته بندی">
                    </div>
                    <div class="col-md-6">
                        <label>برچسب ها</label>
                        <input type="text" class="form-control" placeholder="برچسب ها">
                    </div>
                    <div class="col-md-6">
                        <label>آپلود فیلم</label>
                        <input id="upload_file" type="file" class="file">
                    </div>
                    <div class="col-md-12">
                        <label>توضیحات</label>
                        <textarea class="form-control" rows="4"  placeholder="توضیح"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label>تصویر</label>
                        <input id="featured_image" type="file" class="file">
                    </div>
                    <div class="col-md-6">
                        <button type="button" id="contact_submit" class="btn btn-dm">ذخیره</button>
                    </div>
                </div>
            </form>
        </div><!-- // col-md-8 -->

        <div class="col-md-4">
            <a href="#"><img src="{{asset('img/upload-adv.png')}}" alt=""></a>
        </div><!-- // col-md-8 -->
        <!-- // upload -->
    </div><!-- // row -->
</div><!-- // upload -->
@endsection


 --}}

 @extends('layout')
@section('content')
    <div id="upload">
        <div class="row">
            <!-- upload -->
            <div class="col-md-8">
                <h1 class="page-title"><span>آپلود</span> ویدیو</h1>
                <form action="{{route('videos.store')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <label>عنوان</label>
                            <input name="name" type="text" class="form-control" placeholder="عنوان">
                        </div>
                        <div class="col-md-6">
                            <label>مدت زمان</label>
                            <input type="text" name="length" class="form-control" placeholder="مدت زمان">
                        </div>
                        <div class="col-md-6">
                            <label>نام یکتا</label>
                            <input type="text" name="slug" class="form-control" placeholder="نام یکتا">
                        </div>
                        <div class="col-md-6">
                            <label>آدرس ویدیو</label>
                            <input type="text" name="url" class="form-control" placeholder="آدرس ویدیو">
                        </div>
                        <div class="col-md-6">
                            <label>تصویر بند‌انگشتی</label>
                            <input type="text" name="thumbnail" class="form-control" placeholder="تصویر بند انگشتی">
                        </div>
                        <div class="col-md-12">
                            <label>توضیحات</label>
                            <textarea class="form-control" name="description" rows="4" placeholder="توضیح"></textarea>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" id="contact_submit" class="btn btn-dm">ذخیره</button>
                        </div>
                    </div>
                </form>
            </div><!-- // col-md-8 -->

            <div class="col-md-4">
                <a href="#"><img src="{{ asset('img/upload-adv.png') }}" alt=""></a>
            </div><!-- // col-md-8 -->
            <!-- // upload -->
        </div><!-- // row -->
    </div>
@endsection

