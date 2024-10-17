<?php

namespace Database\Seeders;

use App\Models\Fee_Reminder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Fee_Reminder::create([
            "reminder_name" => 'Demo Reminder',
            "from_date" => date('Y-m-d'),
            "to_date" => date('Y-m-d'),
            "status" => "Scheduling",
            "description" => 'Testing Description of the fee reminder',
            "type" => "Late Fee Reminder",
            "added_from" => 1,
        ]);
    }
}
