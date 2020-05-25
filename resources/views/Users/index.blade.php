@extends('layouts.layout')
@section('content')
<div class="row">
							<div class="col-xs-12">
								<button type="button" id="btn_add" class="btn btn-info fa fa-plus"> Add User</button>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
								<!-- PAGE CONTENT BEGINS -->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<th>#</th>
										<th>User</th>
										<th>Email</th>
										
										<th>Date</th>
										<th>Status</th>
										<th>Action</th>

										
									</thead>
									<tbody>
										@php $i=0 @endphp
										@foreach($users as $value)
										@php $i++ @endphp
										<tr>
										<td>{{$i}}</td>
										<td>{{$value->name}}</td>
										<td>{{$value->email}}</td>
										
										<td>{{$value->created_at}}</td>
										<td>@if($value->status == 1) Active @else Inactive @endif</td>
										<td>
											<a href="{{ url('user/staus/'.$value->id) }}" class="btn btn-danger btn-round fa fa-trash"></button>
										</td>
									</tr>
									@endforeach

										
									</tbody>

								</table>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
						<div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Manage {{$title}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="add_form" action="{{route('user.store')}}" class="form-horizontal form-label-left input_mask">
      <div class="modal-body">
       <!--start form-->
      {{csrf_field()}}

       <div class="form-group">
           <label>Name:</label>
           <input type="text" name="name" id="name" class="form-control" required="">
           <input type="hidden" name="id" id="id" class="form-control" value="">
       </div>

       <div class="form-group">
           <label>Email:</label>
           <input type="email" name="email" id="email" class="form-control" required="">
          
       </div>

        <div class="form-group">
           <label>Phone:</label>
           <input type="number" name="phone" id="phone" class="form-control" required="">
          
       </div>

       <!--end form-->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" name=""  class="btn btn-primary" value="Submit">
     </div>
   </form>
      
    </div>
  </div>
</div>
@endsection