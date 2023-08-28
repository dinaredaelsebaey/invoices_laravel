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
                                </div>
                                <div class="d-flex justify-content-between">
                                    <a class="btn btn-outline-primary ">تفاصيل الفاتوره</a>
                                </div>
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                                    <th class="border-bottom-0">القسم</th>
                                                    <th class="border-bottom-0">المنتج</th>
                                                    <th class="border-bottom-0">الحالة</th>
                                                    <th class="border-bottom-0">تاريخ الدفع</th>
                                                    <th class="border-bottom-0">تاريخ الاضافة</th>
                                                    <th class="border-bottom-0">ملاحظات</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoices_details as $invoice_details)
                                                <tr>
                                                    <td>{{$invoice_details->id}}</td>
                                                    <td>{{$invoice_details->invoice_number}}</td>
                                                    <td>{{$invoices->section->section_name}}</td>
                                                    <td>{{$invoice_details->product}}</td>
                                                    
                                                        @if($invoice_details->invoice_status == 0)
                                                        <td><span class="text-danger">{{$invoice_details->status}}</span></td>
                                                        @elseif($invoice_details->invoice_status == 1)
                                                        <td><span class="text-success">{{$invoice_details->status}}</span></td>
                                                        @else
                                                        <td><span class="text-warning">{{$invoice_details->status}}</span></td>
                                                        @endif
                                                    
                                                    <td>{{$invoice_details->payment_date}}</td>
                                                    <td>{{$invoice_details->created_at}}</td>
                                                    <td>{{$invoice_details->note}}</td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
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