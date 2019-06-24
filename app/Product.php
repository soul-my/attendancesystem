<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
	//
	protected $guard = 'admin';

	protected $fillable = [
		'title', 'desc', 'img', 'price', 'tax_type', 'sku', 'physical', 'weight', 'variant', 'seo',
	];

}
