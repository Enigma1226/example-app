@props(['title' => 'Dashboard'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <title>{{ $title }} - {{ config('app.name', 'Laravel') }}</title>
</head>
<body>
   <div class="antialiased bg-gray-50 dark:bg-gray-900 min-h-screen">
    <!-- Navbar -->
    <x-admin.navbar />

    <!-- Sidebar -->
    <x-admin.sidebar />

    <main class="p-4 md:ml-64 min-h-screen pt-20 bg-gray-50 dark:bg-gray-900">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            {{ $slot }}
        </div>
    </main>
</div>
  <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>

</body>
</html>
