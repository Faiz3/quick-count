<?php

namespace App\Livewire\Menu;

use App\Models\DataRt as ModelsDataRt;
use Livewire\Component;


class DataRt extends Component
{
    public $create;
    public $edit;
    public $no_rt;
    public $alamat;
    public $id;
    public $take = 5;

    public function render()
    {
        $data = ModelsDataRt::latest();

        $datas = $data->paginate($this->take);
        return view('livewire.menu.data-rt', compact('datas'));
    }

    // validasi input
    public function validasi()
    {
        $this->validate([
            'no_rt'=>'required|unique:data_rts,no_rt',
            'alamat'=>'required',
        ]);
    }

    // pesan validasi
    public $messages = [
        'no_rt.required'=>'Wajib diisi',
        'no_rt.unique'=>'No. RT sudah ada!',
    ];

    // update validasi
    public function updated()
    {
        $this->validasi();
    }

    // reset input
    public function resetInput()
    {
        $this->no_rt = null;
        $this->alamat = null;
    }

    // create data
    public function save()
    {
        $this->validasi();
        $rt = new ModelsDataRt();
        $rt->no_rt = $this->no_rt;
        $rt->alamat = $this->alamat;
        $rt->save();
        $this->create = !$this->create;
        $this->dispatch('success', ['pesan'=>'Data berhasil dibuat']);
    }

    // edit data
    public function editData()
    {
        $rt = ModelsDataRt::find($this->id);
        $rt->no_rt = $this->no_rt;
        $rt->alamat = $this->alamat;
        $rt->save();
        $this->edit = !$this->edit;
        $this->dispatch('success', ['pesan'=>'Data berhasil diupdate']);
    }

    // delete data
    public function delete($id)
    {
        $rt = ModelsDataRt::find($id);
        $rt->delete();
        $this->dispatch('success', ['pesan'=>'Data berhasil di hapus']);
    }

    // on create
    public function isCreate()
    {
        $this->create = !$this->create;
    }

    // on edit
    public function isEdit($id)
    {
        $rt = ModelsDataRt::find($id);
        $this->id = $rt->id;
        $this->no_rt = $rt->no_rt;
        $this->alamat = $rt->alamat;
        $this->edit = !$this->edit;
    }
}
