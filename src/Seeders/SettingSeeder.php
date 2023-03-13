<?php

namespace PedramDavoodi\Localization\Seeders;

namespace Database\Seeders;
use PedramDavoodi\Localization\Models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::insert([
            [
                'key' => 'default-lang',
                'values' => 'fa'
            ],
        ]);
    }
}
