<x-admin.layout :title="$title">
    <section class="mb-6 flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data siswa.</p>
        </div>

        <button type="button"
            class="inline-flex items-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            + Tambah Siswa
        </button>
    </section>

    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="flex flex-col gap-3 p-6 sm:flex-row sm:items-center sm:justify-between">
            <div class="relative w-full sm:max-w-xs">
                <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                    <svg class="h-5 w-5 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" placeholder="Cari nama atau NIS..."
                    class="block w-full rounded-lg border border-gray-300 bg-gray-50 py-2 pl-10 pr-3 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder-gray-400">
            </div>

            <select
                class="rounded-lg border border-gray-300 bg-gray-50 px-3 py-2 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                <option value="">--Semua Kelas--</option>
                <option value="PPLG 1">PPLG 1</option>
                <option value="PPLG 2">PPLG 2</option>
            </select>
        </div>

        {{-- Tabel --}}
        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="border-y border-gray-200 bg-gray-50 text-xs uppercase text-gray-900 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">NIS</th>
                        <th scope="col" class="px-6 py-3">Class</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($students as $student)
                        <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">{{ $student['name'] }}</td>
                            <td class="px-6 py-4">{{ $student['nis'] }}</td>
                            <td class="px-6 py-4">{{ $student['classroom'] }}</td>
                            <td class="px-6 py-4">
                                @if ($student['status'] === 'active')
                                    <span class="rounded-full bg-green-100 px-2.5 py-1 text-xs font-medium text-green-800">Active</span>
                                @else
                                    <span class="rounded-full bg-red-100 px-2.5 py-1 text-xs font-medium text-red-800">Inactive</span>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
