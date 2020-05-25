@extends('layouts.layout')
@section('content')

<div class="row">
							<div class="col-xs-12">
								<button type="button" id="btn_add" class="btn btn-info fa fa-plus"> Add Case</button>

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
								<!-- PAGE CONTENT BEGINS -->
								<table id="dynamic-table" class="table table-striped table-bordered table-hover">
									<thead>
										<th>#</th>
										<th>Type</th>
										<th>Merit/Demerit</th>
										<th>Points</th>
										<th>Date</th>
										<th>Action</th>

										
									</thead>
									<tbody>
										@php $i=0 @endphp
										@foreach($cases as $value)
										@php $i++ @endphp
										<tr>
										<td>{{$i}}</td>
										<td>{{$value->type ? 'Demerit' : 'Merit'}}</td>
										<td>{{$value->case}}</td>
										<td>{{$value->points}}</td>
										<td>{{$value->created_at}}</td>
										<td>
											<button type="button" onclick="edit_case({{$value->case_id}})" class="btn btn-info btn-round fa fa-pencil"></button>
											<a href="{{ url('case/delete/'.$value->case_id) }}" class="btn btn-danger btn-round fa fa-trash"></a>
										</td>
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
                        <form action="{{ route('case.store') }}" method="POST" id="add_form" autocomplete="OFF">
                          {{csrf_field()}}
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                          </button>
                          <h4 class="modal-title" id="myModalLabel2">Manage Case</h4>
                        </div>
                        <div class="modal-body">
                        	<div class="form-group">
                        		<label>Type:</label>
                        		<select class="form-control" id="type" name="type">
                        			<option value="0">Merit</option>
                        			<option value="1">Demerit</option>
                        			
                        		</select>
                        	</div>
                         <div class="form-group">
                           <label>Merit/Demerit:</label>
                           <textarea name="case" id="case" class="form-control" required=""></textarea>
                           <input type="hidden" name="case_id" id="case_id" class="form-control" required="">
                         </div>

                         <div class="form-group">
                         	<label>Points:</label>
                         	<input type="number" class="form-control" name="points" id="points" min="1" max="10">
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