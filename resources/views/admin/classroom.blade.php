<x-admin.layout :title="$title">
    <section class="mb-6">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data classroom.</p>
    </section>

    <div class="overflow-hidden rounded-lg border border-gray-200 bg-white shadow-sm dark:border-gray-700 dark:bg-gray-800">
        <div class="relative overflow-x-auto">
            <table class="w-full text-left text-sm text-gray-500 dark:text-gray-400">
                <thead class="border-y border-gray-200 bg-gray-50 text-xs uppercase text-gray-900 dark:border-gray-700 dark:bg-gray-700 dark:text-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Classroom</th>
                        <th scope="col" class="px-6 py-3">Jurusan</th>
                        <th scope="col" class="px-6 py-3">Tingkat</th>
                        <th scope="col" class="px-6 py-3">Wali Kelas</th>
                        <th scope="col" class="px-6 py-3">Jumlah Siswa</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($classrooms as $classroom)
                        <tr class="border-b border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-800">
                            <td class="px-6 py-4">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">{{ $classroom->name }}</td>
                            <td class="px-6 py-4">{{ $classroom->major }}</td>
                            <td class="px-6 py-4">{{ $classroom->grade_level }}</td>
                            <td class="px-6 py-4">{{ $classroom->homeroom_teacher }}</td>
                            <td class="px-6 py-4">{{ $classroom->capacity }} siswa</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-8 text-center">Belum ada data classroom.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-admin.layout>
