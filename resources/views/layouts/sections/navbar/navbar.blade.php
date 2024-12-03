@php
$containerNav = $containerNav ?? 'container-fluid';
$navbarDetached = ($navbarDetached ?? '');

@endphp

<!-- Navbar -->
@if(isset($navbarDetached) && $navbarDetached == 'navbar-detached')
<nav class="layout-navbar {{$containerNav}} navbar navbar-expand-xl {{$navbarDetached}} align-items-center bg-navbar-theme" id="layout-navbar" style="margin: 0; width: 100vw !important; position: sticky; top: 0; background-color: #082c6c !important; border-radius: 0">
  @endif
  @if(isset($navbarDetached) && $navbarDetached == '')
  <nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="{{$containerNav}}">
      @endif

      <!--  Brand demo (display only for navbar-full and hide on below xl) -->
      @if(isset($navbarFull))
      <div class="navbar-brand app-brand demo d-none d-xl-flex py-0 me-4">
        <a href="{{url('/')}}" class="app-brand-link gap-2">
          <span class="app-brand-logo demo">@include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])</span>
          <span class="app-brand-text demo menu-text fw-bold">{{config('variables.templateName')}}</span>
        </a>
      </div>
      @endif

      <!-- ! Not required for layout-without-menu -->
      @if(!isset($navbarHideToggle))
      <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0{{ isset($menuHorizontal) ? ' d-xl-none ' : '' }} {{ isset($contentNavbar) ?' d-xl-none ' : '' }}">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
          <i class="bx bx-menu bx-sm"></i>
        </a>
      </div>
      @endif

      <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        {{-- <div class="navbar-nav align-items-center">
          <div class="nav-item d-flex align-items-center">
            <i class="bx bx-search fs-4 lh-0"></i>
            <input type="text" class="form-control border-0 shadow-none ps-1 ps-sm-2" placeholder="Search..." aria-label="Search...">
          </div>
        </div> --}}
        <!-- /Search -->
        <a href="{{ url('/') }}">
          <img src="{{ asset('assets/img/branding/logo.png') }}" height="50">
        </a>
        
        <ul class="navbar-nav flex-row align-items-center ms-auto">

          @if (!auth()->user())
            <!-- Place this tag where you want the button to render. -->
            <!-- Button trigger modal -->
            <a class="btn btn-md text-lightest px-3" href="auth/google" style="background-color: white; color: #0c3070 !important;">
              Login
            </a>
          @else
            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                  <img src="{{ asset('assets/img/avatars/avatar-1.png') }}" alt class="w-px-40 h-auto rounded-circle">
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="javascript:void(0);">
                    <div class="d-flex">
                      <div class="flex-grow-1"> 
                        <span class="fw-medium d-block" style="color: #082c6c">{{ auth()->user()->nama }}</span>
                        <small style="color: #565d64">{{ ucfirst(auth()->user()->role) }}</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalCenter" style="color: black">
                    <i class="bx bx-edit me-2"></i>
                    <span class="align-middle">Input Data Harga</span>
                  </button>
                </li>
                @if (auth()->user()->role == 'admin')
                  <li>
                    <button class="dropdown-item" onclick="location.href='{{ url('harga') }}'" type="button" style="color: black">
                      <i class="bx bx-table me-2"></i>
                      <span class="align-middle">Data Mentah</span>
                    </button>
                  </li>
                  <li>
                    <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalUser" style="color: black">
                      <i class="bx bx-user me-2"></i>
                      <span class="align-middle">Tambah Pengguna</span>
                    </button>
                  </li>
                @endif
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <form action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="dropdown-item" style="color: black">
                      <i class='bx bx-power-off me-2'></i>
                      <span class="align-middle">Log Out</span>
                    </button>
                  </form>
                </li>
              </ul>
            </li>
            <!--/ User -->
            @endif
        </ul>
      </div>

      @if(!isset($navbarDetached))
    </div>
    @endif
  </nav>
  <!-- / Navbar -->
