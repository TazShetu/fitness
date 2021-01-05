<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $ps = [
            0 => ["permission", "Permission", "Permission menu that goes under ACL"],
            1 => ["role", "Role", "Role menu that goes under ACL"],
            2 => ["user", "User", "User menu that goes under ACL"],
            3 => ["video_category", "Video Category", "Category menu that goes under Videos"],
            4 => ["video_sub_category_one", "Sub Category One", "Sub Category One menu that goes under Images"],
            5 => ["video_sub_category_two", "Sub Category Two", "Sub Category Two menu that goes under Images"],
        ];
        $superAdmin = Role::find(2);
        $admin = Role::find(3);
        foreach ($ps as $p){
            $a = new Permission;
            $a->name = $p[0];
            $a->display_name = $p[1];
            $a->description = $p[2];
            $a->save();
            $superAdmin->attachPermission($a);
            $admin->attachPermission($a);
        }
    }
}
