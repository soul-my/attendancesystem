@extends('admin')

@section("breadcrumbs")
	@include("components.navigations.breadcrumbs",[
		"breadcrumbs" => [
			[
				"name" => "Admin",
				"link" => "disabled",
			],
			[
				"name" => "All Products",
				"link" => "admin.dashboard",
			],
    	]
	])
@endsection

<!-- overwrite current sidebar state-->
@section("sidebar")
    @include("components.navigations.sidebar", ["active" =>"product"])
@endsection

@section("body")
<div class="container-fluid">
	<div class="row">
		<div class="col-md-6 col-xs-6 text-left pb-3">
			<h4 class="text-white pt-2"><i class="fas fa-tags"></i> All Products</h4>
		</div>
		<div class="col-md-6 col-xs-6 text-right pb-3">
			<a href="{{route('admin.products.create')}}"><button type="button" class="btn btn-success ">Add Product</button></a>
			{{-- <h3 class="text-white pb-3"><i class="fas fa-tags"></i> All Products</h3> --}}
		</div>
	</div>


	<div class="col-md-12 jumbotron text-center p5">
	 	<div class="table-wrapper pb-4">
           @include("components.datatable.datatable", [
                    "id" => "users-table",
                    "checkbox" => "disabled",
                    "thead" => [
                        "title" => ["No","Name","Email","Created at","Edit/Delete"],
                        "class" => "th-md",
                        "icons" => "<i class='fa fa-sort ml-1'></i>",
                    ]
                ])
        </div>

        <hr class="my-0">
	</div>
</div>
@endsection

@section("scripts")
	<script type="text/javascript">

		$(function(){
			//datatable
	        var table = $('#users-table').DataTable({
	            processing: true,
	            serverSide: true,
	            ajax: '{!! route("datatable.test") !!}',
	            pageLength: 5,
	            columns: [
	                { data: 'id', name: 'id' },
	                { data: 'name', name: 'name' },
	                { data: 'email', name: 'email' },
	                { data: 'created_at', name: 'created_at' },
	                { data: 'btn_edit_delete', name: 'btn_edit_delete', searchable: false },
	            ],

	            // dom: "<'#'>", // horizobtal scrollable datatable

	        });

		})

	</script>
@append