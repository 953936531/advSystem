@extends('layouts.header_common')
@section('css')
@stop
@section('content')
  <div id="setting">
    <div class="content-header">
      <div class="header-section">
        <h1>
          <i class="gi gi-show_big_thumbnails"></i>设置<br><small>在此处设置您的个人信息</small>
        </h1>
      </div>
    </div>
    <ul class="breadcrumb breadcrumb-top">
      <li>设置</li>
    </ul>


    <div class="block">
      <!-- Color Pickers Title -->
      <div class="block-title">
        <div class="block-options pull-right">
          <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="" data-original-title="Settings"><i class="gi gi-cogwheel"></i></a>
        </div>
        <h2><strong>个人信息</strong></h2>
      </div>
      <!-- END Color Pickers Title -->

      <!-- Color Pickers Content -->
      <form action="page_forms_components.html" method="post" class="form-horizontal form-bordered" onsubmit="return false;">

        <div class="form-group">
          <label class="col-md-4 control-label" for="example-typeahead">风格</label>
          <div class="col-md-6">
            <select  style="width:100%; height:35px; border: 1px solid #E8E8E8;border-radius:5px;" name="" id="">
              <option value="" style="display: none;" disabled selected>请选择</option>
              <option value="">66666</option>
              <option value="">55555</option>
              <option value="">66666</option>
            </select>
          </div>
        </div>


        <div class="form-group">
          <label class="col-md-4 control-label" for="example-datepicker">Datepicker</label>
          <div class="col-md-6">
            <input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="mm/dd/yy" placeholder="mm/dd/yy">
          </div>
        </div>

        <div class="form-group form-actions">
          <div class="col-md-8 col-md-offset-4">
            <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
            <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
          </div>
        </div>
      </form>
      <!-- END Color Pickers Content -->
    </div>
  </div>
@stop

