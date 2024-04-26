<?php

namespace App\Livewire\Menu;

use App\Models\CalonRt;
use App\Models\DataRt;
use App\Models\DataSuara as ModelsDataSuara;
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
    public $nocalon = [];
    public $idcalon = [];

    public function render()
    {
        // dalam 1 RT calon >= 1, maka ambil data banyak calon berdasarkan RT
        $isdata = CalonRt::oldest()->where('keterangan', $this->keterangan)->get();
        $datarts = DataRt::oldest()->get();
        $datasuaras = ModelsDataSuara::oldest()->get();
        return view('livewire.menu.data-suara', compact('isdata', 'datarts', 'datasuaras'));
    }

    // create data
    public function create()
    {
        $datasuara = $this->datasuara;
        $nocalon = $this->nocalon;
        $idcalon = $this->idcalon;
        $new_data = new ModelsDataSuara();
        $cariid = CalonRt::where('keterangan', $this->keterangan)->orderBy('no_urut', 'DESC')->get();
        $n = 0;
        foreach($datasuara as $suara){
            $new_data->no_rt = $this->keterangan;
            $new_data->no_urut = $nocalon[$n];
            $new_data->jumlah_suara = $suara;
            $new_data::create([
                'calon_rt_id'=>$idcalon[$n],
                'no_rt'=>$this->keterangan,
                'no_urut'=>$nocalon[$n],
                'jumlah_suara'=>$suara,
            ]);
            $n++;
        }
        $this->is_create = !$this->is_create;
        $this->dispatch('success', ['pesan'=>'Data berhasil dibuat']);
    }

    // update data
    public function update()
    {
        $data = ModelsDataSuara::find($this->id);
        $data->jumlah_suara = $this->jumlah_suara;
        $data->save();
        $this->dispatch('success', ['pesan'=>'Data berhasil diupdate']);
    }

    // delete data
    public function delete($id)
    {
        $data = ModelsDataSuara::find($id);
        $data->delete();
        $this->dispatch('success', ['pesan'=>'Data berhasil di hapus']);
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
