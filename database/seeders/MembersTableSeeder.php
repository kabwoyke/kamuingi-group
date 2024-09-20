<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $genders = ['MALE', 'FEMALE'];

        // Seed 10 records
        for ($i = 1; $i <= 10; $i++) {

            do {
                $idNumber = 'ID' . rand(1000, 9999);
                $exists = DB::table('members')->where('id_number', $idNumber)->exists();
            } while ($exists);

            do {
                $memberNumber = 'MEM' . rand(100000, 999999);
                $exists = DB::table('members')->where('member_number', $memberNumber)->exists();
            } while ($exists);

            DB::table('members')->insert([
                'first_name' => $firstNames[array_rand($firstNames)],
                'last_name' => $lastNames[array_rand($lastNames)],
                'gender' => $genders[array_rand($genders)],
                'phone_number' => '07' . rand(10000000, 99999999),
                'id_number' => $idNumber,
                'member_number' => $memberNumber,
                'status' => $statuses[array_rand($statuses)],
                'total_missed_donation' => rand(0, 3),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
