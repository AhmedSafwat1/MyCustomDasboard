<!DOCTYPE html>
<html lang="en" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
    <meta name="author" content="Coderthemes">

    <!-- App Favicon -->
    <link rel="shortcut icon" href="{{asset('public/')}}}images/site/logo.png">

    <!-- App title -->
    <title>تسجبل الدخول</title>

    <!-- App CSS -->
    <link href="{{asset('design')}}/admin/assets/css/bootstrap-rtl.min.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/css/core.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/css/components.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/css/menu.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />
    <link href="{{asset('design')}}/admin/assets/plugins/switchery/switchery.min.css" rel="stylesheet" />

    <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <script src="{{asset('design')}}/admin/assets/js/modernizr.min.js"></script>

</head>
<body>

<div class="account-pages"></div>
<div class="clearfix"></div>
<div class="wrapper-page">
    <div class="text-center">
        <a href="#" class="logo"><span>بيتي - <span>Baayte</span></span></a>
        <h5 class="text-muted m-t-0 font-600">لوحة التحكم </h5>
    </div>
    <div class="m-t-40 card-box">
        <div class="text-center">
            <h4 class="text-uppercase font-bold m-b-0">تسجيل الدخول</h4>
        </div>
        <div class="panel-body">
            <form class="form-horizontal m-t-20" method="post" action="{{route('login')}}">

                {{csrf_field()}}

                <div class="form-group ">
                    <div class="col-xs-12">
                        <input class="form-control" name="email" value="{{old('email')}}" type="text" required="required" placeholder="البريد الإلكتروني">
                    </div>
                    @if(session()->has('error_email'))
                        <div class="invalid-feedback text-center" style="color: red">
                            {{session()->get('error_email')}}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <input class="form-control" name="password" type="password" required="required" placeholder="كلمة السر">
                    </div>
                    @if(session()->has('error_password'))
                        <div class="invalid-feedback text-center" style="color: red">
                            {{session()->get('error_password')}}
                        </div>
                    @endif
                </div>

                <div class="form-group ">
                    <div class="col-xs-12">
                        <div class="checkbox checkbox-custom">
                            <input type="checkbox" name="rememberme" value="1" data-plugin="switchery" data-color="#3bafda" data-switchery="true" style="display: none;">
                             &nbsp; &nbsp;تذكرني
                        </div>

                    </div>
                </div>

                <div class="form-group text-center m-t-30">
                    <div class="col-xs-12">
                        <button class="btn btn-custom btn-bordred btn-block waves-effect waves-light" type="submit">تسجيل الدخول</button>
                    </div>
                </div>

                {{--<div class="form-group m-t-30 m-b-0">--}}
                    {{--<div class="col-sm-12">--}}
                        {{--<a href="page-recoverpw.html" class="text-muted"><i class="fa fa-lock m-r-5"></i> نسيت كلمة المرور ؟</a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            </form>

        </div>
    </div>
    <!-- end card-box-->

</div>
<!-- end wrapper page -->



<script>
    var resizefunc = [];
</script>

<!-- jQuery  -->
<script src="{{asset('design')}}/admin/assets/plugins/switchery/switchery.min.js"></script>

<script src="{{asset('design')}}/admin/assets/js/jquery.min.js"></script>
<script src="{{asset('design')}}/admin/assets/js/bootstrap-rtl.min.js"></script>
<script src="{{asset('design')}}/admin/assets/js/detect.js"></script>
<script src="{{asset('design')}}/admin/assets/js/fastclick.js"></script>
<script src="{{asset('design')}}/admin/assets/js/jquery.slimscroll.js"></script>
<script src="{{asset('design')}}/admin/assets/js/jquery.blockUI.js"></script>
<script src="{{asset('design')}}/admin/assets/js/waves.js"></script>
<script src="{{asset('design')}}/admin/assets/js/wow.min.js"></script>
<script src="{{asset('design')}}/admin/assets/js/jquery.nicescroll.js"></script>
<script src="{{asset('design')}}/admin/assets/js/jquery.scrollTo.min.js"></script>

<!-- App js -->
<script src="{{asset('design')}}/admin/assets/js/jquery.core.js"></script>
<script src="{{asset('design')}}/admin/assets/js/jquery.app.js"></script>

</body>
</html>