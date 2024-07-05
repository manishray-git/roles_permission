<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allRoles = Role::all()->keyBy('id');
        $permissions  = [
            'users-manage'=>[Role::Super_Admin],
             'product-manage'=>[Role::Vendor_Admin]
        ];

        foreach( $permissions as $key => $roles){
            $permission = Permission::create(['name'=>$key]);
            foreach($roles as $role){
             $allRoles[$role]->permissions()->attach($permission->id);
           
            }
        }
         
    }
}
