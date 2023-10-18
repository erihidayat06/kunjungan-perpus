<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan</title>
    <link href="/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    {{-- Logo Title --}}
    <link href="/assets/img/icon-perpus.png" rel="icon">

    {{-- icon bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

</head>

<body>
    @include('sweetalert::alert')
    <main id="main" class="main">
        @include('layouts.nav')
        <div class="container">
            @yield('container')
        </div>
    </main>
    <script src="/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <script>
        function formSiswa(element, display) {
            element.style.display = display;
            document.getElementById("button-siswa").style.display = ""
        }

        function formKaryawan(element, display) {
            element.style.display = display;
            document.getElementById("button-karyawan").style.display = ""
        }
    </script>
</body>

</html>
