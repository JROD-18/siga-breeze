<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelHasRolesTableSeeder extends Seeder
{
    public function run()
    {
        $modelRoles = [
            ['role_id' => 2, 'model_type' => 'App\Models\User', 'model_id' => 2],
            ['role_id' => 4, 'model_type' => 'App\Models\User', 'model_id' => 1],
            ['role_id' => 4, 'model_type' => 'App\Models\User', 'model_id' => 3],
        ];

        foreach ($modelRoles as $modelRole) {
            DB::table('model_has_roles')->insert($modelRole);
        }
    }
}

