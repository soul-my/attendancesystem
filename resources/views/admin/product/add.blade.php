@extends('admin')

@section("breadcrumbs")
	@include("components.navigations.breadcrumbs",[
		"breadcrumbs" => [
			[
				"name" => "Home",
				"link" => "admin.index",
			],
			[
				"name" => "All Products",
				"link" => "admin.products.index",
			],
			[
				"name" => "Create Product",
				"link" => "admin.products.create",
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
		<div class="col-md-12 col-xs-6 col-xs-6 text-left pb-3">
			<h4 class="text-white pt-2"><i class="fas fa-tags"></i> Create Product</h4>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
		<div class="col-md-12">
		<div class="card pl-3 pr-3 pb-4">
			<div class="card-body">
				<div class="row">
					<label for="product-title" class="blue-grey-text"t>Title</label>
					<input type="text" name="product-title" id="product-title" class="form-control">
				</div>
				<div class="row pt-3">
					<label for="product-description" class="blue-grey-text"t>Description</label>
					<textarea name="product-description" id="product-description" class="form-control"></textarea>
				</div>
			</div>
		</div>

		<h5 class="white-text pt-5">Image</h5>
		<div class="card pl-3 pr-3 pb-4 pt-4">
			<div class="card-body">
				<div class="row">
					<textarea name="product-description" id="product-description" class="form-control"></textarea>
				</div>
			</div>
		</div>

		<h5 class="white-text pt-5">Pricing</h5>
		<div class="card pl-3 pr-3 pb-4 mt-2">
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-md-6">
						<label for="product-price" class="blue-grey-text"t>Price</label>
						<input type="text" name="product-price" id="product-price" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="product-price-compare" class="blue-grey-text"t>Compare at price</label>
						<input type="text" name="product-price-compare" id="product-price-compare" class="form-control">
					</div>
				</div>

				<div class="row">
					<div class="form-check">
					    <input type="checkbox" class="filled-in form-check-input" id="checkbox101" checked="checked">
					    <label class="form-check-label" for="checkbox101">Charge taxes on this product</label>
					</div>
				</div>

			</div>
		</div>

		<h5 class="white-text pt-5">Inventory</h5>
		<div class="card pl-3 pr-3 pb-4 mt-2">
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-md-6">
						<label for="product-sku" class="blue-grey-text"t>SKU</label>
						<input type="text" name="product-sku" id="product-sku" class="form-control">
					</div>
					<div class="col-md-6">
						<label for="product-barcode" class="blue-grey-text"t>Barcode(ISBN,UPC,GTIN,etc)</label>
						<input type="text" name="product-barcode" id="product-barcode" class="form-control">
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-6">
						<label for="product-quantity" class="blue-grey-text"t>Quantity</label>
						<input type="text" name="product-quantity" id="product-quantity" class="form-control">
					</div>
				</div>
				<div class="row">
					<div class="form-check">
					    <input type="checkbox" class="filled-in form-check-input" id="checkbox101" checked="checked">
					    <label class="form-check-label" for="checkbox101">Allow customer to purchase this product when it's out of stock</label>
					</div>
				</div>

			</div>
		</div>

		<h5 class="white-text pt-5">Shipping</h5>
		<div class="card pl-3 pr-3 pb-4 mt-2">
			<div class="card-body">
				<div class="row pt-4">
					<div class="form-check">
					    <input type="checkbox" class="filled-in form-check-input" id="checkbox101" checked="checked">
					    <label class="form-check-label" for="checkbox101">This is physical product</label>
					</div>
				</div>

				<hr>
				<div class="row">
					<div class="col-md-6">
						<label for="product-weight" class="blue-grey-text"t>Weight</label>
						<input type="text" name="product-weight" id="product-weight" class="form-control">
					</div>
					<div class="col-md-2 mt-3">
						<!--Blue select-->
						<select class="mdb-select colorful-select dropdown-primary">
						    <option value="1">Gram</option>
						    <option value="2">Kg</option>
						</select>
						<label></label>
					</div>
				</div>
			</div>
		</div>

		<h5 class="white-text pt-5">Search engine optimization</h5>
		<div class="card pl-3 pr-3 pb-4 mt-2">
			<div class="card-body">
				<div class="row mb-4">
					<div class="col-md-12">
						<label for="product-page-title" class="blue-grey-text"t>Page title</label>
						<input type="text" name="product-page-title" id="product-page-title" class="form-control">
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-12">
						<label for="product-meta-desc" class="blue-grey-text"t>Meta description</label>
						<textarea type="text" name="product-meta-desc" id="product-meta-desc" class="form-control"></textarea>
					</div>
				</div>
				<div class="row mb-4">
					<div class="col-md-12">
						<label for="product-uri-slug" class="blue-grey-text"t>URL Slug</label>
						<input type="text" name="product-uri-slug" id="product-uri-slug" class="form-control">
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row pt-5 pull-right">
		<div class="col-md-4 col-sm-12 mb-2">
			<button type="button" class="btn btn-outline-default waves-effect btn-block" name="btn-cancel">cancel</button>
		</div>
		<div class="col-md-4 col-sm-12 mb-2">
			<button type="button" class="btn btn-outline-success waves-effect btn-block" name="btn-submit">Add</button>
		</div>
	</div>
		</div>
	</div>
</div>
@endsection

@section("scripts")

@append