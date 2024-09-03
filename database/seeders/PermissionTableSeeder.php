<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Role;
use App\Models\Permission;
use App\Models\User;
use App\Models\PermissionGroup;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $routeCollection = \Route::getRoutes();

       
        foreach ($routeCollection as $value) {
         
            $var = $value->getName();
            if (strpos($var, 'admin') !== false) {
              if (!strpos($var, 'login') !== false && !strpos($var, 'logout') !== false) {
                $permissionGroup = null;


                if (str_contains($var, 'category') ) {
                  $permissionGroup =  PermissionGroup::where('slug','category')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Category' ;
                    $permissionGroup->slug = 'category' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }
                if (str_contains($var, 'manufacturer') ) {
                  $permissionGroup =  PermissionGroup::where('slug','manufacturer')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Manufacturer' ;
                    $permissionGroup->slug = 'manufacturer' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }
                if (str_contains($var, 'product') ) {
                  $permissionGroup =  PermissionGroup::where('slug','product')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Product' ;
                    $permissionGroup->slug = 'product' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }

                if (str_contains($var, 'customer') ) {
                  $permissionGroup =  PermissionGroup::where('slug','customer')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Customer' ;
                    $permissionGroup->slug = 'customer' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }

                if (str_contains($var, 'supplier') ) {
                  $permissionGroup =  PermissionGroup::where('slug','supplier')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Supplier' ;
                    $permissionGroup->slug = 'supplier' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


                if (str_contains($var, 'purchase') ) {
                  $permissionGroup =  PermissionGroup::where('slug','purchase')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Purchase' ;
                    $permissionGroup->slug = 'purchase' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


                if (str_contains($var, 'sale') ) {
                  $permissionGroup =  PermissionGroup::where('slug','sale')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Sale' ;
                    $permissionGroup->slug = 'sale' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


                if (str_contains($var, 'damage') ) {
                  $permissionGroup =  PermissionGroup::where('slug','damage')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Damage' ;
                    $permissionGroup->slug = 'damage' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


                if (str_contains($var, 'user') ) {
                  $permissionGroup =  PermissionGroup::where('slug','user')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'User' ;
                    $permissionGroup->slug = 'user' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


                if (str_contains($var, 'role') ) {
                  $permissionGroup =  PermissionGroup::where('slug','role')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Role' ;
                    $permissionGroup->slug = 'role' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


                if (str_contains($var, 'permission') ) {
                  $permissionGroup =  PermissionGroup::where('slug','permission')->first();
                  if(!$permissionGroup){
                    $permissionGroup = new PermissionGroup();
                    $permissionGroup->name = 'Permission' ;
                    $permissionGroup->slug = 'permission' ;
                    $permissionGroup->status = 1 ;
                    $permissionGroup->save();
                  }
                }


               
              
               
                $permission = new Permission();
                $permission->permission_group_id = $permissionGroup ? $permissionGroup->id : null;
                $permission->route = $value->getName();
                $val = str_replace("."," ",$value->getName());
                $val = str_replace("admin"," ", $val );
                $val = str_replace("-"," ", $val );
                // $val = str_replace("Admin"," ", $val );
                $val = ucwords($val);
                $permission->name = $val ;
                $permission->save();
            }
          }
           
        }
    }
}
