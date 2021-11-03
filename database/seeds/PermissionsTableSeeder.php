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
            'employees'
        ];

        foreach ($groups as $group) {
            $group_id = Permission::create(['name' => $group]);
            
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-view']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-list']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-create']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-edit']);
            Permission::create(['parent_id' => $group_id->id, 'name' => $group . '-delete']);
        }
    }
}
