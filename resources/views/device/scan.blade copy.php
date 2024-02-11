@extends('crudbooster::admin_template')
@section('content')
  <!-- Your html goes here -->
  <section id="content_section" class="content">






    <!-- Your Page Content Here -->






<div class="box">
    <div class="box-header">
                    <div class="box-tools pull-left" style="position: relative;margin-top: -5px;margin-right: -10px">


            <form method="get" style="display:inline-block;width: 260px;" action="http://127.0.0.1/admin/module_generator">
                <div class="input-group">
                    <input type="text" name="q" value="" class="form-control input-sm pull-left" placeholder="بحث">

                    <div class="input-group-btn">
                                                    <button type="submit" class="btn btn-sm btn-default"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>


            <form method="get" id="form-limit-paging" style="display:inline-block" action="http://127.0.0.1/admin/module_generator">

                <div class="input-group">
                    <select onchange="$('#form-limit-paging').submit()" name="limit" style="width: 56px;" class="form-control input-sm">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option selected="" value="100">100</option>
                        <option value="200">200</option>
                    </select>
                </div>
            </form>

        </div>

        <br style="clear:both">

    </div>
    <div class="box-body table-responsive no-padding">
        <form id="form-table" method="post" action="http://127.0.0.1/admin/module_generator/action-selected">
<input type="hidden" name="button_name" value="">
<input type="hidden" name="_token" value="6g4OfrYnD3h16QSBymnp5aKTjSB5WHo9WvDwn92j">
<table id="table_dashboard" class="table table-hover table-striped table-bordered">
    <thead>
    <tr class="active">
                                <th width="auto"><a href="http://127.0.0.1/admin/module_generator?filter_column%5Bcms_moduls.name%5D%5Bsorting%5D=asc" title="Click to sort ascending">Name &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/module_generator?filter_column%5Bcms_moduls.table_name%5D%5Bsorting%5D=asc" title="Click to sort ascending">Table &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/module_generator?filter_column%5Bcms_moduls.path%5D%5Bsorting%5D=asc" title="Click to sort ascending">Path &nbsp; <i class="fa fa-sort"></i></a></th><th width="auto"><a href="http://127.0.0.1/admin/module_generator?filter_column%5Bcms_moduls.controller%5D%5Bsorting%5D=asc" title="Click to sort ascending">Controller &nbsp; <i class="fa fa-sort"></i></a></th>
                                            <th width="auto" style="text-align:right">الاجراء</th>
                                </tr>
    </thead>
    <tbody>


                        <tr>

                                        <td>Contact</td>
                                        <td>contact</td>
                                        <td>contact</td>
                                        <td>AdminContactController</td>
                                        <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-primary" title="Module Wizard" onclick="" href="http://127.0.0.1/admin/module_generator/step1/13" target="_self"><i class="fa fa-wrench"></i> Module Wizard</a>&nbsp;


        <a class="btn btn-xs btn-success btn-edit" title="تعديل" href="http://127.0.0.1/admin/module_generator/edit/13?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fmodule_generator&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                <a class="btn btn-xs btn-warning btn-delete" title="حذف" href="javascript:;" onclick="swal({
            title: &quot;هل آنت متأكد ؟&quot;,
            text: &quot;لا يمكنك التراجع عن عملية الحذف !&quot;,
            type: &quot;warning&quot;,
            showCancelButton: true,
            confirmButtonColor: &quot;#ff0000&quot;,
            confirmButtonText: &quot;نعم!&quot;,
            cancelButtonText: &quot;لا&quot;,
            closeOnConfirm: false },
            function(){  location.href=&quot;http://127.0.0.1/admin/module_generator/delete/13&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                </tr>

                        <tr>

                                        <td>Device</td>
                                        <td>device</td>
                                        <td>device</td>
                                        <td>AdminDeviceController</td>
                                        <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-primary" title="Module Wizard" onclick="" href="http://127.0.0.1/admin/module_generator/step1/12" target="_self"><i class="fa fa-wrench"></i> Module Wizard</a>&nbsp;


        <a class="btn btn-xs btn-success btn-edit" title="تعديل" href="http://127.0.0.1/admin/module_generator/edit/12?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fmodule_generator&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                <a class="btn btn-xs btn-warning btn-delete" title="حذف" href="javascript:;" onclick="swal({
            title: &quot;هل آنت متأكد ؟&quot;,
            text: &quot;لا يمكنك التراجع عن عملية الحذف !&quot;,
            type: &quot;warning&quot;,
            showCancelButton: true,
            confirmButtonColor: &quot;#ff0000&quot;,
            confirmButtonText: &quot;نعم!&quot;,
            cancelButtonText: &quot;لا&quot;,
            closeOnConfirm: false },
            function(){  location.href=&quot;http://127.0.0.1/admin/module_generator/delete/12&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                </tr>

                        <tr>

                                        <td>Outbox</td>
                                        <td>outbox</td>
                                        <td>outbox</td>
                                        <td>AdminOutboxController</td>
                                        <td><div class="button_action" style="text-align:right"><a class="btn btn-xs btn-primary" title="Module Wizard" onclick="" href="http://127.0.0.1/admin/module_generator/step1/14" target="_self"><i class="fa fa-wrench"></i> Module Wizard</a>&nbsp;


        <a class="btn btn-xs btn-success btn-edit" title="تعديل" href="http://127.0.0.1/admin/module_generator/edit/14?return_url=http%3A%2F%2F127.0.0.1%2Fadmin%2Fmodule_generator&amp;parent_id=&amp;parent_field="><i class="fa fa-pencil"></i></a>

                <a class="btn btn-xs btn-warning btn-delete" title="حذف" href="javascript:;" onclick="swal({
            title: &quot;هل آنت متأكد ؟&quot;,
            text: &quot;لا يمكنك التراجع عن عملية الحذف !&quot;,
            type: &quot;warning&quot;,
            showCancelButton: true,
            confirmButtonColor: &quot;#ff0000&quot;,
            confirmButtonText: &quot;نعم!&quot;,
            cancelButtonText: &quot;لا&quot;,
            closeOnConfirm: false },
            function(){  location.href=&quot;http://127.0.0.1/admin/module_generator/delete/14&quot; });"><i class="fa fa-trash"></i></a>

</div></td>
                                </tr>
                    </tbody>


    <tfoot>
    <tr>


        <th width="auto">Name</th><th width="auto">Table</th><th width="auto">Path</th><th width="auto">Controller</th>
                                            <th> -</th>
                                </tr>
    </tfoot>
</table>

</form><!--END FORM TABLE-->

<div class="col-md-8"></div>
<div class="col-md-4"><span class="pull-right">crudbooster::crudbooster.filter_rows_total
    : 1 crudbooster::crudbooster.filter_rows_to 3 crudbooster::crudbooster.filter_rows_of 3</span></div>

        </div>
</div>


    </section>
@endsection
