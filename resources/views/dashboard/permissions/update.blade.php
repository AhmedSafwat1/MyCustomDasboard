@section('styles')

@endsection

@extends('dashboard.index')
@section('title')
    الصلاحيات
@endsection
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card-box">
                <div class="pull-right">
                    <label class="custom-control material-checkbox">
                        <span class="material-control-description">تحديد الكل</span>
                        <input type="checkbox" class="material-control-input" id="checkedAll">
                        <span class="material-control-indicator"></span>
                    </label>
                    {{--<label for="checkAll" id="check">الفاء تحديد الكل</label>--}}
                    {{--<input type="checkbox" id="checkAll" checked class="pull-right" data-plugin="switchery" data-color="rgb(12, 105, 140)" data-size="small"/>--}}
                </div>

                <h4 class="header-title m-t-0 m-b-30 text-purple">قائمة الصلاحيات</h4>
                <hr>
                <div class="card-footer">
                    <form action="{{route('updatepermission')}}" method="post" class="form-horizontal">
                        {{csrf_field()}}
                        <input type="hidden" name="id" value="{{$role->id}}">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label class="col-md-2" for="example-email">الصلاحية</label>
                                    <div class="col-md-10">
                                        <input type="text" id="role" class="form-control" value="{{$role->role}}" required name="role">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        {{EditPermissions($role->id)}}
                        <button type="submit" id="send" class="btn btn-block btn-success btn-rounded waves-effect waves-light w-md m-b-5"><span style="font-weight: bolder;font-size: 15px">تعديل</span></button>
                    </form>
                </div>

            </div>
        </div><!-- end col -->
    </div>

@endsection
@section('script')
    <script>

        $('.per_parent').change(function () {
            var id = $(this).attr('id');
            if(this.checked){
                $(".per_" + id).each(function(){
                    this.checked=true
                })
                $(".label_" + id).each(function(){
                    this.style='';
                })
            }else{
                $(".per_" + id).each(function(){
                    this.checked=false;
                })
                $(".label_" + id).each(function(){
                    this.style='display:none';
                })
            }
        });

        $('#send').on('click', function (event) {
            var permissions = [];
            $('.checkSingle:checked').each(function (index, el) {
                permissions.push($(el).val());
            });
            var role = $('#role').val();
            if (role === '') {
                ajaxSuccess();
                Swal.fire({
                    html: '<h4>اسم الصلاحية مطلوب</h4>',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
                event.preventDefault();
                return false;
            }

            if (permissions.length === 0) {
                ajaxSuccess();
                Swal.fire({
                    html: '<h4>قم بإختيار صلاحية واحدة على الأقل</h4>',
                    type: 'error',
                    showConfirmButton: false,
                    timer: 2000
                });
                event.preventDefault();
                return false;
            }
        });

        $(document).ready(function () {
            var check = true;
            $(".checkSingle").each(function(){
                if (this.checked == false) {
                    check = false;
                }
            });
            if (check) {
                $("#checkedAll").attr('checked', true);
            }
        });

        $("#checkedAll").change(function(){
            if(this.checked){
                $(".checkSingle").each(function(){
                    this.checked=true
                })
                $(".allLabel").each(function(){
                    this.style='';
                })
            }else{
                $(".checkSingle").each(function(){
                    this.checked=false;
                })
                $(".allLabel").each(function(){
                    this.style='display:none';
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
    </script>
@endsection

