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
                    <label class="col-md-4 control-label" for="example-select">风格</label>
                    <div class="col-md-6">
                        <select id="example-select" name="example-select" class="form-control" size="1">
                            <option value="night">夜间</option>
                            <option value="amethyst">紫晶</option>
                            <option value="modern">现代</option>
                            <option value="autumn">秋季</option>
                            <option value="flatie">Flatie</option>
                            <option value="spring">深绿</option>
                            <option value="fancy">幻想</option>
                            <option value="fire">火</option>
                            <option value="coral">珊瑚</option>
                            <option value="lake">湖</option>
                            <option value="forest">森林</option>
                            <option value="waterlily">荷花</option>
                            <option value="emerald">翠</option>
                            <option value="blackberry">黑莓</option>
                        </select>
                    </div>
                </div>

{{--                <div class="form-group">--}}
{{--                    <label class="col-md-4 control-label" for="example-chosen-multiple">风格</label>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <select id="example-chosen-multiple" name="example-chosen-multiple" class="select-chosen" data-placeholder="Choose a Country.." style="width: 250px; display: none;" multiple="">--}}
{{--                            <option value="United States">United States</option>--}}
{{--                            <option value="United Kingdom">United Kingdom</option>--}}
{{--                            <option value="Afghanistan">Afghanistan</option>--}}
{{--                        </select>--}}
{{--                    </div>--}}
{{--                </div>--}}


                <div class="form-group">
                    <label class="col-md-4 control-label" for="example-datepicker">Datepicker</label>
                    <div class="col-md-6">
                        <input type="text" id="example-datepicker" name="example-datepicker" class="form-control input-datepicker" data-date-format="yyyy/mm/dd" placeholder="yyyy/mm/dd">
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

