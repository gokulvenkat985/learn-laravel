
@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="card">
			<div class="card-header colr_head">
			<strong style="text-align: center;">Categories</strong>
		</div>
		<div class="card-body colr_cat">
			<ul class="userpgcategory fa-ul">
				@if(isset($output))
					@if(count($output)>0)
						@foreach($output as $cat)
						<li>
							<a href="{{url('/post-classified-ads/'.preg_replace('/\s+/','',$cat->maincategory).'/'.$cat->id)}}" id="linkclr">{!!html_entity_decode($cat->icon)!!}&nbsp;{{$cat->maincategory}}</a>
						</li>
						@endforeach
 					@endif
				@endif
				

			</ul>
		</div>
		</div>
	</div>
		<div class="col-md-9">
			<div class="card">
			<div class="card-header">
			<strong>Advertisement</strong>
			</div>
			<div class="card-body"> 
				<ul class="nav-tabs">
					<li class="nav-item">
					<a class="nav-link" data-togle="tab" href="#home">Categories</a>
					</li>
				</ul>
				<div id="mytabcontent" class="tab-content">
					<div id="home">
					<h1 style="padding: 10px 10px;" id="selcatmsg"></h1>
					<form class="form-horizontal" enctype="multipart/form-data" method="post" action="{{url('/postcarbikes')}}" style="padding-left: 20px;">
						{{csrf_field()}}
						<div class="row">
							<div class="col-lg-6">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

							</div>
						</div>
				<div class="row">
							<div class="col-lg-6">
								<div class="col-lg-12">
								<div class="form-group">
									<input type="hidden" name="maincategoryid" value={{Request::segment(3)}}>
										<label>
											<strong>Subcategory</strong></label>
											<select class="form-control " name="subcategoryid" >
												<option>Select</option>
												@if(count($subcategories)>0)
													@foreach($subcategories as $subcategory)
	<option value="{{$subcategory->id}}">{{$subcategory->subcategory}}</option>
													@endforeach
												@else
													
												@endif
											</select>
										
								
								</div>
							</div>
							
							<label ></label>
	
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							<div class="form-group">
								<label>
											<strong>Productname</strong></label>
								<input type="text" class="form-control" name="productname" placeholder="Enter product name">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="col-lg-12">
								<div class="form-group">
									<input type="hidden" name="maincategoryid" value={{Request::segment(3)}}>
										<label>
											<strong>Year of Purchase</strong></label>
											<input type="text" class="form-control" name="yearofpurchase" placeholder="Enter Year of Purchase">	
										
								
								</div>
							</div>
							<label></label>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							<div class="form-group">
								<label>
											<strong>Expected Selling Price</strong></label>
								<input type="text" class="form-control" name="expsellprice" placeholder="Enter Expected Selling Price">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="col-lg-12">
								<div class="form-group">
									<input type="hidden" name="maincategoryid" value={{Request::segment(3)}}>
										<label>
											<strong>Your Name</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Enter Name">
										
								
								</div>
							</div>
							<label></label>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							<div class="form-group">
								<label>
											<strong>Your Mobile</strong></label>
								<input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile">
							</div>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="col-lg-12">
								<div class="form-group">
									<input type="hidden" name="maincategoryid" value={{Request::segment(3)}}>
										<label>
											<strong>Your Email</strong></label>
											<input type="text" class="form-control" name="email" placeholder="Enter Your Email">
										
								
								</div>
							</div>
							<label></label>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							<div class="form-group">
								<label>
											<strong>State</strong></label>

								<select class="form-control" name="state">
									<option value="">Select</option>
									@if(count($states)>0)
									@foreach($states as $row)
												<option value="{{$row->id}}">{{$row->stateName}}</option>
									@endforeach
									@endif
											</select>
							</div>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="col-lg-12">
								<div class="form-group">
									<input type="hidden" name="maincategoryid" value={{Request::segment(3)}}>
										<label>
											<strong>City</strong></label>
										<input type="text" class="form-control" name="city" placeholder="Enter City">
								</div>
							</div>
							<label></label>
						</div>
						<div class="col-lg-6">
							<div class="col-lg-12">
							<div class="form-group">
								<label>
											<strong>Photos of your vehicle(max 4)</strong></label>
								<!-- <input  type="file" class="form-control"  placeholder="address" multiple> -->
								  <input type="file" id="files" name="photos[]" multiple>

							</div>
							</div>
						</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<center><button type="submit" class="btn btn-primary" >Add post</button></center>
							</div>
						</div>

					</form>
					</div>
				</div>



			</div>
		</div>
	</div>
</div>
</div>
@endsection