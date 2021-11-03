<?php

use Illuminate\Database\Seeder;
use App\Model\EmpDetail;

class EmployeeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $emp = factory(EmpDetail::class)->create();
        $user = App\User::where('id', $emp->user_id)->first();
        $user->assignRole('employee');
    }
}
