<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use App\Models\ApiClient;


class ApiClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $plainToken = Str::random(60);
        ApiClient::create([
            'name' => 'Schoolpro',
            'token_hash' => Hash::make($plainToken),
        ]);

        echo "Save this token in Schoolpro's .env:\n$plainToken\n";

    }
}
