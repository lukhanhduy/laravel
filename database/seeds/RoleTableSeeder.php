<?php

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insertData = [ "modules" => ["dashboard","users","roles"] ];
        
        DB::table('roles')->insert([
            'role_id' => 1,
            'role_name' => "Super Admin",
            'status' => 1
        ]);
        $modules =[];
        $permissions = [];
        foreach ($insertData["modules"] as $key => $value) {
            $modules[] = [
                "module_id" => $key + 1,
                'module_name' => $value,
                "slug"=> $value,
                "icon" => "",
                "parent_id" => null,
                'status' => 1
            ];
            $permissions[] = [
                'permission_id' => $key +  1,
                'role_id' =>  1,
                'module_id' => $key + 1,
                'status' => 1,
                'rules'=> json_encode(["view","add","update","delete","import","export"])
            ];
        }
        DB::table('modules')->insert($modules);
        DB::table('permissions')->insert($permissions);
        DB::table('admins')->insert([
            'user_id' => 1,
            'first_name' => 'Lu',
            'last_name' => 'Khanh Duy',
            'email' => 'info@lukhanhduy.com',
            'role_id'=> 1,
            'password' => bcrypt('123456'),
        ]);
    }
}
