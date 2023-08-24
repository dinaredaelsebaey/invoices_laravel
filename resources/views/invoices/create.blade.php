@extends('layouts.master')
@section('title')
انشاء فاتوره
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
							<h4 class="content-title mb-0 my-auto">الفواتير</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ قائمه الفواتير</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection    
@section('content')
				<!-- row -->
				<div class="row">
                    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card-body">
    <form action="{{route('invoices.store')}}" method="post" enctype="multipart/form-data" class="w-75 m-auto">
        @csrf
        <div class="row">
            <div class="col-md-12">
                {{-- @if(session('status'))
                <h6 class="alart-success ">{{session('status')}}</h6>
            @endif --}}
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">اضافه فاتوره</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="invoice_number">رقم الفاتورة</label>
                            <input type="number" id="invoice_number" class="form-control" value="" name="invoice_number">
                        </div>

                        <div class="form-group">
                            <label for="invoice_date">تاريخ الفاتورة</label>
                            <input type="date" id="invoice_date" class="form-control" value="" name="invoice_date">
                        </div>
                        <div class="form-group">
                            <label for="invoice_due_date">تاريخ الاستحقاق</label>
                            <input type="date" id="invoice_due_date" class="form-control" value="" name="invoice_due_date">
                        </div>

                        <div class="form-group">
                            <label for="section">القسم</label>
                            <select required class=" form-control" name="section_id" id="section_id">
                                    @foreach ($sections as $section)
                                        <option value={{ $section->id}}>{{ $section->section_name }}</option>
                                    @endforeach
                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product"> المنتج</label>
                            <input type="text" id="product" class="form-control" value="" name="product">
                        </div>
                        <div class="form-group">
                            <label for="amount_collection"> مبلغ التحصيل</label>
                            <input type="text" id="amount_collection" class="form-control" value="" name="amount_collection">
                        </div>
                        <div class="form-group">
                            <label for="amount_commission"> مبلغ العمولة</label>
                            <input type="text" id="amount_commission" class="form-control" value="" name="amount_commission" required>
                        </div>                
                        <div class="form-group">
                            <label for="discount">الخصم </label>
                            <input type="text" id="discount" class="form-control" value=0 required name="discount" required>
                        </div>
                        <div class="form-group">
                            <label for="tax_rate">نسبة الضريبةالمضافه</label>
                            <select required class=" form-control" name="tax_rate" id="tax_rate" onchange="calcTotalTax()" >
                                <optgroup label="حدد نسبة ضريبة القيمة المضافه">
                                        <option value="5%">5%</option>
                                        <option value="10%">10%</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tax_value"> قيمة الضريبة</label>
                            <input type="number" id="tax_value" class="form-control" value="" name="tax_value">
                        </div>
                        <div class="form-group">
                            <label for="total"> الجمالي شامل الضريبة</label>
                            <input type="number" id="total" class="form-control" value="" name="total">
                        </div>
                        <div class="form-group">
                            <label for="note"> ملاحظات</label>
                            <input type="text" id="note" class="form-control" value="" name="note">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="image">Image Cover</label>
                            <input type="file" class="form-control" id="image" name="cover_image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
           
                <button type="submit"class="btn btn-secondary float-right">Save</button>
            </div>
        </div>
    </form>
    
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
<script>
    function calcTotalTax(){
        var amount_commission = parseFloat(document.getElementById("amount_commission").value);
        var discount = parseFloat(document.getElementById("discount").value);
        var tax_rate = parseFloat(document.getElementById("tax_rate").value);
        var tax_value = parseFloat(document.getElementById("tax_value").value);

        var total_amount_commission = amount_commission - discount;

        var commission_tax_rate = total_amount_commission * tax_rate / 100;
        var total_commission_tax_rate = commission_tax_rate + total_amount_commission;

        sum_tax_value = parseFloat(commission_tax_rate).toFixed(2);
        sum_total = parseFloat(total_commission_tax_rate).toFixed(2);

        document.getElementById("tax_value").value = sum_tax_value;
        document.getElementById("total").value = sum_total;


    }
</script>
@endsection