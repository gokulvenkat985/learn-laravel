@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="card">
			<div class="card-header colr_head">
			<strong>Categories</strong>
		</div>
		<div class="card-body colr_cat">
			<ul class="userpgcategory fa-ul">
				@if(isset($output))
					@if(count($output)>0)
						@foreach($output as $cat)
						<li>
						 	<a href="{{url('/viewads/'.preg_replace('/\s+/','',$cat->maincategory).'/'.$cat->id)}}" id="linkclr">{!!html_entity_decode($cat->icon)!!}&nbsp;{{$cat->maincategory}}</a>
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

<div class="row">
	@if(count($carbikes)>0)
		@foreach($carbikes as $row)
		<div class="col-md-4">
		<div class="card mt-2 ml-3 mr-3 mb-2 ">
  <div class="card-body">
			<div class="productcard">
				<img src="<?php echo strtok($row->photos,',') ?>" style="padding:10px!important;width:100%;
height:182px;">
<h3>{{ $row->productname }}</h3>
<p>{{$row->expsellprice}}</p>
<p>{{$row->city}}</p>
<a href='{{url("/product/view/{$row->id}")}}'></a>
		</div>
		</div>
	</div>
	</div>
	@endforeach
	@endif
			</div>
		</div>
	</div>
</div>
</div>
@endsection