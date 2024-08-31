<?php

namespace Database\Seeders;

use Carbon\Carbon;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Misc
        $miscPermission = Permission::create(['name' => 'N/A']);

        // CREATE ROLES
        $residentRole = Role::create(['name' => 'Resident'])->syncPermissions([
            $miscPermission,
        ]);
        $guestRole = Role::create(['name' => 'Guest'])->syncPermissions([
            $miscPermission,
        ]);
        $adminRole = Role::create(['name' => 'Admin'])->syncPermissions([
            $miscPermission,
        ]);


        for ($i = 1; $i <= 1; $i++) {
            User::create([
                'first_name' => "Paul",
                'middle_name' => "Pascua",
                'last_name' => "Don",
                'birth_date' => Carbon::parse('1995-01-01'),
                'mobile_number' => '09754759365',
                'address' => 'Pampanga',
                'car_brand' => 'Toyota',
                'body_type_id' => 1,
                'car_color' => 'Red',
                'car_license_plate' => 'A11',
                'username' => 'paul',
                'password' => Hash::make('admin123'),
            ])->assignRole($residentRole);
        }

        for ($i = 1; $i <= 1; $i++) {
            User::create([
                'first_name' => "Juan",
                'middle_name' => "Dizon",
                'last_name' => "Dela Cruz",
                'birth_date' => Carbon::parse('1995-01-01'),
                'mobile_number' => '09354759365',
                'address' => 'Pampanga',
                'car_brand' => 'none',
                'body_type_id' => null,
                'car_color' => 'none',
                'car_license_plate' => 'none',
                'username' => 'admin',
                'password' => Hash::make('admin123'),
            ])->assignRole($adminRole);
        }
    }
}
