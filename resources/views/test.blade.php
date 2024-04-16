<!doctype html>
<html lang="en">

<head>
    <title>Test</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico') }}" type="image/x-icon">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.2.0/remixicon.min.css"
        integrity="sha512-MqL4+Io386IOPMKKyplKII0pVW5e+kb+PI/I3N87G3fHIfrgNNsRpzIXEi+0MQC0sR9xZNqZqCYVcC61fL5+Vg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @vite(['resources/css/app-tailwind.css'])

</head>

<body>
    <!-- NAVBAR -->
    @include('components.front.navbar')

    <main>

        <section id="">

        </section>

        <section class="p-2 m-2" id="">
            <button class="px-4 py-2 border-2 rounded-md bg-primary"> Primary</button>
            <button class="px-4 py-2 border-2 rounded-md bg-secondary"> Secondary</button>
            <button class="px-4 py-2 border-2 rounded-md bg-accent"> Accent</button>
            <button class="px-4 py-2 border-2 rounded-md bg-neutral"> Neutral</button>
            <button class="px-4 py-2 border-2 rounded-md bg-base-100"> Base</button>
            <button class="px-4 py-2 border-2 rounded-md bg-success"> Success</button>
            <button class="px-4 py-2 border-2 rounded-md bg-info"> Info</button>
            <button class="px-4 py-2 border-2 rounded-md bg-warning"> Warning</button>
            <button class="px-4 py-2 border-2 rounded-md bg-error"> Error</button>
            <button class="px-4 py-2 border-2 rounded-md bg-light"> Light</button>
            <button class="px-4 py-2 border-2 rounded-md bg-dark"> Dark</button>
        </section>

    </main>
    <footer>
        <!-- place footer here -->
    </footer>
</body>

</html>
