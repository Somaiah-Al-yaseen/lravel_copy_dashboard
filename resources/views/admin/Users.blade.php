@extends('admin.Master')

@section('title-content' , 'users')

@section('main_content')

<div class="app-wrapper">

	<div class="app-content pt-3 p-md-3 p-lg-4">
		<div class="container-xl">

			<div class="row g-3 mb-4 align-items-center justify-content-between">
				<div class="col-auto">
					<h1 class="app-page-title mb-0">Users</h1>
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
				<a class="btn btn-success btn-lg" role="button" data-toggle="modal" data-target="#exampleModalLong">Add User</a>
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
											<th class="cell">First name</th>
											<th class="cell">Last name</th>
											<th class="cell">email</th>
											<th class="cell">phone</th>
											<th class="cell">user_status</th>

											<!-- <th class="cell">Status</th>
												<th class="cell">Total</th> -->
											<th class="cell"></th>
										</tr>
									</thead>
									<tbody>

										@foreach ($data as $i)

										<tr>
											<td class="cell">{{$i->id }}</td>
											<td class="cell"><span class="truncate">{{$i->Fname }}</span></td>
											<td class="cell">{{$i->Lname }}</td>
											<td class="cell">{{$i->email }}</td>
											<td class="cell"><span class="cell-data">{{$i->phone }}</span></td>
											<td class="cell"><span class="note">@if($i->is_admin) Admin @else user @endif</span></td>

											<!-- <td class="cell"><span class="badge bg-success">Paid</span></td>
												<td class="cell">$678.26</td> -->
											<td class="cell">
												<a class="btn btn-danger btn-sm" role="button"href="{{'deleteusr/id/'.$i->id}}">Delete</a>
												<!-- <a class="btn-sm app-btn-secondary" href="#">delete</a> -->
												<!-- <div class="btn-group"> -->

												<div class="btn-group dropend">
													<button type="button" class="btn app-btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
													User_Status
													</button>
													<ul class="dropdown-menu">
														<li><a class="dropdown-item" href="{{'updateusr/id/'.$i->id.'/status/1'}}">Admin</a></li>
														<li><a class="dropdown-item" href="{{'updateusr/id/'.$i->id.'/status/0'}}">user</a>
														</li>
													</ul>
												</div>

												

											</td>
										</tr>
										@endforeach




									</tbody>
								</table>
							</div><!--//table-responsive-->

						</div><!--//app-card-body-->
					</div><!--//app-card-->

				</div><!--//tab-pane-->







				<!-- Modal -->
				<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="modal-body">
									<form action="adduse" method="Post">
										@csrf
										<input type="hidden" value="{{$i->id}}" name="id">
										<label for="">First_name</label>
										<input type="text" name='user_fname'>
										<br><br>
										<label for="">Last_name</label>
										<input type="text" name='user_lname'>
										<br><br>
										<label for="">Password</label>
										<input type="number" name='user_pass'>
										<br><br>
										<label for="">Email</label>
										<input type="email" name='user_email'>
										<br><br>

										<label for="">phone</label>
										<input type="number" name='user_phone'>
										<br><br>
										
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
				</div>


















			</div><!--//tab-content-->


		</div><!--//container-fluid-->
	</div><!--//app-content-->


</div><!--//app-wrapper-->


@endsection