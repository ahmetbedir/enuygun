<?php
namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 5; $i++) {
            Developer::create([
                'name' => 'DEV' . $i,
                'level' => $i,
            ]);
        }
    }
}
