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
    الأحياء
@endsection
@section('content')

    <div class="row">

        <div class=" btn-group-justified m-b-10">
            <a href="#add" class="btn btn-success waves-effect btn-lg waves-light" data-animation="fadein" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">اضافة حي <i class="fa fa-plus"></i> </a>
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
                        <th>أسم الحي</th>
                        <th>أسم المدينة</th>
                        <th>أسم البلد</th>
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
                            
                            <td>{{$item->title}}</td>
                            <td>{{$item->City->title}}</td>
                            <td>{{$item->Country->title}}</td>
                            <td>{{$item->created_at->diffForHumans()}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#edit" class="edit btn btn-success" data-animation="fadein" data-plugin="custommodal"
                                        data-overlaySpeed="100" data-overlayColor="#36404a" style="color: #c89e28; font-weight: bold;"
                                        data-id = "{{$item->id}}"
                                        data-title = "{{$item->title}}"
                                        data-city_id = "{{$item->city_id}}"
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
            دولة جديدة
        </h4>
        <form action="{{route('addneighborhood')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">اسم الحي</label>
                            <input type="text" autocomplete="nope" name="title" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">اسم المدينة</label>
                            <select name="city_id" class="form-control">
                                <option value="">أختار المدينة التابعة لها</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->title}} - {{$city->Country->title}}</option>
                                @endforeach
                            </select>
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
        <form action="{{route('updateneighborhood')}}" method="post" autocomplete="off" enctype="multipart/form-data">
            {{csrf_field()}}
            <input type="hidden" name="id" value="">
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">اسم الحي</label>
                            <input type="text" autocomplete="nope" name="title" required class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="field-1" class="control-label">اسم المدينة</label>
                            <select name="city_id" class="form-control" id="city_id">
                                <option value="">أختار المدينة التابعة لها</option>
                                @foreach ($cities as $city)
                                    <option value="{{$city->id}}">{{$city->title}} - {{$city->Country->title}}</option>
                                @endforeach
                            </select>
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
        <h4 class="custom-modal-title">حذف دولة</h4>
        <div class="custombox-modal-container" style="width: 400px !important; height: 175px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية الحذف ؟
                    </h3>
                    <span style="color: red">عند حذف حي يتم حذف العقارات التابعة لها !!</span>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{route('deleteneighborhood')}}" method="post">
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
        <div class="custombox-modal-container" style="width: 400px !important; height: 175px;">
            <div class="row">
                <div class="col-sm-12">
                    <h3 style="margin-top: 35px">
                        هل تريد مواصلة عملية الحذف ؟
                    </h3>
                    <span style="color: red">عند حذف حي يتم حذف العقارات التابعة لها !!</span>
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
        $('.edit').on('click',function(){
            //get valus
            let id          = $(this).data('id');
            let title       = $(this).data('title');
            let city_id  = $(this).data('city_id');

            $("input[name='id']").val(id);
            $("#title").val(title);
            $("#city_id").val(city_id);
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
                    url: "{{route('deleteneighborhoods')}}",
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