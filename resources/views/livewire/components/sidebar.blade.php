<div>

    <a class="navbar-brand" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-4">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('app') ? 'active' : '' }}" aria-current="page" href="{{ url('app/') }}"> <i class="bi bi-house-door-fill me-2 fs-2"></i>Dashboard</a>
        </li>
        <li class="nav-item">
          <a wire:click="clickTwo" class="nav-link" href="#"><i class="bi bi-person-lines-fill me-2 fs-2"></i>Data RT</a>
        </li>
        <li class="nav-item">
          <a wire:click="clickThree" class="nav-link" href="#"><i class="bi bi-person-workspace me-2 fs-2"></i>Daftar Calon</a>
        </li>
        <li class="nav-item">
          <a wire:click="clickFour" class="nav-link" href="#"><i class="bi bi-person-fill-check me-2 fs-2"></i>Daftar Pemilih</a>
        </li>
        <li class="nav-item">
          <a wire:click="clickFive" class="nav-link" href="#"><i class="bi bi-archive-fill me-2 fs-2"></i>Data Suara</a>
        </li>
        @if(auth()->user()->isAdmin==true)
        <li class="nav-item">
          <a wire:click="clickSeven" class="nav-link" href="#"><i class="bi bi-people-fill me-2 fs-2"></i>Tambah User</a>
        </li>
        @endif
        <li class="nav-item">
          <a class="nav-link {{ Request::is('app/rekap-data') ? 'active' : '' }}" href="{{ url('app/rekap-data') }}"><i class="bi bi-file-earmark-spreadsheet-fill me-2 fs-2"></i>Rekapitulasi Data Suara</a>
        </li>
        
      </ul>
      <div class="d-flex ms-4 mb-2">
          <button wire:click="logout" class="btn text-white bg-primary fw-semibold rounded-pill" type="submit"><i class="bi bi-box-arrow-right me-2 fs-2"></i> Keluar</button>
        </div>
    </div>
</div>
