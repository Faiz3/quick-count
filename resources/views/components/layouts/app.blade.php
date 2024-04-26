<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])

        <title>{{ $title ?? 'Quick Qount' }}</title>

        {{-- css --}}
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet"> --}}

        {{-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/dashboard/"> --}}
        {{-- js --}}
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/css/tabler.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

        {{-- sweetalert2 --}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

          {{-- Custom styles for this template --}}
        {{-- <style>
            .bd-placeholder-img {
              font-size: 1.125rem;
              text-anchor: middle;
              -webkit-user-select: none;
              -moz-user-select: none;
              user-select: none;
            }

            @media (min-width: 768px) {
              .bd-placeholder-img-lg {
                font-size: 3.5rem;
              }
            }

            .b-example-divider {
              width: 100%;
              height: 3rem;
              background-color: rgba(0, 0, 0, .1);
              border: solid rgba(0, 0, 0, .15);
              border-width: 1px 0;
              box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
            }

            .b-example-vr {
              flex-shrink: 0;
              width: 1.5rem;
              height: 100vh;
            }

            .bi {
              vertical-align: -.125em;
              fill: currentColor;
            }

            .nav-scroller {
              position: relative;
              z-index: 2;
              height: 2.75rem;
              overflow-y: hidden;
            }

            .nav-scroller .nav {
              display: flex;
              flex-wrap: nowrap;
              padding-bottom: 1rem;
              margin-top: -1px;
              overflow-x: auto;
              text-align: center;
              white-space: nowrap;
              -webkit-overflow-scrolling: touch;
            }

            .btn-bd-primary {
              --bd-violet-bg: #712cf9;
              --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

              --bs-btn-font-weight: 600;
              --bs-btn-color: var(--bs-white);
              --bs-btn-bg: var(--bd-violet-bg);
              --bs-btn-border-color: var(--bd-violet-bg);
              --bs-btn-hover-color: var(--bs-white);
              --bs-btn-hover-bg: #6528e0;
              --bs-btn-hover-border-color: #6528e0;
              --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
              --bs-btn-active-color: var(--bs-btn-hover-color);
              --bs-btn-active-bg: #5a23c8;
              --bs-btn-active-border-color: #5a23c8;
            }

            .bd-mode-toggle {
              z-index: 1500;
            }

            .bd-mode-toggle .dropdown-menu .active .bi {
              display: block !important;
            }
        </style> --}}
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">
        @livewireStyles
    </head>
    <body class="bg-light">
        {{ $slot }}
        @livewireScripts

        {{-- sweetalert2 --}}
        <script>
            Livewire.on('success', data => {
                Swal.fire({
                    position: 'center',
                    title: 'Berhasil!',
                    text: data[0].pesan,
                    icon: 'success',
                    confirmButtonText: 'oke'
                    // showConfirmButton: false
                    // , timer: 1500
                })
            });
            Livewire.on('error', data => {
                Swal.fire({
                    position: 'center',
                    title: 'Gagal!',
                    text: data[0].pesan,
                    icon: 'error',
                    confirmButtonText: 'oke'
                    // showConfirmButton: false
                    // , timer: 1500
                })
            });

            livewire.on('deletes', data => {
                Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
                }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success");
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                }
                })
            });
        </script>
        {{-- <script src="https://cdn.jsdelivr.net/npm/@tabler/core@1.0.0-beta17/dist/js/tabler.min.js"></script> --}}

    </body>
</html>
