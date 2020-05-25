@extends('layouts.layout')
@section('content')

<div class="row">
							<div class="col-xs-12">
								<button type="button" id="btn_add" class="btn btn-info fa fa-plus"> Record Demerit</button>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
								<!-- PAGE CONTENT BEGINS -->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<th>#</th>
										<th>Name</th>
										<th>ID</th>
										<th>Huduma No.</th>
										<th>Adm No.</th>
										<th>Admin</th>
										<th>Demerit</th>
										<th>Points</th>
										<th>Date</th>
										
										
									</thead>
									<tbody>
										@php $i=0 @endphp
										@foreach($list as $value)
										@php $i++ @endphp
										<tr>
										<td>{{$i}}</td>
										<td>{{$value->user_info['name']}}</td>
										<td>{{$value->user_info['id_no']}}</td>
										<td>{{$value->user_info['huduma_no']}}</td>
										<td>{{$value->user_info['adm_no']}}</td>
										<td>{{$value->admin['name']}}</td>
										<td>{{$value->case['case']}}</td>
										<td>{{$value->points}}</td>
										<td>{{$value->created_at}}</td>
									
									</tr>
									@endforeach

										
									</tbody>

								</table>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->


						   <div class="modal fade" id="add_modal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm" style="width: 500px">
                      <div class="modal-content">
                        <form action="{{ route('demerit.store') }}" method="POST" id="add_form" autocomplete="OFF">
                          {{csrf_field()}}
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Record Demerit</h4>
                        </div>
                        <div class="modal-body">
                        	<div class="form-group">
                         	<label>Name:</label>
                         	<input type="text" class="form-control" name="name" id="name" required="">
                         	</div>
                        	<div class="form-group">
                         	<label>ID No.:</label>
                         	<input type="number" class="form-control" name="id_no" id="id_no">
                         	</div>
                         	<div class="form-group">
                         	<label>Huduma No.:</label>
                         	<input type="number" class="form-control" name="huduma_no" id="huduma_no">
                         	</div>
                         	<div class="form-group">
                         	<label>Adm No.:</label>
                         	<input type="number" class="form-control" name="adm_no" id="adm_no">
                         	</div>
                        	<div class="form-group">
                        		<label>Demerit:</label>
                        		<select class="form-control" id="case_id" name="case_id" required="">
                        			<option value="" disabled="" selected="">Select Demerit</option>
                        			@foreach($cases as $value)
                        			<option value="{{$value->case_id}}">{{$value->case}}</option>
                        			@endforeach
                        		</select>
                        	</div>
                       
                       
                       
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                      </form>
                      </div>
                    </div>
                  </div>
@endsection