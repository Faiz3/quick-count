<?php

namespace App\Livewire\Menu;

use App\Models\CalonRt;
use App\Models\DataRt;
use Exception;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage; // Added this import

class NamaCalonRt extends Component
{
    use WithFileUploads;

    public $is_create;
    public $is_update;
    public $take = 5;
    public $id;
    public $nama_calon;
    public $no_urut;
    public $jenis_kelamin;
    public $keterangan;
    public $foto_calon;
    public $no_hp;
    public $alamat;

    public function render()
    {
        $data = CalonRt::latest();
        $datas = $data->paginate($this->take);
        $datarts = DataRt::latest()->get();
        $admin = auth()->user()->isAdmin;
        return view('livewire.menu.nama-calon-rt', compact('datas', 'datarts', 'admin'));
    }

    public $messages = [
        'nama_calon.required' => 'Wajib diisi',
        'no_urut.required' => 'Wajib diisi',
        'jenis_kelamin.required' => 'Wajib diisi',
        'keterangan.required' => 'Wajib diisi',
        'foto_calon.required' => 'Wajib diisi',
        'no_hp.required' => 'Wajib diisi',
        'alamat.required' => 'Wajib diisi',
    ];

    public function validasi()
    {
        $this->validate([
            'nama_calon' => 'required',
            'no_urut' => 'required',
            'jenis_kelamin' => 'required',
            'keterangan' => 'required',
            'foto_calon' => 'required|image|max:1024',
            'no_hp' => 'required',
            'alamat' => 'required',
        ]);
        $cek = CalonRt::where('keterangan', $this->keterangan)->first();
        if ($cek) {
            if ($cek->no_urut == $this->no_urut) {
                $this->addError('no_urut', 'no urut ' . $this->no_urut . ' suda ada di RT.' . $this->keterangan);
                return;
            }
        }
    }

    public function updated()
    {
        $this->validasi();
    }

    public function resetInput()
    {
        $this->nama_calon = null;
        $this->no_urut = null;
        $this->jenis_kelamin = null;
        $this->keterangan = null;
        $this->foto_calon = null;
        $this->no_hp = null;
        $this->alamat = null;
    }

    public function create()
    {
        try {
            $this->validasi();
            $rt = new CalonRt();
            $cek = CalonRt::where('keterangan', $this->keterangan)->first();
            $rt->nama_calon = $this->nama_calon;
            $rt->keterangan = $this->keterangan;
            if ($cek) {
                if ($cek->no_urut == $this->no_urut) {
                    $this->addError('no_urut', 'no urut' . $this->no_urut . 'sudah ada di RT. ' . $this->keterangan);
                    return;
                } else {
                    $rt->no_urut = $this->no_urut;
                }
            } else {
                $rt->no_urut = $this->no_urut;
            }
            $rt->jenis_kelamin = $this->jenis_kelamin;
            $rt->foto = $this->uploadFoto();
            $rt->no_hp = $this->no_hp;
            $rt->alamat = $this->alamat;
            $rt->save();
            $this->is_create = !$this->is_create;
            $this->dispatch('success', ['pesan' => 'Data berhasil dibuat']);
            $this->resetInput();
        } catch (Exception $e) {
            @dd($e);
        }
    }

    public function update()
    {
        $this->validasi();
        $calon = CalonRt::find($this->id);
        $calon->nama_calon = $this->nama_calon;
        $calon->no_urut = $this->no_urut;
        $calon->jenis_kelamin = $this->jenis_kelamin;
        $calon->keterangan = $this->keterangan;
        if ($this->foto_calon) {
            $calon->foto = $this->uploadFoto();
        }
        $calon->no_hp = $this->no_hp;
        $calon->alamat = $this->alamat;
        $calon->save();
        $this->is_update = !$this->is_update;
        $this->dispatch('success', ['pesan' => 'Data berhasil di update']);
        $this->resetInput();
    }

    private function uploadFoto()
    {
        return Storage::disk('public')->put('fotos', $this->foto_calon);
    }

    public function delete($id)
    {
        $rt = CalonRt::find($id);
        $rt->delete();
        $this->dispatch('success', ['pesan' => 'Data berhasil di hapus']);
    }

    public function onCreate()
    {
        $this->is_create = !$this->is_create;
    }

    public function onUpdate($id)
    {
        $calon = CalonRt::find($id);
        $this->id = $calon->id;
        $this->nama_calon = $calon->nama_calon;
        $this->no_urut = $calon->no_urut;
        $this->jenis_kelamin = $calon->jenis_kelamin;
        $this->keterangan = $calon->keterangan;
        $this->foto_calon = $calon->foto;
        $this->no_hp = $calon->no_hp;
        $this->alamat = $calon->alamat;
        $this->is_update = !$this->is_update;
    }

    public function onDelete()
    {
        // Implement delete logic if needed
    }
}
