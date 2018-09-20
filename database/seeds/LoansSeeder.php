<?php

use Illuminate\Database\Seeder;

class LoansSeeder extends Seeder
{
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		factory(App\Loan::class, 10)->create();
	}
}
