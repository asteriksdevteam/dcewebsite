<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'Super Admin',
            'Home Manager',
            'About-us-Manager',
            'Services-Manager',
            'Blogs Manager',
            'Contact us Manager',
            'Meta Tags Manager',
            'Packages Manager',
            'Discounted Offer Manager',
            'Other Pages Manager',
            'Roles Managers'
         ];
      
        foreach ($permissions as $permission) {
            Role::create(['name' => $permission]);
        }
    }
}
