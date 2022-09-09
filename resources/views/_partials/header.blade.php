<nav class="navbar navbar-expand-lg navbar-dark bg-dark nav-pills">
    <div class="container">
        <a class="navbar-brand" href="/"><strong>PT Maju Bersama</strong></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>

        @auth
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link {{ Request::is('karyawan*') ? 'active' : '' }}" href="/karyawan">Karyawan</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('gaji*') ? 'active' : '' }}" href="/gaji">Gaji</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('cuti*') ? 'active' : '' }}" href="/cuti">Cuti</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('lembur*') ? 'active' : '' }}" href="/lembur">Lembur</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('jabatan*') ? 'active' : '' }}" href="/jabatan">Jabatan</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('departemen*') ? 'active' : '' }}" href="/departemen">Departemen</a></li>
                <li class="nav-item"><a class="nav-link {{ Request::is('cabang*') ? 'active' : '' }}" href="/cabang">Cabang</a></li>
            </ul>
        </div>
        @endauth

    </div>
</nav>
