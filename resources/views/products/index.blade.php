@extends('layouts.master')
@section('title')
المنتجات
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
							<h4 class="content-title mb-0 my-auto">الاعدادات</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ المنتجات</span>
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
                    <div class="col-xl-12">
                        <div class="card mg-b-20">
                            <div class="card-header pb-0">
                                <div class="d-flex justify-content-between">
                                    <a class="modal-effect btn btn-outline-primary " data-effect="effect-scale" data-toggle="modal" href="#modaldemo8">اضافه منتج</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table key-buttons text-md-nowrap">
                                        <thead>
                                            <tr>
                                                <th class="border-bottom-0">#</th>
                                                <th class="border-bottom-0">اسم المنتج</th>
                                                <th class="border-bottom-0">اسم القسم</th>
                                                <th class="border-bottom-0">ملاحظات</th>
                                                <th class="border-bottom-0">عمليات</th>                                        
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                @foreach ($products as $product) 
                                                <tr id="{{$product->id}}"> 
                                                <td>{{$product->id}}</td>
                                                <td>{{$product->product_name}}</td>
                                                <td>{{$product->section->section_name}}</td>
                                                <td>{{$product->notes}}</td>
                                                <td>
                                                    <a href="{{route('products.show',$product->id)}}" class="btn btn-primary" type="button">تفاصيل</a>
                                                    {{-- <a href="{{route('sections.edit',$section->id)}}"  class="btn btn-success"type="button">تعديل</a>
                                                    <a href="{{route('sections.delete',$section->id)}}" class="btn btn-danger" type="button">حزف</a>     --}}
                                                </td>
                                            </tr>
                                                @endforeach
                                            </td>
                                                
                                            </tr>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/div-->
                    {{-- add section --}}
                    <div class="modal" id="modaldemo8">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">اضافه منتج </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                
                                    <div class="modal-body">
                                        <form action="{{route('products.store')}}" method="post">
                                            @csrf
                                        <div class="form-group">
                                            <label for="exampleFormControlInput1" class="form-label">اسم المنتج</label>
                                            <input type="text" class="form-control" id="product_name" name="product_name">
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
                                            <label for="exampleFormControlTextarea1" class="form-label">ملاحظات</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
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
                    {{-- edit section --}}
                    {{-- <div class="modal" id="modaldemo12">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content modal-content-demo">
                                <div class="modal-header">
                                    <h6 class="modal-title">تعديل قسم </h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{route('sections.update',$section->id)}}" method="Post" enctype="multipart/form-data">
                                                                        @csrf
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlInput1" class="form-label">اسم القسم</label>
                                                                        <input type="text" class="form-control" id="section_name" name="section_name" value="{{old('section_name') ?? $section->section_name}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="exampleFormControlTextarea1" class="form-label">الوصف</label>
                                                                        <textarea class="form-control" id="description" name="description" rows="3">{{old('section_description') ?? $section->section_description}}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <a class="btn ripple btn-primary" data-dismiss="modal" type="button">تعديل</a>
                                                                    <a class="btn ripple btn-secondary" data-dismiss="modal" type="button">اغلاق</a>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                    </div> --}}
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
<script src="{{URL::asset('assets/js/modal.js')}}"></script>
@endsection