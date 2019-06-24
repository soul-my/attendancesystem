@if(isset($breadcrumbs))
	@foreach($breadcrumbs as $breadcrumb)
		<li class="breadcrumb-item"><a class="white-text" href="{{$breadcrumb["link"] != "disabled" ? route($breadcrumb['link']) : '#'}}">{{$breadcrumb["name"]}}</a></li>
	@endforeach
@else
	<li class="breadcrumb-item"><a class="white-text" href="#erorr">Breadcrumbs Error!</a></li>
@endif