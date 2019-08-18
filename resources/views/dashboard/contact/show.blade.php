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
    أتصل بنا
@endsection
@section('content')

    <div class="row">

        <div class=" btn-group-justified m-b-10">
            <a style="margin-left: 5px;" href="#contact" class="contact btn btn-success  waves-effect btn-lg waves-light" style="color: #79c842; font-weight: bold;" data-animation="sign" data-plugin="custommodal"
                data-overlaySpeed="100" data-overlayColor="#36404a">الرد على الرسالة <i class="fa fa-send"></i> </a>
            <a class="btn btn-primary waves-effect btn-lg waves-light" onclick="window.location.reload()" role="button">تحديث الصفحة <i class="fa fa-refresh"></i> </a>
        </div>

        <div class="col-sm-12">
            <div class="card-box table-responsive boxes">
                <div class="titleContactDiv">الأسم :</div>
                <div class="bodyContactDiv">{{$data->name}}</div>

                <div class="titleContactDiv">الأيميل :</div>
                <div class="bodyContactDiv">{{$data->email}}</div>

                <div class="titleContactDiv">العنوان :</div>
                <div class="bodyContactDiv">{{$data->title}}</div>

                <div class="titleContactDiv">الرسالة :</div>
                <div class="bodyContactDiv">
                    <div class="text-center">{{$data->message}}</div>
                    @if (!is_null($data->file))
                    <div class="bodyFileDiv">
                        <a style="width: 15%;" href="{{url(''.$data->file)}}" target="_blank" class="btn btn-danger"><i class="fa fa-file"></i> عرض الملف المرفق</a>
                    </div>
                @endif
                </div>

                
                
            </div>
        </div><!-- end col -->

        <!-- contact user modal -->
        <div id="contact" class="modal-demo">
            <button type="button" id="closeContactModal" class="close" onclick="Custombox.close();" style="opacity: 1">
                <span>&times</span><span class="sr-only" style="color: #f7f7f7">Close</span>
            </button>
            <h4 class="custom-modal-title" style="background-color: #36404a">الرد على رسالة</h4>
            <div class="modal-content p-0">
                <ul class="nav nav-tabs navtab-bg nav-justified">
                    <li class="active">
                        <a href="#email" data-toggle="tab" aria-expanded="false">
                            <span class="visible-xs"><i class="fa fa-home"></i></span>
                            <span class="hidden-xs">من خلال الأيميل</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="email">
                        <div>
                            <form id="sendMsgForm">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$data->id}}">
                                <textarea class="form-control" id="messageTextArea" name="message" rows="15" placeholder="نص الرسالة" required></textarea>
                                <button onclick="sendMsg()" type="button" class="btn btn-success btn-block btn-rounded w-md waves-effect waves-light m-b-5" style="margin-top: 19px">ارسال</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>

@endsection

@section('script')

    <script>

        function sendMsg() {
            //if message input null
            if($('#messageTextArea').val() == ''){
                $('#messageTextArea').attr('style','border-color:red');
                return false;
            }
            //ajax
            $.ajax({
                type     : 'POST',
                url      : '{{ route('sendcontact') }}' ,
                datatype : 'json' ,
                async:       false,
                processData: false,
                contentType: false,
                data     : new FormData($("#sendMsgForm")[0]),
                success   : function(msg){
                    //if message send without error
                    if(msg != 'err')
                        $('#closeContactModal').trigger('click');
                }
            });
        }
        
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
                    url: "{{route('deletecontacts')}}",
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