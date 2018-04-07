<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Cabor::class, 10)->create();
      factory(App\Atlet::class, 35)->create();
      factory(App\List_latihan::class, 20)->create();
      factory(App\List_makanan::class, 40)->create();
      factory(App\Program::class, 10)->create()->each(function ($program){
        $faker = Faker\Factory::create();
        $tanggal_mulai_program = $program->mulai_program->format('Y-m-d');

        $kebutuhan_energi = new App\Kebutuhan_energi;
        $kebutuhan_energi->program_id = $program->id;
        $kebutuhan_energi->json_kebutuhan_per_siklus_makro = '{"persiapan_umum":"'.rand(1,99).'","persiapan_khusus":"'.rand(1,99).'","pra_kompetisi":"'.rand(1,99).'","kompetisi":"'.rand(1,99).'","transisi":"'.rand(1,99).'"}';
        $kebutuhan_energi->save();

        for ($i=0; $i < rand(1, 10); $i++) {
          $program->atlet()->attach(App\Atlet::all()->random()->id);
        }

        foreach ($program->atlet as $key => $atlet) {
          foreach (dateRange($tanggal_mulai_program, $program->jangka_durasi*30) as $key => $date) {
            $waktu_makan = array('pagi', 'siang', 'malam');
            foreach ($waktu_makan as $key => $waktu) {
              for ($j=0; $j < rand(2, 4); $j++) {
                $makanan = App\List_makanan::all()->random();
                $makan = new App\Program_makanan;
                $makan->tanggal = $date;
                $makan->waktu = $waktu;
                $makan->program_id = $program->id;
                $makan->atlet_id = $atlet->id;
                $makan->list_makanan_id = $makanan->id;
                $makan->qty = rand(2, 8);
                $makan->total_kalori = $makanan->kalori * $makan->qty;
                $makan->save();
              }
            }
          }
        }

        $pekan = $program->jangka_durasi * 4;
        for ($i=0; $i < $pekan; $i++) {
          $siklus = new App\Siklus_mikro;
          $siklus->program_id = $program->id;
          $siklus->json_volume_intensitas = '{"volume":"'.rand(0, 100).'","intensitas":"'.rand(0, 100).'","peaking":"'.rand(0, 100).'"}';
          $siklus->pekan_ke = $i+1;
          $siklus->save();

          for ($j=0; $j < rand(3, 7); $j++) {
            $kriteria = array('rendah', 'sedang', 'berat');
            $tgl_awal = new \DateTime($program->mulai_program->format('Y-m-d'));
            $tgl_akhir = clone($tgl_awal);
            $tgl_akhir = $tgl_akhir->add(new \DateInterval('P7D'));
            $tanggal_sesi_latihan = $faker->dateTimeBetween($tgl_awal, $tgl_akhir);

            $sesi_latihan = new App\Sesi_latihan;
            $sesi_latihan->siklus_mikro_id = $siklus->id;
            $sesi_latihan->json_materi_latihan = '["'.$faker->word.'", "'.$faker->word.'"]';
            $sesi_latihan->json_intensitas_max = '["'.$faker->randomNumber(2).'", "'.$faker->randomNumber(2).'"]';
            $sesi_latihan->json_volume_max = '["'.$faker->randomNumber(2).'", "'.$faker->randomNumber(2).'"]';
            $sesi_latihan->kriteria_volume_intensitas = $kriteria[array_rand($kriteria, 1)];
            $sesi_latihan->tanggal = $tanggal_sesi_latihan;
            $sesi_latihan->save();

            for ($k=0; $k < 3; $k++) {
              $waktu = array('pagi', 'siang', 'sore');
              $jenis_latihan = array('pemanasan', 'inti', 'pendinginan');
              $latihan = new App\Program_latihan;
              $latihan->sesi_latihan_id = $sesi_latihan->id;
              $latihan->list_latihan_id = App\List_latihan::all()->random()->id;
              $latihan->volume = $faker->randomNumber(2);
              $latihan->intensitas = $faker->randomNumber(2);
              $latihan->waktu = $waktu[$k];
              $latihan->jenis_latihan = $jenis_latihan[array_rand($jenis_latihan, 1)];
              $latihan->save();
            }
          }

        }
      });
    }
}
