@extends('admin.Master')

@section('title-content' , 'add-user')

@section('main_content')

<div class="app-wrapper">

		<div class="app-content pt-3 p-md-3 p-lg-4">
			<div class="container-xl">

				<h1 class="app-page-title">Add user</h1>
				<div class="row gy-4">
					<div class="col-12 col-lg-6">
						<div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
							<div class="app-card-header p-3 border-bottom-0">
							
							</div><!--//app-card-header-->
							<div class="app-card-body px-4 w-100">
								
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Name</strong></div>
											<div class="item-data">James Doe</div>
										</div><!--//col-->
										<div class="col text-end">
											<a class="btn-sm app-btn-secondary" href="#">Change</a>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>Email</strong></div>
											<div class="item-data">james.doe@website.com</div>
										</div><!--//col-->
										<div class="col text-end">
											<a class="btn-sm app-btn-secondary" href="#">Change</a>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>password</strong></div>
											<div class="item-data">
												https://johndoewebsite.com
											</div>
										</div><!--//col-->
										<div class="col text-end">
											<a class="btn-sm app-btn-secondary" href="#">Change</a>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//item-->
								<div class="item border-bottom py-3">
									<div class="row justify-content-between align-items-center">
										<div class="col-auto">
											<div class="item-label"><strong>phone</strong></div>
											<div class="item-data">
												New York
											</div>
										</div><!--//col-->
										<div class="col text-end">
											<a class="btn-sm app-btn-secondary" href="#">Change</a>
										</div><!--//col-->
									</div><!--//row-->
								</div><!--//item-->
							</div><!--//app-card-body-->
							<div class="app-card-footer p-4 mt-auto">
								<a class="btn app-btn-secondary" href="#">Add</a>
							</div><!--//app-card-footer-->

						</div><!--//app-card-->
					</div><!--//col-->
				
				</div><!--//row-->

			</div><!--//container-fluid-->
		</div><!--//app-content-->


	</div><!--//app-wrapper-->

    
@endsection