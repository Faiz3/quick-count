<?php

namespace App\Livewire;

use Livewire\Component;

class Home extends Component
{
    public $is_dashboard = true;
    public $is_datart = false;
    public $is_tambah_user = false;
    public $is_nama_calonrt = false;
    public $is_jumlah_daftar_pemilih = false;
    public $is_data_suara = false;
    public $is_rekapitulasi_data_suara = false;

    public function render()
    {
        return view('livewire.home');
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
        $this->is_tambah_user = false;
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
        $this->is_tambah_user = false;
        $this->is_tambah_user = true;
        $this->is_data_suara = false;
    }
}
