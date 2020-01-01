@extends('layouts.header_common')
@section('css')
@stop
@section('content')
  <div class="row">
    <div class="col-sm-6 col-lg-3">
      <!-- Widget -->
      <div class="widget">
        <div class="widget-simple">
          <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
            <i class="gi gi-package"></i>
          </a>
          <h3 class="text-right animation-stretchRight">游客数量： <strong>100</strong></h3>
        </div>
      </div>
      <!-- END Widget -->
    </div>

    <div class="col-sm-6 col-lg-3">
      <!-- Widget -->
      <div class="widget">
        <div class="widget-simple">
          <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
            <i class="gi gi-package"></i>
          </a>
          <h3 class="text-right animation-stretchRight">游客数量： <strong>100</strong></h3>
        </div>
      </div>
      <!-- END Widget -->
    </div>

    <div class="col-sm-6 col-lg-3">
      <!-- Widget -->
      <div class="widget">
        <div class="widget-simple">
          <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
            <i class="gi gi-package"></i>
          </a>
          <h3 class="text-right animation-stretchRight">游客数量： <strong>100</strong></h3>
        </div>
      </div>
      <!-- END Widget -->
    </div>

    <div class="col-sm-6 col-lg-3">
      <!-- Widget -->
      <div class="widget">
        <div class="widget-simple">
          <a href="javascript:void(0)" class="widget-icon pull-left themed-background">
            <i class="gi gi-package"></i>
          </a>
          <h3 class="text-right animation-stretchRight">游客数量： <strong>100</strong></h3>
        </div>
      </div>
      <!-- END Widget -->
    </div>
  </div>
@stop
@section('script')
  <script src="js/pages/widgetsStats.js"></script>
  <script>$(function(){ WidgetsStats.init(); });</script>
@stop
