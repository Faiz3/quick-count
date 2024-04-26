<?php

namespace App\Livewire\Dashboard;

use App\Models\DataRt;
use App\Models\CalonRt;
use Livewire\Component;
use App\Models\DaftarPemilih;
use Illuminate\Support\Facades\DB;

class Dashboard extends Component
{
    public $count;
    public $calon;
    public $daftar_pemilih;
    public $pesertas;
    public $is_dashboard = false;
    public $is_datart = false;
    public $is_nama_calonrt = false;
    public $is_jumlah_daftar_pemilih = false;
    public $is_data_suara = false;
    public $is_rekapitulasi_data_suara = false;
    public $is_user = false;

    public function render()
    {
        $this->count = DataRt::with('data_rts')->count();
        $this->calon = CalonRt::with('calon_rts')->count();
        $this->daftar_pemilih = DB::table('daftar_pemilihs')->select('jumlah_daftar')->get();
        return view('livewire.dashboard.dashboard');
    }

    // logout
    public function logout()
    {
        auth()->logout();
        redirect('/');
    }

    // dashboard
    public function clickOne()
    {
        $this->is_dashboard = true;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_rekapitulasi_data_suara = false;
        $this->is_user = false;
    }

    // data rt
    public function clickTwo()
    {
        $this->is_datart = true;
        $this->is_dashboard = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_rekapitulasi_data_suara = false;
        $this->is_user = false;
    }

    // nama calon rt
    public function clickThree()
    {
        $this->is_nama_calonrt = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_rekapitulasi_data_suara = false;
        $this->is_user = false;
    }

    // jumlah daftar pemilih
    public function clickFour()
    {
        $this->is_jumlah_daftar_pemilih = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_data_suara = false;
        $this->is_rekapitulasi_data_suara = false;
        $this->is_user = false;
    }

    // data suara
    public function clickFive()
    {
        $this->is_data_suara = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_rekapitulasi_data_suara = false;
        $this->is_user = false;
    }

    // rekapitulasi data suara
    public function clickSix()
    {
        $this->is_rekapitulasi_data_suara = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_user = false;
    }
    
    // tambah user
    public function clickSeven()
    {
        $this->is_user = true;
        $this->is_rekapitulasi_data_suara = false;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
    }
}
