<?php

namespace Database\Seeders;

use App\Models\PusherSetting;
use Illuminate\Database\Seeder;

class PusherSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (! PusherSetting::exists()) {
            PusherSetting::create([
                'pusher_app_id' => '',
                'pusher_key' => '',
                'pusher_secret' => '',
                'pusher_cluster' => 'us',
            ]);
        }
    }
}
