<x-admin.layout :title="$title">
    <section class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data guru.</p>
    </section>

    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="border-y border-gray-200 bg-gray-50 text-xs uppercase text-gray-900 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">NIY</th>
                        <th scope="col" class="px-6 py-3">Subject</th>
                        <th scope="col" class="px-6 py-3">Start Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($teachers as $teacher)
                        <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $teacher->name }}</td>
                            <td class="px-6 py-4">{{ $teacher->niy }}</td>
                            <td class="px-6 py-4">{{ $teacher->subject->name ?? '-' }}</td>
                            <td class="px-6 py-4">{{ $teacher->start_date->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center">Belum ada data teacher.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
