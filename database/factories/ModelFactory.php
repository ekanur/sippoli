<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Program::class, function (Faker\Generator $faker) {
  $jangka = array(3, 6, 12);
  $durasi = $jangka[array_rand($jangka, 1)];
  $pekan = $durasi * 4;
  $mulai_program = new DateTime(date('Y/m/d', strtotime($faker->DateTimeBetween('- 1 years', '+ 1 years')->format('Y-m-d'))));
  $berakhir_program = date('Y-m-d', strtotime($mulai_program->format('Y-m-d') . '+ '.($durasi).' months'));

  $groups = array();
  $i = 0;
  do {
    $groups[$i] = rand(1, $pekan*0.25);
    $i++;
    if ($i == 5) {
      $i = 0;
    }
  } while (array_sum($groups) != $pekan);
  rsort($groups);

    return [
        'nama' => 'Program Latihan Nomor '. date('his') . $faker->randomNumber(6, true),
        'deskripsi' => $faker->sentence,
        'jangka_durasi' => $durasi,
        'pelatih_id' => 1,
        'mulai_program' => $mulai_program,
        'berakhir_program' => $berakhir_program,
        'siklus_makro' => '{"persiapan_umum":"'. $groups[1] .'","persiapan_khusus":"'. $groups[0] .'","pra_kompetisi":"'. $groups[2] .'","kompetisi":"'. $groups[3] .'","transisi":"'. $groups[4] .'"}',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ];
});

$factory->define(App\Cabor::class, function(Faker\Generator $faker) {
  $kategori = array('permainan','atletik','bela diri','senam','lainnya');
  return [
    'nama' => $faker->word,
    'kategori' => $kategori[array_rand($kategori, 1)],
  ];
});

$factory->define(App\Atlet::class, function (Faker\Generator $faker) {
  $gender = array('L', 'P');
  return [
    'nama' => $faker->name,
    'gender' => $gender[array_rand($gender, 1)],
    'tgl_lahir' => $faker->dateTimeBetween('- 25 years', '- 18 years'),
    'status' => $faker->word,
    'cabor_id' => App\Cabor::all()->random()->id,
    'pelatih_id' => 1,
    'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    'updated_at' => $faker->dateTimeBetween('now', 'now'),
  ];
});

$factory->define(App\List_latihan::class, function(Faker\Generator $faker) {
  $kategori = array('Latihan Fisik', 'Latihan Cabor');
  return [
    'nama' => $faker->sentence(2),
    'kategori' => $kategori[array_rand($kategori, 1)],
    'deskripsi' => $faker->sentence,
    'video' => $faker->sentence(3),
    'pelatih_id' => 1,
    'cabor_id' => App\Cabor::all()->random()->id,
    'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    'updated_at' => $faker->dateTimeBetween('now', 'now'),
  ];
});

$factory->define(App\List_makanan::class, function(Faker\Generator $faker) {
  $kategori = array('karbohidrat','protein','vitamin','mineral','air', 'lemak');
  return [
    'nama' => $faker->sentence(2),
    'kategori' => $kategori[array_rand($kategori, 1)],
    'pelatih_id' => 1,
    'kalori' => $faker->randomNumber(2),
    'created_at' => $faker->dateTimeBetween('-1 years', 'now'),
    'updated_at' => $faker->dateTimeBetween('now', 'now'),
  ];
});
