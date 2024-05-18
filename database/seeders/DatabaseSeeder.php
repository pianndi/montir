<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Gejala;
use App\Models\GejalaArea;
use App\Models\Step;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Super User',
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('rahasia')
        ]);
        // testing gejala
        Gejala::create(['name' => 'Mesin tidak dapat berputar (tidak hidup)']);
        Gejala::create(['name' => 'Tidak terdapat pembakaran awal (tidak hidup)']);
        Gejala::create(['name' => 'Mesin berputar secara normal tetapi sulit dihidupkan']);
        Gejala::create(['name' => 'Terjadi pembakaran intermittent yang tidak sempurna (Tidak hidup)']);
        Gejala::create(['name' => 'Putaran mesin tinggi (Idle buruk)']);
        Gejala::create(['name' => 'Putaran mesin rendah (Idle buruk)']);
        Gejala::create(['name' => 'Idle kasar']);
        Gejala::create(['name' => 'Hunting (Idling buruk)']);
        Gejala::create(['name' => 'Akselerasi tersendat-sendat dan/atau buruk (pengendaraan buruk)']);
        Gejala::create(['name' => 'Surging (Pengendaraan buruk)']);
        Gejala::create(['name' => 'Mesin mati setelah hidup']);
        Gejala::create(['name' => 'Mesin mati hanya pada saat pengoperasian A/C']);
        Gejala::create(['name' => 'MIL malfunction']);

        // testing data area
        Area::create(['name' => 'Baterai']);
        Area::create(['name' => 'Starter assembly (untuk Transmisi Otomatis)']);
        Area::create(['name' => 'Starter assembly (untuk Transmisi Manual)']);
        Area::create(['name' => 'Sirkuit sinyal starter']);
        Area::create(['name' => 'Park/neutral position switch circuit (untuk Transmisi Otomatis)']);
        Area::create(['name' => 'Sirkuit VC output']);
        Area::create(['name' => 'Sistem Immobiliser (dengan Sistem Engine Immobiliser)']);
        Area::create(['name' => 'Sirkuit ECM power source']);
        Area::create(['name' => 'Crankshaft position sensor']);
        Area::create(['name' => 'Sirkuit pengapian']);
        Area::create(['name' => 'Sistem pengapian']);
        Area::create(['name' => 'Fuel pump control circuit']);
        Area::create(['name' => 'Sistem bahan bakar']);
        Area::create(['name' => 'Sirkuit injektor bahan bakar']);
        Area::create(['name' => 'Camshaft position sensor (untuk intake camshaft)']);
        Area::create(['name' => 'Camshaft position sensor (untuk exhaust camshaft)']);
        Area::create(['name' => 'Valve timing']);
        Area::create(['name' => 'Engine coolant temperature sensor']);
        Area::create(['name' => 'Throttle body with motor assembly']);
        Area::create(['name' => 'Sistem intake']);
        Area::create(['name' => 'Busi (Spark plug)']);
        Area::create(['name' => 'Kompresi']);
        Area::create(['name' => 'Fuel line']);
        Area::create(['name' => 'Sirkuit sinyal air conditioning']);
        Area::create(['name' => 'PCV valve dan hose']);
        Area::create(['name' => 'Purge VSV']);
        Area::create(['name' => 'Oxygen sensor']);
        Area::create(['name' => 'Intake air flow meter assembly']);
        Area::create(['name' => 'Knock control sensor']);
        Area::create(['name' => 'Part external malfungsi (menaikkan beban: Sistem A/C, dll.)']);
        Area::create(['name' => 'Sistem kontrol electronic throttle']);
        Area::create(['name' => 'Brake override system']);
        Area::create(['name' => 'Variable valve timing system']);
        Area::create(['name' => 'ECM']);
        Area::create(['name' => 'Sirkuit MIL']);
        Area::create(['name' => 'Sistem meter dan gauge']);

        // gejala area data dummy 

        foreach ([1, 2, 3, 4, 5, 6] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 1]);
        }
        foreach ([6, 7, 8, 9, 10, 11, 12, 13, 18, 19, 20, 21, 22, 23, 24, 25] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 2]);
        }
        foreach ([8, 10, 11, 12, 13, 14, 18, 19, 20, 21, 22, 25] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 3]);
        }
        foreach ([8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 23] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 4]);
        }
        foreach ([8, 18, 19, 20, 24, 25] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 5]);
        }
        foreach ([12, 13, 19, 20, 24, 25] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 6]);
        }
        foreach ([8, 10, 11, 12, 13, 14, 19, 20, 21, 22, 23, 25, 26, 27, 28, 29, 30] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 7]);
        }
        foreach ([20, 25, 27, 28, 31] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 8]);
        }
        foreach ([8, 10, 11, 12, 13, 14, 17, 20, 21, 22, 23, 28, 31, 3] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 9]);
        }
        foreach ([10, 11, 12, 13, 14, 21, 22, 28, 33] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 10]);
        }
        foreach ([8, 10, 11, 12, 13, 14, 20, 21, 22, 25, 28, 31, 33] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 11]);
        }
        foreach ([24, 34] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 12]);
        }
        foreach ([35, 36] as $id) {
            GejalaArea::create(['area_id' => $id, 'gejala_id' => 13]);
        }


        for ($i = 1; $i < 36; $i++) {
            $step_cond = mt_rand(7, 10);
            for ($step = 1; $step <= $step_cond; $step++) {
                Step::create([
                    'area_id' => $i,
                    'name' => fake()->sentence(mt_rand(4, 10), true)
                ]);
            }
        }
    }
}
