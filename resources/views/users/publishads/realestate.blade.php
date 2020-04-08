
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
					<a class="nav-link" data-togle="tab" href="#home">Real Estate</a>
					</li>
				</ul>
				<div id="mytabcontent" class="tab-content">
					<div id="home">
						<h2>eeeeeeeeeeeeeeeeee</h2>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
@endsection