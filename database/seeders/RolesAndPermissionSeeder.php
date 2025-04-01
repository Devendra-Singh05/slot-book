<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
                // Roles बनाएं (Duplicate Entry से बचने के लिए firstOrCreate() का उपयोग करें)
                $admin = Role::firstOrCreate(['name' => 'admin']);
                $service_provider = Role::firstOrCreate(['name' => 'service_provider']);
                $user = Role::firstOrCreate(['name' => 'user']);
                
                // Permissions बनाएं
        $permissions = [
            'edit',
            'delete',
            'view',
            'add',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }


         // Permissions को असाइन करें
         $admin->givePermissionTo($permissions);
         $service_provider->givePermissionTo([$permissions]);
         $user->givePermissionTo(['view','add']);
    }
}