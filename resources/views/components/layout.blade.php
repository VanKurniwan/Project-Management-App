<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Projects</title>
</head>

<body class="min-h-full dark:bg-gray-900">
    <div class="min-h-screen flex flex-col">

        {{-- Navigation header --}}
        <x-navheader></x-navheader>

        {{-- Main Content --}}
        <main class="flex-grow">
            {{ $slot }}
        </main>

    </div>

    {{-- Create Modal --}}
    <x-modalcreate :count="$count"></x-modalcreate>

</body>

<script type="text/javascript">
    // modal add project
    document.addEventListener("DOMContentLoaded", function(event) {
        document.getElementById('defaultModalButton').click();
    });

    // sweet alert - create project
    document.getElementById('createprojectbtn').addEventListener('click', function(event) {
        event.preventDefault();
        Swal.fire({
            position: "center",
            icon: "success",
            title: "Your project has been created",
            color: '#ffff',
            background: '#1f2937',
            showConfirmButton: false,
            timer: 1500
        }).then(() => {
            document.getElementById('createprojectformmodal').submit();
        });
    });

    // sweet alert - hapus project
    document.querySelectorAll('.deleteprojectbtn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            const redirectUrl = button.getAttribute('href');
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                color: '#ffff',
                background: '#1f2937',
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        color: '#ffff',
                        background: '#1f2937',
                        text: "Your file has been deleted.",
                        icon: "success",
                    }).then(() => {
                        // Redirection happens after the success alert
                        window.location.href = redirectUrl;
                    });
                }
            });
        });
    });
</script>

</html>
