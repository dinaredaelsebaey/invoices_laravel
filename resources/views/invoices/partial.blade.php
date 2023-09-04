@extends('layouts.master')
@section('title')
الفواتير  المدفوعة جزئيا
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
							<h4 class="content-title mb-0 my-auto">  الفواتير المدفوعة</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الفواتير</span>
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
                                        <a class="btn btn-outline-primary " href="{{route('invoices.create')}}">اضافه فاتوره</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example1" class="table key-buttons text-md-nowrap">
                                            <thead>
                                                <tr>
                                                    <th class="border-bottom-0">#</th>
                                                    <th class="border-bottom-0">رقم الفاتورة</th>
                                                    <th class="border-bottom-0">تاريخ الفاتورة</th>
                                                    <th class="border-bottom-0">تاريخ الاستحقاق</th>
                                                    <th class="border-bottom-0">القسم</th>
                                                    <th class="border-bottom-0">المنتج</th>
                                                    <th class="border-bottom-0">العمولة</th>
                                                    <th class="border-bottom-0">الخصم</th>
                                                    <th class="border-bottom-0">نسبة الضريبه</th>
                                                    <th class="border-bottom-0">قيمة الضريبه</th>
                                                    <th class="border-bottom-0">الاجمالي</th>
                                                    <th class="border-bottom-0">الحالة</th>
                                                    <th class="border-bottom-0">ملاحظات</th> 
                                                    <th class="border-bottom-0">operations</th> 
                                            
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($invoices as $invoice) 
                                                <tr id="{{$invoice->id}}"> 
                                                    <td>{{$invoice->id}}</td>
                                                    <td>{{$invoice->invoice_number}}</td>
                                                    <td>{{$invoice->invoice_date}}</td>
                                                    <td>{{$invoice->invoice_due_date}}</td>
                                                    <td>
                                                        <a href="{{route('invoicesDetails.show',$invoice->id)}}">{{$invoice->section->section_name}}</a>
                                                    </td>
                                                    <td>{{$invoice->product}}</td>
                                                    <td>{{$invoice->amount_commission}}</td>
                                                    <td>{{$invoice->discount}}</td>
                                                    <td>{{$invoice->tax_rate}}</td>
                                                    <td>{{$invoice->tax_value}}</td>
                                                    <td>{{$invoice->total}}</td>
                                                    <td>
                                                        @if($invoice->invoice_status == 0)
                                                        <span class="text-danger">{{$invoice->status}}</span>
                                                        @elseif($invoice->invoice_status == 1)
                                                        <span class="text-success">{{$invoice->status}}</span>
                                                        @else
                                                        <span class="text-warning">{{$invoice->status}}</span>
                                                        @endif
                                                    </td>
                                                    <td>{{$invoice->note}}</td>
                                                    <td>{{$invoice->file}}</td>
                                                    <td>
                                                        <a href="{{route('invoices.show',$invoice->id)}}">Change Status</a>
                                                        <a href="#">Update</a>
                                                        <a href="#">Delete</a>

                                                    </td>
                                                </tr>
                                               @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--/div-->
    
                                            {{-- add invoices --}}
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">اضافه قسم </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                
                                    <div class="modal-body">
                                        <form action="" method="post">
                                            @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">رقم الفاتورة</label>
                                            <input type="number" class="form-control" id="invoice_number" name="invoice_number">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn ripple btn-success" type="submit">تاكيد</button>
                                        <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                      
				</div>
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