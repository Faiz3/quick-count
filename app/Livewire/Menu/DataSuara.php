<?php

namespace App\Livewire\Menu;

use App\Models\CalonRt;
use App\Models\DataRt;
use App\Models\DataSuara as ModelsDataSuara;
use App\Models\HakPilih;
use Livewire\Component;

class DataSuara extends Component
{
    public $is_create;
    public $is_update;
    public $keterangan;
    public $no_rt;
    public $n = 0;
    public $id;
    public $jumlah_suara;
    public $no_urut;
    public $datasuara = [];
    public $toggles = [];
    public $nocalon = [];
    public $idcalon = [];
    public $clickedButton;
    public $selectNoUrut;
    public $ID;
    public $noUrut;
    public $cek_hak_pilih;

    public function handleClick($n, $noUrut, $ID)
    {
        $this->clickedButton = $n;
        $this->selectNoUrut = $noUrut;
        $this->ID = $ID;
    }

    public function render()
    {
        // dalam 1 RT calon >= 1, maka ambil data banyak calon berdasarkan RT
        $isdata = CalonRt::oldest()->where('keterangan', $this->keterangan)->get();
        $datarts = DataRt::oldest()->get();
        $datasuaras = ModelsDataSuara::oldest()->get();
        $cekk = HakPilih::where('user_id', auth()->user()->id)->first();
        $admin = auth()->user()->isAdmin;
        return view('livewire.menu.data-suara', compact('isdata', 'datarts', 'datasuaras', 'admin', 'cekk'));
    }

    public function mount()
    {
        // Inisialisasi toggle untuk setiap datasuara
        foreach ($this->datasuara as $index => $suara) {
            $this->toggles[$index] = false; // Default state is false
        }
    }

    public function toggleSuara($index)
    {
        $this->toggles[$index] = !$this->toggles[$index];
    }

    // create data
    public function create()
    {
        $userID = auth()->user()->id;
        $pilih_calon = new HakPilih();
        $cek = HakPilih::where('user_id', $userID)->first();
        if (!$cek) {
            $pilih_calon->calon_rt_id = $this->ID;
            $pilih_calon->user_id = $userID;
            $pilih_calon->no_rt = $this->keterangan;
            $pilih_calon->no_urut = $this->selectNoUrut;
            $pilih_calon->save();
        } else {
            $cek = HakPilih::find($cek->id);
            $cek->calon_rt_id = $this->ID;
            $cek->user_id = $userID;
            $pilih_calon->no_rt = $this->keterangan;
            $cek->no_urut = $this->selectNoUrut;
            $cek->save();
        }

        // jumlah suara
        $j_suara = HakPilih::where('no_rt', $this->keterangan)->where('no_urut', $this->selectNoUrut)->get()->count();

        // create or update Data suara
        $data = ModelsDataSuara::where('no_rt', $this->keterangan)->where('no_urut', $this->selectNoUrut)->first();
        if ($data) {
            $data = ModelsDataSuara::find($data->id);
            $n = 0;
            $data->calon_rt_id = $this->ID;
            $data->no_rt = $this->keterangan;
            $data->no_urut = $this->selectNoUrut;
            $data->jumlah_suara = $j_suara;
            $data->save();
        } else {
            $new_data = new ModelsDataSuara();
            $new_data::create([
                'calon_rt_id' => $this->ID,
                'no_rt' => $this->keterangan,
                'no_urut' => $this->selectNoUrut,
                'jumlah_suara' => $j_suara,
            ]);
        }
        $this->is_create = !$this->is_create;
        $this->dispatch('success', ['pesan' => 'Data berhasil dibuat']);
    }

    // update data
    public function update()
    {
        $data = ModelsDataSuara::find($this->id);
        $data->jumlah_suara = $this->jumlah_suara;
        $data->save();
        $this->dispatch('success', ['pesan' => 'Data berhasil diupdate']);
    }

    // delete data
    public function delete($id)
    {
        $data = ModelsDataSuara::find($id);
        $data->delete();
        $this->dispatch('success', ['pesan' => 'Data berhasil di hapus']);
    }

    // on create
    public function onCreate()
    {
        $this->is_create = !$this->is_create;
    }

    // on update
    public function onUpdate($id)
    {
        $data = ModelsDataSuara::find($id);
        $this->id = $data->id;
        $this->no_rt = $data->no_rt;
        $this->no_urut = $data->no_urut;
        $this->jumlah_suara = $data->jumlah_suara;
        $this->is_update = !$this->is_update;
    }
}
