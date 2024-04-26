<?php

namespace App\Livewire\Menu;

use App\Models\CalonRt;
use App\Models\DataRt;
use Livewire\Component;

class NamaCalonRt extends Component
{
    public $is_create;
    public $is_update;
    public $take = 5;
    public $id;
    public $nama_calon;
    public $no_urut;
    public $jenis_kelamin;
    public $keterangan;

    public function render()
    {
        $data = CalonRt::latest();
        $datas = $data->paginate($this->take);
        $datarts = DataRt::latest()->get();
        return view('livewire.menu.nama-calon-rt', compact('datas' , 'datarts'));
    }

    // mesage
    public $messages = [
        'nama_calon.required'=>'Wajib diisi',
        'no_urut.required'=>'Wajib diisi',
        'jenis_kelamin.required'=>'Wajib diisi',
        'keterangan.required'=>'Wajib diisi',
    ];

    // validasi
    public function validasi()
    {
        $this->validate([
            'nama_calon'=>'required',
            'no_urut'=>'required',
            'jenis_kelamin'=>'required',
            'keterangan'=>'required',
        ]);
        $cek = CalonRt::where('keterangan', $this->keterangan)->first();
        if($cek)
        {
            if($cek->no_urut == $this->no_urut)
            {
                $this->addError('no_urut', 'no urut '.$this->no_urut.' suda ada di RT.'.$this->keterangan);
                return;
            }
        }
    }

    public function updated()
    {
        $this->validasi();
    }

    // reset input
    public function resetInput()
    {
        $this->nama_calon = null;
        $this->no_urut = null;
        $this->jenis_kelamin = null;
        $this->keterangan = null;
    }

    // create
    public function create()
    {
        $rt = new CalonRt();
        // cek no urut, no urut tidak boleh sama dalam satu rt
        $cek = CalonRt::where('keterangan', $this->keterangan)->first();
        $rt->nama_calon = $this->nama_calon;
        $rt->keterangan = $this->keterangan;
        if($cek){
            // @dd($cek);
            // cek no urut
            if($cek->no_urut == $this->no_urut){
                $this->addError('no_urut', 'no urut' . $this->no_urut . 'sudah ada di RT. ' . $this->keterangan);
                return;
            }
            else
            {
                $rt->no_urut = $this->no_urut;
            }
        }
        else
        {
            $rt->no_urut = $this->no_urut;
        }
        $rt->jenis_kelamin = $this->jenis_kelamin;
        $rt->save();
        $this->is_create = !$this->is_create;
        $this->dispatch('success', ['pesan'=>'Data berhasil dibuat']);
        $this->resetInput();
    }

    // update
    public function update()
    {
        $calon = CalonRt::find($this->id);
        // $calon->id = $this->id;
        $calon->nama_calon = $this->nama_calon;
        $calon->no_urut = $this->no_urut;
        $calon->jenis_kelamin = $this->jenis_kelamin;
        $calon->keterangan = $this->keterangan;
        $calon->save();
        $this->is_update = !$this->is_update;
        $this->dispatch('success', ['pesan'=>'Data berhasil di update']);
        $this->resetInput();
    }

    // delete
    public function delete($id)
    {
        $rt = CalonRt::find($id);
        $rt->delete();
        // return back();
        // $this->dispatch('deletes', ['pesan'=>'test']);
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
        $calon = CalonRt::find($id);
        $this->id = $calon->id;
        $this->nama_calon = $calon->nama_calon;
        $this->no_urut = $calon->no_urut;
        $this->jenis_kelamin = $calon->jenis_kelamin;
        $this->keterangan = $calon->keterangan;
        $this->is_update = !$this->is_update;
    }

    // on delete
    public function onDelete()
    {

    }
}
