@section('style')
    <style>
        div.cke_contents {
            height: 300px;
        }
    </style>
@endsection
@extends('dashboard.index')

@section('title')
    الإعدادات
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box card-tabs">
                <ul class="nav nav-pills pull-right">
                    <li class="active">
                        <a href="#site" data-toggle="tab" aria-expanded="true">إعدادات الموقع</a>
                    </li>
                    <li class="">
                        <a href="#social" data-toggle="tab" aria-expanded="true">مواقع التواصل</a>
                    </li>
                    <li class="">
                        <a href="#about-us" data-toggle="tab" aria-expanded="true">من نحن</a>
                    </li>
                    <li class="">
                        <a href="#SEO" data-toggle="tab" aria-expanded="true">CEO</a>
                    </li>
                </ul>
                <h4 class="header-title m-b-30">الاعدادات</h4>

                <div class="tab-content">
                    <div id="site" class="tab-pane fade in active">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">اعدادت عامة</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('sitesetting')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">اسم الموقع</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" value="{{settings('site_name')}}" name="site_name" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">العنوان</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" value="{{settings('address')}}" name="address" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">البريد الألكتروني</label>
                                                <div class="col-md-10">
                                                    <input type="email" id="example-email" value="{{settings('email')}}" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">الهاتف</label>
                                                <div class="col-md-10">
                                                    <input type="text" id="example-email" value="{{settings('phone')}}" name="phone" class="phone form-control">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">لوجو الموقع</label>
                                                <div class="col-md-10">
                                                    <input type="file" name="site_logo" data-default-file="{{appPath()}}/public/images/site/logo.png" class="dropify photo" data-max-file-size="1M" />
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="social" class="tab-pane fade">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="panel panel-custom panel-border">
                                            <div class="panel-heading">
                                                <h3 style="display: inline-block;" class="panel-title">مواقع التواصل</h3>
                                                <button type="button" class="btn btn-custom btn-rounded waves-effect waves-light w-md m-b-5 pull-right" id="openSocialForm">اضافة</button>
                                                <div class="panel-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <table class="table table-striped m-0">
                                                                <thead>
                                                                <tr>
                                                                    <th>الشعار</th>
                                                                    <th>اسم الموقع</th>
                                                                    <th>الرابط</th>
                                                                    <th>التحكم</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                <tr id="addSocial" class="hidden">
                                                                    <form action="{{route('add-social')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="icon" placeholder="ex" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="site_name" placeholder="ex" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" minlength="2" type="text" name="url" placeholder="http://www.ex.com" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <button type="submit" style="color: #3fb614;background-color: transparent;border: none;"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancel" style="color: #b62626;background-color: transparent;border: none;"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                <tr id="editSocial" class="hidden">
                                                                    <form action="{{route('update-social')}}" method="post">
                                                                        {{csrf_field()}}
                                                                        <input type="hidden" name="id" value="">
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_icon" placeholder="ex" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_name" placeholder="ex" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <input required maxlength="190" value="" minlength="2" type="text" name="edit_url" placeholder="http://www.ex.com" class="form-control" style="width: 189px;">
                                                                        </td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <button type="submit" style="color: #3fb614;background-color: transparent;border: none;"><i class="fa fa-save"></i></button>
                                                                                <button type="button" id="cancelEdit" style="color: #b62626;background-color: transparent;border: none;"><i class="fa fa-close"></i></button>
                                                                            </div>
                                                                        </td>
                                                                    </form>
                                                                </tr>
                                                                @foreach($socials as $social)
                                                                    <tr>
                                                                        <th scope="row"><a href="{{$social->url}}" class="btn btn-{{$social->icon}} btn-rounded btn-small"><i class="fa fa-{{$social->icon}}"></i></a></th>
                                                                        <td>{{$social->site_name}}</td>
                                                                        <td>{{$social->url}}</td>
                                                                        <td>
                                                                            <div class="row">
                                                                                <button type="button" class="editSocialForm" style="color: #3fb614;background-color: transparent;border: none;"
                                                                                        data-id     = "{{$social->id}}"
                                                                                        data-name   = "{{$social->site_name}}"
                                                                                        data-ics   = "{{$social->icon}}"
                                                                                        data-url    = "{{$social->url}}"
                                                                                ><i class="fa fa-edit"></i></button>
                                                                                <a href="{{route('delete-social', $social->id )}}" style="color: #b62626;background-color: transparent;border: none;"><i class="fa fa-trash"></i></a>
                                                                            </div>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="about-us" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">صفحة من نحن</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('about_us')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                {{-- <label class="col-md-2 control-label" for="example-email">صفحة من نحن</label> --}}
                                                <div class="col-md-12">
                                                    <textarea name="about_us" class="form-control" id="about_us" cols="30" rows="10">{{settings( 'about_us')}}</textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="SEO" class="tab-pane fade in">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-custom panel-border">
                                    <div class="panel-heading">
                                        <h3 class="panel-title">SEO</h3>
                                    </div>
                                    <div class="panel-body">
                                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="post" action="{{route('SEO')}}">
                                            {{csrf_field()}}
                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">تفاصيل الموقع</label>
                                                <div class="col-md-10">
                                                    <textarea name="description" class="form-control" id="description" cols="30" rows="10">{{settings( 'description')}}</textarea>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="col-md-2 control-label" for="example-email">الكلمات المفتاحية</label>
                                                <div class="col-md-10">
                                                    <textarea name="key_words" class="form-control" id="key_words" cols="30" rows="10">{{settings( 'key_words')}}</textarea>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-success btn-rounded w-md waves-effect waves-light m-b-5">حفظ</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
    <!-- end row -->

@endsection

@section('script')
    <script>
        $( function () {
            CKEDITOR.replace('about_us');
        });
        $( function () {
            CKEDITOR.replace('description');
        });
        $( function () {
            CKEDITOR.replace('key_words');
        });
    </script>
@endsection