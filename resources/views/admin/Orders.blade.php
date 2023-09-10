@extends('admin.Master')

@section('title-content' , 'orders')

@section('main_content')


<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Orders</h1>
				</div>
				<div class="col-auto">
					<div class="page-utilities">
						<div class="row g-2 justify-content-start justify-content-md-end align-items-center">
							<div class="col-auto">
								<form class="table-search-form row gx-1 align-items-center">
									<div class="col-auto">
										<input type="text" id="search-orders" name="searchorders" class="form-control search-orders" placeholder="Search">
									</div>
									<div class="col-auto">
										<button type="submit" class="btn app-btn-secondary">Search</button>
									</div>
								</form>

							</div><!--//col-->
							<div class="col-auto">

								<select class="form-select w-auto">
									<option selected value="option-1">All</option>
									<option value="option-2">This week</option>
									<option value="option-3">This month</option>
									<option value="option-4">Last 3 months</option>

								</select>
							</div>

						</div><!--//row-->
					</div><!--//table-utilities-->
				</div><!--//col-auto-->
			</div><!--//row-->


			<div class="d-grid gap-2 d-md-block">
				<a class="btn btn-success btn-lg" role="button" data-toggle="modal" data-target="#exampleModalCenter">Add reservation</a>
			</div>



			<br>


			<div class="tab-content" id="orders-table-tab-content">
				<div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
					<div class="app-card app-card-orders-table shadow-sm mb-5">
						<div class="app-card-body">
							<div class="table-responsive">
								<table class="table app-table-hover mb-0 text-left">
									<thead>
										<tr>
											<th class="cell">id</th>
											<th class="cell">reservation_date</th>
											<th class="cell">user_name</th>
											<th class="cell">trip_name</th>
											<th class="cell">payment_status</th>
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>
										@foreach ($data as $i)

										<tr>
											<td class="cell">{{$i->id}}</td>
											<td class="cell"><span class="truncate">{{$i->reservation_date}}</span></td>
											<td class="cell">{{$i->user->Fname }}</td>
											<td class="cell"><span class="note">{{$i->trip->trip_name }}</span></td>
											<td class="cell"><span class="note">  @if($i->payment_status) Paid @else Pending @endif</span></td>


											<td class="cell">
												<a class="btn btn-danger btn-sm" role="button" href="{{'deleteRes/id/'.$i->id}}">Delete</a>
												<a class="btn btn-success btn-sm" role="button" data-toggle="modal" data-target="{{'#cc'.$i->id}}">Update</a>

												
												<div class="btn-group dropend">
													<button type="button" class="btn app-btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
														payment_status
													</button>
													<ul class="dropdown-menu">
														<li><a class="dropdown-item" href="{{'updateres/id/'.$i->id.'/status/1'}}">Paid</a></li>
														<li><a class="dropdown-item" href="{{'updateres/id/'.$i->id.'/status/0'}}">Pending</a>
														</li>
													</ul>
												</div>


											</td>
										</tr>

										<!-- Modal -->
										<div class="modal fade" id="{{'cc'.$i->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
											<div class="modal-dialog modal-dialog-centered" role="document">
												<div class="modal-content">
													<div class="modal-header">
														<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
														<button type="button" class="close" data-dismiss="modal" aria-label="Close">
															<span aria-hidden="true">&times;</span>
														</button>
													</div>
													<div class="modal-body">
														<form action="editres" method="POST">
															@csrf
															<input type="hidden" value="{{$i->id}}" name="id">
															<label for="">reservation_date</label>
															<input type="date" name="reservation_date">
															<br><br>

															<button type="submit" class="btn btn-primary">Save changes</button>
														</form>
													</div>
													<div class="modal-footer">
														<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
													</div>
												</div>
											</div>
										</div>
										@endforeach



									</tbody>
								</table>
							</div><!--//table-responsive-->

						</div><!--//app-card-body-->
					</div><!--//app-card-->

				</div><!--//tab-pane-->







			</div><!--//tab-content-->



		</div><!--//container-fluid-->
	</div><!--//app-content-->


</div><!--//app-wrapper-->



<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="addres" method="POST">
					@csrf
					<label for="">reservation_date</label>
					<input type="date" name="reservation_date">
					<br><br>
					<label>Choose a user:</label>
					<select name="user_id">
						@foreach($data2 as $x)
						<option value="{{$x->id}}">{{$x->Fname}}</option>
						@endforeach
					</select>
					<br><br>
					<label>Choose a trip:</label>
					<select name="trip_id">
						@foreach($data3 as $y)
						<option value="{{$y->id}}">{{$y->trip_name}}</option>
						@endforeach
					</select>
					<br><br>
					<label>payment_status</label>
					<select name="payment_status">
						<option value="0">Pending</option>
						<option value="1">Paid</option>
					</select>
					<br><br>
					<button type="submit" class="btn btn-primary">Save changes</button>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

@endsection