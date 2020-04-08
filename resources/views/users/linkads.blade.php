@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-3">
			<div class="card">
			<div class="card-header colr_head">
			<center><strong>Categories</strong></center>
		</div>
		<div class="card-body colr_cat">
			<ul class="userpgcategory fa-ul" id="main_menu">
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
				@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif

			</div>
			<div class="row" id="Advertisements">
				@if($data)
				@foreach($data as $row)

				<div class="col-md-4">
<div class="card mt-2 ml-3 mr-3 mb-2 ">
  <div class="card-body">

<img src="<?php echo strtok($row->photos,',')?>" style="padding:10px!important;width:100%;
height:182px;">

<div style="margin:12px;">
<h3>{{$row->productname}}</h3>
<p>Rs.{{$row->expsellprice}}</p>
<p>{{$row->city}}</p>

<!-- <a href=".$_SERVER['HTTP_REFERER'].'product/view/".$row->id.'>link</a> -->
        </div>
        </div>
        </div>
        </div>

        <div class="col-md-8">
<div class="card mt-2 ml-3 mr-3 mb-2 ">
  <div class="card-body">
@foreach(explode(',', $row->photos) as $info)
    <img src="<?php echo $info ?>" style="padding:-19px!important;width:100%;
height:250px;">
<!-- <p>{{$info}}</p> -->
@endforeach
  	
  </div>
</div>
</div>
        <div class="col-md-12">
<div class="card mt-2 ml-3 mr-3 mb-2 ">
  <div class="card-body">
  	<p>Contact details:</p>
  	<p>Name :{{$row->name}}</p>
  	<p>Mobile number : {{$row->mobile}}</p>
  	<p>Year of purchase : {{$row->yearofpurchase}}</p>
  	<p>Upload time and date :{{$row->updated_at}}<p>
  </div>
</div>
</div>
        		@endforeach
				@endif
			
		</div>
	</div>
</div>
</div>
@endsection