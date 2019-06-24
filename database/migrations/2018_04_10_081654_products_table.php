<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProductsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('products', function (Blueprint $table) {
			$table->increments('id');
			$table->string('title');
			$table->string('desc');
			$table->string('img');
			$table->decimal('price', 8, 2);
			$table->integer("tax_type");
			$table->string('sku');
			$table->integer('physical');
			$table->decimal('weight', 8, 2);
			$table->integer('variant');
			$table->integer('seo');

			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {

	}
}
