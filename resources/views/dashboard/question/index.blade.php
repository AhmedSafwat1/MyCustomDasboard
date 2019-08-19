@section('styles')

    <style>

        @media (max-width: 475.98px) {
            .boxes .col-sm-6 div#datatable_filter {
                float: none;
                text-align: center;
            }

            .boxes .col-sm-6 {
                float:  none;
                text-align: center;
                display:  inline-block;
                width:  10px;
            }
        }

        @media (min-width: 476px) and (max-width: 767.98px) {
            .boxes .col-sm-6 div#datatable_filter {
                float: right;
            }

            .boxes .col-sm-6 {
                float:  right;
                display:  inline-block;
                width:  50%;
            }
        }

    </style>
@endsection

@extends('dashboard.index')
@section('title')
    اسئلة متكررة
@endsection
@section('content')

    <div class="row">

        <div class=" btn-group-justified m-b-10">
            <a href="#add" class="btn btn-success waves-effect btn-lg waves-light" data-animation="fadein" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">اضافة سؤال <i class="fa fa-plus"></i> </a>
            <a href="#deleteAll" class="btn btn-danger waves-effect btn-lg waves-light delete-all" data-animation="blur" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">حذف المحدد <i class="fa fa-trash"></i> </a>
            <a class="btn btn-primary waves-effect btn-lg waves-light" onclick="window.location.reload()" role="button">تحديث الصفحة <i class="fa fa-refresh"></i> </a>
        </div>

        <div class="col-sm-12">
            <div class="card-box table-responsive boxes">

                <table id="datatable" class="table table-bordered table-responsives">
                    <thead>
                    <tr>
                        <th>
                            تحديد
                            <input type="checkbox" id="checkedAll" style="margin-right: 10px">
                        </th>
                        <th> السؤال</th>
                        <th>تاريخ التسجيل</th>
                        <th>التحكم</th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    @foreach($data as $item)
                        <tr>
                            <td>
                                <input type="checkbox" class="form-check-label checkSingle" id="{{$item->id}}">
                            </td>

                            <td>{{ $item->title_ar }}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#edit" class="edit btn btn-success" data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a" style="color: #c89e28; font-weight: bold;"
                                        data-id = "{{$item->id}}"
                                        data-title_ar = "{{$item->title_ar}}"
                                        data-title_en = "{{$item->title_en}}"
                                        data-desc_ar = "{{$item->desc_ar}}"
                                        data-desc_en = "{{$item->desc_en}}"
                                    >
                                        <i class="fa fa-cogs"></i>
                                    </a>
                                    <a href="#delete" class="delete btn btn-danger" style="color: #c83338; font-weight: bold;" data-animation="blur" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a"
                                        data-id = "{{$item->id}}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div><!-- end col -->

    </div>

    <!-- add item modal -->
    <div id="add" class="modal-demo" >
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title" style="background-color: #36404a">
            سؤال جديدة
        </h4>
        <form action="{{route('addquestion')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">السؤال بالعربية</label>
                            <input type="text" autocomplete="nope" id="" name="title_ar" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">السؤال بالانجليزية</label>
                            <input type="text" autocomplete="nope" id="" name="title_en" required class="form-control">
                        </div>
                    </div>  

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-sm-4 control-label">الاجابة بالعربية</label>
                                <textarea name="desc_ar" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-sm-4 control-label">الاجابة بالانجليزية</label>
                                <textarea name="desc_en" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect waves-light">اضافة</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="Custombox.close();">رجوع</button>
            </div>
        </form>
    </div>

    <!-- edit item modal -->
    <div id="edit" class="modal-demo">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title" style="background-color: #36404a">
            تعديل <span id="itemname"></span>
        </h4>
        <form action="{{route('updatequestion')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="">
            <div class="modal-body">
                <div class="row" style="margin-top: 15px;">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">السؤال بالعربية</label>
                            <input type="text" autocomplete="nope" id="title_ar" name="title_ar" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="field-1" class="col-sm-4 control-label">السؤال بالانجليزية</label>
                            <input type="text" autocomplete="nope" id="title_en" name="title_en" required class="form-control">
                        </div>
                    </div>  

                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-sm-4 control-label">الاجابة بالعربية</label>
                                <textarea name="desc_ar" id="desc_ar" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label class="col-sm-4 control-label">الاجابة بالانجليزية</label>
                                <textarea name="desc_en" id="desc_en" class="form-control" id="" cols="30" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success waves-effect waves-light">تعديل</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal" onclick="Custombox.close();">رجوع</button>
            </div>
        </form>
    </div>

   <div id="delete" class="modal-demo" style="position:relative; right: 32%">
        <button type="button" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title">حذف سؤال</h4>
        <div class="custombox-modal-container" style=" height: 160px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية الحذف ؟
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('deletequestion')}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="delete_id" value="">
                        <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all"  style="margin-top: 19px">حـذف</button>
                    </form>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>

    <div id="deleteAll" class="modal-demo" style="position:relative; right: 32%">
        <button type="button" id="close-deleteAll" class="close" onclick="Custombox.close();" style="opacity: 1">
            <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
        </button>
        <h4 class="custom-modal-title">حذف المحدد</h4>
        <div class="custombox-modal-container" style=" height: 160px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية الحذف ؟
                    </h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <button style="margin-top: 35px" type="submit" class="btn btn-danger btn-rounded w-md waves-effect waves-light m-b-5 send-delete-all" style="margin-top: 19px">حـذف</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div>

@endsection

@section('script')

    <script>
        {{--function changeChecked(id) {--}}
        {{--    var tokenv  = "{{csrf_token()}}";--}}
        {{--    $.ajax({--}}
        {{--        type     : 'POST',--}}
        {{--        url      : '{{ route('change-activation') }}' ,--}}
        {{--        datatype : 'json' ,--}}
        {{--        data     : {--}}
        {{--            'id'         :  id ,--}}
        {{--            '_token'     :  tokenv--}}
        {{--        }, success   : function(msg){--}}
        {{--            //success here--}}
        {{--            if(msg == 0)--}}
        {{--                return false;--}}
        {{--        }--}}
        {{--    });--}}
        {{--}--}}

        $('.edit').on('click',function(){
            //get valus
            let id            = $(this).data('id');
            let title_ar      = $(this).data('title_ar');
            let title_en      = $(this).data('title_en');
            let desc_ar       = $(this).data('desc_ar');
            let desc_en       = $(this).data('desc_en');

            $("input[name='id']").val(id);
            $("#title_ar").val(title_ar);
            $("#title_en").val(title_en);
            $("#desc_ar").html(desc_ar);
            $("#desc_en").html(desc_en);
        });

        $('.delete').on('click',function(){

            let id         = $(this).data('id');

            $("input[name='delete_id']").val(id);

        });

        $("#checkedAll").change(function(){
            if(this.checked){
                $(".checkSingle").each(function(){
                    this.checked=true;
                })
            }else{
                $(".checkSingle").each(function(){
                    this.checked=false;
                })
            }
        });

        $(".checkSingle").click(function () {
            if ($(this).is(":checked")){
                var isAllChecked = 0;
                $(".checkSingle").each(function(){
                    if(!this.checked)
                        isAllChecked = 1;
                })
                if(isAllChecked == 0){ $("#checkedAll").prop("checked", true); }
            }else {
                $("#checkedAll").prop("checked", false);
            }
        });

        $('.send-delete-all').on('click', function (e) {
            var itemsIds = [];
            $('.checkSingle:checked').each(function () {
                var id = $(this).attr('id');
                itemsIds.push({
                    id: id,
                });
            });
            var requestData = JSON.stringify(itemsIds);
            // console.log(requestData);
            if (itemsIds.length > 0) {
                e.preventDefault();
                $.ajax({
                    type: "POST",
                    url: "{{route('deletequestions')}}",
                    data: {data: requestData, _token: '{{csrf_token()}}'},
                    success: function( msg ) {
                        if (msg == 'success') {
                            location.reload();
                        }else{
                            $('#close-deleteAll').trigger('click');
                        }
                    }
                });
            }else{
                $('#close-deleteAll').trigger('click');
            }
        });
    </script>

@endsection