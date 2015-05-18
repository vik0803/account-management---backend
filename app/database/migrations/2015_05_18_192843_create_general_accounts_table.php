<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeneralAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
			Schema::create("general_accounts", function($table){
				$table->bigIncrements('sl');
				$table->bigInteger('account_id')->unsigned();
				$table->timestamp('date')->default(DB::raw('CURRENT_TIMESTAMP'));
				$table->string("narration");
				$table->bigInteger('voucher_id')->unsigned();
				$table->bigInteger('against_account_id')->unsigned();
				$table->bigInteger("location_id")->unsigned();
				$table->decimal('dr', 15, 3)->default(0.0);
				$table->decimal('cr', 15, 3)->default(0.0);
				$table->decimal('balance', 15, 3)->default(0.0);	
		});

			
		Schema::table('general_accounts', function($table) {
   				 $table->foreign('voucher_id')->references('id')->on('vouchers')->onDelete('cascade');
   				 $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
   				 $table->foreign('against_account_id')->references('id')->on('accounts')->onDelete('cascade');
   				 $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

		});
	}
	

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('general_accounts');
	}

}