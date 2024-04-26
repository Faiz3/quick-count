<?php

namespace App\Livewire\Menu;

use App\Models\CalonRt;
use App\Models\DaftarPemilih;
use App\Models\DataRt;
use Exception;
use Livewire\Component;

class JumlahDaftarPemilih extends Component
{
    public $is_create;
    public $is_update;
    public $take = 5;
    public $no_rt;
    public $jumlah_daftar;
    public $calon_rt_id;
    public $id;
    public $rt;

    // public $calons;

    public function render()
    {
        $data = DaftarPemilih::latest();
        $datas = $data->paginate($this->take);
        $norts = DataRt::latest()->get();
        return view('livewire.menu.jumlah-daftar-pemilih', compact('datas', 'norts'));
    }

    public function mount()
    {
        $this->rt = DataRt::oldest()->get();
    }

    // pesan
    protected $messages = [
        'no_rt.required'=>'Wajib diisi',
        'no_rt.unique'=>'No RT sudah ada',
    ];

    // validasi
    public function validasi()
    {
        $this->validate([
            'no_rt'=>'required|unique:daftar_pemilihs,no_rt',
            'jumlah_daftar'=>'required',
        ]);
    }

    public function updated()
    {
        $this->validasi();
    }

    // create data
    public function create()
    {
        $this->validasi();
        try{
            $data = new DaftarPemilih();
            $data->calon_rt_id = CalonRt::where('keterangan', $this->no_rt)->first()->id;
            $data->no_rt = $this->no_rt;
            $data->jumlah_daftar = $this->jumlah_daftar;
            $data->save();
            $this->dispatch('success', ['pesan'=>'Data berhasil disimpan']);
            $this->is_create = !$this->is_create;
        } catch(Exception $e)
        {
            $this->addError('no_rt', 'Tambah calon RT terlebih dahulu');
            // $this->dispatch();
        }
    }

    // update data
    public function update()
    {
        $data = DaftarPemilih::find($this->id);
        $data->no_rt = $this->no_rt;
        $data->jumlah_daftar = $this->jumlah_daftar;
        $data->save();
        $this->dispatch('success', ['pesan'=>'Data berhasil di update']);
        $this->is_update = !$this->is_update;
    }

    // delete data
    public function delete($id)
    {
        $data = DaftarPemilih::find($id);
        $data->delete();
        $this->dispatch('success', ['pesan'=>'Data berhasil dihapus']);
    }

    // on create
    public function onCreate()
    {
        $this->is_create = !$this->is_create;
    }

    // on update
    public function onUpdate($id)
    {
        $data = DaftarPemilih::find($id);
        $this->id = $data->id;
        $this->no_rt = $data->no_rt;
        $this->jumlah_daftar = $data->jumlah_daftar;
        $this->is_update = !$this->is_update;
    }
}
