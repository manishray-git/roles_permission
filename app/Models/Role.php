<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Permission;

class Role extends Model
{
    use HasFactory;

    const Super_Admin = 1 ;
    const Vendor_Admin = 2;

    const Vendor_Staff =3;

    protected $fillable = ['role_name','description'];


    public function permissions(){
       return $this->belongsToMany(Permission::class);
    }

}
