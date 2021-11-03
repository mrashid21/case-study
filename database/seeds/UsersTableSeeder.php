<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role = Role::create(['name' => 'superadmin']);
        $permissions = Permission::pluck('id', 'id')->all();
        $role->syncPermissions($permissions);

        $mradmin = User::create([
            'name' => 'MR.EMP',
            'email' => 'mr@emp.com',
            'password' => Hash::make('secretagent')
        ]);

        $mradmin->assignRole([$role->id]);

        $employer = User::create([
            'name' => 'MR.EMPLOYER',
            'email' => 'employer@emp.com',
            'password' => Hash::make('secretagent')
        ]);

        $employer->assignRole('employer');

        $employee = User::create([
            'name' => 'MR.EMPLOYEE',
            'email' => 'employee@emp.com',
            'password' => Hash::make('secretagent')
        ]);

        $employee->assignRole('employee');
    }
}
