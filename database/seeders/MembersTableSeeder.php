<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $firstNames = ['John', 'Amina', 'Mwangi', 'Wanjiku', 'Kevin', 'Fatuma', 'Omondi', 'Chebet', 'Njoroge', 'Atieno'];
        $lastNames = ['Kamau', 'Odhiambo', 'Mutiso', 'Wangari', 'Okoth', 'Njeri', 'Kiprono', 'Ochieng', 'Mwende', 'Wafula'];

        $statuses = ['active', 'penalized', 'dead'];

        // Seed 10 records
        for ($i = 1; $i <= 10; $i++) {
            // Generate a unique ID number
            do {
                $idNumber = 'ID' . rand(1000, 9999);
                $exists = DB::table('members')->where('id_number', $idNumber)->exists();
            } while ($exists);  // Keep generating until it's unique

            // Insert the member with the unique ID number
            DB::table('members')->insert([
                'first_name' => $firstNames[array_rand($firstNames)],
                'last_name' => $lastNames[array_rand($lastNames)],
                'phone_number' => '07' . rand(10000000, 99999999),
                'id_number' => $idNumber,  // Use the unique ID number
                'status' => $statuses[array_rand($statuses)],
                'total_missed_donation' => rand(0, 3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
