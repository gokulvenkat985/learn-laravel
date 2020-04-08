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
				
			</div>
		</div>
	</div>
</div>
</div>
@endsection