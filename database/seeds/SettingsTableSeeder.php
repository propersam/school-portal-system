<?php

use App\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!is_object(Setting::where(['name' => 'paystack_key'])->first())) {
            DB::table('settings')->insert(['name' => 'paystack_key', 'value' => 'pk_1234567890']);
        }
    }
}
