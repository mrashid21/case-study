<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $groups = [
            'users',
            'roles',
            'employees',
            'employers',
            'addresses'
        ];

        foreach ($groups as $group) {
            $group_id = Permission::create(['name' => $group]);
            
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-view']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-list']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-create']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-edit']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-delete']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-history']);
        }

        $employee = Role::create(['name' => 'employee']);
        $employee_permissions = Permission::where('name', 'employees-view')->pluck('id', 'id');
        $employee->syncPermissions($employee_permissions);

        $employer = Role::create(['name' => 'employer']);
        $employer_permissions = Permission::where('name', 'like', 'employees%')
            // ->where('name', 'like', 'addresses%')
            ->where('parent_id', '!=', null)->pluck('id', 'id');
        $employer->syncPermissions($employer_permissions);
    }
}
