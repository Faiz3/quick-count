<?php

namespace App\Livewire\Menu;

use App\Models\DataRt;
use App\Models\CalonRt;
use Livewire\Component;
use App\Models\DataSuara;
use App\Models\DaftarPemilih;

class RekapitulasiDataSuara extends Component
{
    public $is_dashboard = false;
    public $is_datart = false;
    public $is_tambah_user = false;
    public $is_nama_calonrt = false;
    public $is_jumlah_daftar_pemilih = false;
    public $is_data_suara = false;
    public $is_rekapitulasi_data_suara = false;
    public $n = 0;
    public $suara = [];
    public $cari;
    public $nama;
    public $no;
    public $ar;
    public $namacalon;
    public $nos = [];
    public $jdaftar;
    public $srt = [];
    public $sarray = [];
    public $persamaan = 0;

    public function render()
    {
        $datas = CalonRt::oldest()->get();
        $rt = DataRt::oldest()->get();
        $datas1 = CalonRt::oldest()->get();
        $datarekaps = DataSuara::oldest()->get();
        return view('livewire.menu.rekapitulasi-data-suara', compact('datas', 'datarekaps', 'datas1', 'rt'));
    }

    // cetak
    public function cetak()
    {
        redirect('app/cetak');
    }

     // logout
     public function logout()
     {
         auth()->logout();
         redirect('/');
     }

    public function rekapData($id)
    {
        $data = DataSuara::where('calon_rt_id', $id)->first();
        return $data;
    }

    public function daftarPemilih($no)
    {
        $data = DaftarPemilih::where('no_rt', $no)->first();
        return $data;
    }

    public function dataNoRt($no)
    {
        $data = DataSuara::where('no_rt', $no)->first();
        return $data;
    }


    // dashboard
    public function clickOne()
    {
        $this->is_dashboard = true;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_tambah_user = false;
        $this->is_rekapitulasi_data_suara = false;
    }

    // data rt
    public function clickTwo()
    {
        $this->is_datart = true;
        $this->is_dashboard = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_tambah_user = false;
        $this->is_rekapitulasi_data_suara = false;
    }

    // nama calon rt
    public function clickThree()
    {
        $this->is_nama_calonrt = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_data_suara = false;
        $this->is_tambah_user = false;
        $this->is_rekapitulasi_data_suara = false;
    }

    // jumlah daftar pemilih
    public function clickFour()
    {
        $this->is_jumlah_daftar_pemilih = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_data_suara = false;
        $this->is_tambah_user = false;
        $this->is_rekapitulasi_data_suara = false;
    }

    // data suara
    public function clickFive()
    {
        $this->is_data_suara = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_tambah_user = false;
        $this->is_rekapitulasi_data_suara = false;
    }

    // rekapitulasi data suara
    public function clickSix()
    {
        $this->is_rekapitulasi_data_suara = true;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_tambah_user = false;
        $this->is_data_suara = false;
    }
    public function clickSeven()
    {
        $this->is_rekapitulasi_data_suara = false;
        $this->is_dashboard = false;
        $this->is_datart = false;
        $this->is_nama_calonrt = false;
        $this->is_jumlah_daftar_pemilih = false;
        $this->is_tambah_user = true;
        $this->is_data_suara = false;
    }
}
