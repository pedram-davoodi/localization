<?php

namespace PedramDavoodi\Localization\Seeders;

namespace Database\Seeders;
use PedramDavoodi\Localization\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() :void
    {
        Setting::insert([
            [
                'key' => 'default-lang',
                'values' => 'fa'
            ],
        ]);
    }
}
