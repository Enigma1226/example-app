<x-admin.layout title="About Me">
    <div class="mb-6">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-white">
            {{ $title }}
        </h1>
    </div>

    <div class="space-y-3">
        <p class="text-gray-700 dark:text-gray-300">
            <strong class="text-gray-900 dark:text-white">Nama:</strong>
            {{ $content['name'] }}
        </p>

        <p class="text-gray-700 dark:text-gray-300">
            <strong class="text-gray-900 dark:text-white">Hobby:</strong>
            {{ $content['hobby'] }}
        </p>

        <p class="text-gray-700 dark:text-gray-300">
            <strong class="text-gray-900 dark:text-white">Repository:</strong>
            <a href="{{ $content['repository'] }}" target="_blank" class="text-primary-600 hover:underline">
                GitHub
            </a>
        </p>
    </div>
</x-admin.layout>

