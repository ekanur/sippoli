<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
// use Program;

class Siklus_mikro extends Model
{
    protected $table ="siklus_mikro";

    public function sesi_latihan(){
      return $this->hasMany("App\Sesi_latihan");
    }

    public function program(){
      return $this->belongsTo("App\Program");
    }

    public function namaBulan(){
    	$nama_bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];

    	return $nama_bulan[$this->bulan-1];
    }

    public function fase(){
        $fase="Persiapan Umum";

        $siklus_makro = json_decode($this->program->siklus_makro);

        if ($this->pekan_ke > $siklus_makro->persiapan_umum && $this->pekan_ke <= ($siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus)) {
            $fase = "Persiapan Khusus";
        }elseif($this->pekan_ke > ($siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus) && $this->pekan_ke <= ($siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus+$siklus_makro->pra_kompetisi)){
            $fase = "Pra Kompetisi";
        }elseif($this->pekan_ke > ($siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus+$siklus_makro->pra_kompetisi) && $this->pekan_ke <= ($siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus+$siklus_makro->pra_kompetisi+$siklus_makro->kompetisi)){
            $fase = "Kompetisi";
        }elseif($this->pekan_ke > ($siklus_makro->persiapan_umum+$siklus_makro->persiapan_khusus+$siklus_makro->pra_kompetisi+$siklus_makro->kompetisi)){
            $fase = "Transisi";
        }

        return $fase;
    }
}
