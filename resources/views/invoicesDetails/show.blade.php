@extends('layouts.master')
@section('title')
تفاصيل الفاتورة
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ تفاصيل الفاتورة</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                   
                        <!--/div-->
    
                        <!--div-->
                        <div class="col-xl-12">
                            <div class="card mg-b-20">
                                <div class="card-header pb-0">
                                    <div class="d-flex justify-content-between">
                                       
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-12 col-sm-6 d-flex  align-items-center">
                                            <div>
                                                <p class="my-3">رقم الفاتورة  : {{$invoices->invoice_number}}</p>
                                                <p class="my-3">المنتج : {{$invoices->product}}</p>
                                                <p class="my-3">القسم : {{$invoices->section->section_name}}</p> 
                                                <p class="my-3">الحالة :
                                                    @if($invoices->invoice_status == 0)
                                                    <p><span class="text-danger">{{$invoices->invoice_status}}</span></p>
                                                    @elseif($invoice->status_value == 1)
                                                    <p><span class="text-success">{{$invoices->invoice_status}}</span></p>
                                                    @else
                                                    <p><span class="text-warning">{{$invoices->invoice_status}}</span></p>
                                                    @endif
                                                </p>
                                                <p class="my-3">ملاحظات :{{$invoices->notes}}</p>
                                                <p class="my-3">المستخدم :{{$invoices->user}}</p>
                                                <a href="{{route('invoices.index')}}" class="btn btn-secondary" type="button">Back</a>
                                                                   
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <tbody>
                                                <tr>
                                                    <th scope="row">رقم الفاتورة</th>
                                                    <td>{{$invoices->invoice_number}}</td>
                                                    <th scope="row">القسم</th>
                                                    <td>
                                                        {{$invoices->section->section_name}}
                                                    </td>
                                                    <th scope="row">المنتج</th>
                                                    <td>{{$invoices->product}}</td>
                                                    <th scope="row">الحالة</th>
                                                    @if($invoices->invoice_status == 0)
                                                    <td><span class="text-danger">{{$invoices->invoice_status}}</span></td>
                                                    @elseif($invoice->status_value == 1)
                                                    <td><span class="text-success">{{$invoices->invoice_status}}</span></td>
                                                    @else
                                                    <td><span class="text-warning">{{$invoices->invoice_status}}</span></td>
                                                    @endif
                                                    <th scope="row">ملاحظات</th> 
                                                    <td>{{$invoices->notes}}</td>
                                                    <th scope="row">المستخدم</th> 
                                                    <td>{{$invoices->user}}</td>
                                            
                                                </tr>
                                        </table>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                        <!--/div-->
    
                                            {{-- add invoices --}}
         
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection