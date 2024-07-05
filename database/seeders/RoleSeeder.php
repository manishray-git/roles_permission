<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $roles = [
        ['role_name'=>'Super Admin', 'description'=>'this is super admin']
        ,['role_name'=>'Vendor Admin','description'=>""]
        ,['role_name'=>'Vendor Staff','description'=>""]
        ,['role_name'=>'Customer','description'=>""]
        ,['role_name'=>'Customer Support','description'=>'']
        ,['role_name'=>'Content Manager','description'=>'']
        ,['role_name'=>'Marketing Manager','description'=>'']
        ,['role_name'=>'Finance Manager','description'=>'']
        ,['role_name'=>'Inventory Manager','description'=>'']
        ,['role_name'=>'Shipping Manager','description'=>'']
        ,['role_name'=>'IT Support','description'=>'']
        ,['role_name'=>'Compliance Officer','description'=>'']
    ];


    foreach ($roles  as $key => $role) {
        Role::insert($role);
    }
       
    }
}
