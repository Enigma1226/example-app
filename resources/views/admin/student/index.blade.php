<x-admin.layout :title="$title">
    <section class="mb-6 flex items-start justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900 dark:text-white">{{ $title }}</h1>
            <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Kelola data siswa.</p>
        </div>

        <button id="open-student-modal" type="button"
            class="inline-flex items-center rounded-lg bg-blue-700 px-4 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            + Tambah Siswa
        </button>
    </section>

    @if (session('success'))
        <div class="mb-4 rounded-lg bg-green-100 p-4 text-sm text-green-800" role="status">
            {{ session('success') }}
        </div>
    @endif

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
                            <td class="px-6 py-4">{{ $student->name }}</td>
                            <td class="px-6 py-4">{{ $student->nis }}</td>
                            <td class="px-6 py-4">{{ $student->classroom->name ?? '-' }}</td>
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

   <div id="student-modal" class="fixed inset-0 z-50 hidden items-center justify-center bg-gray-900/50 p-4" aria-hidden="true">
        <section role="dialog" aria-modal="true" aria-labelledby="student-modal-title"
            class="max-h-[90vh] w-full max-w-xl overflow-y-auto rounded-xl bg-white p-6 shadow-xl dark:bg-gray-800">
            <header class="flex items-center justify-between border-b border-gray-200 pb-4 dark:border-gray-700">
                <h2 id="student-modal-title" class="text-xl font-semibold text-gray-900 dark:text-white">Tambah Siswa</h2>
                <button type="button" data-close-student-modal aria-label="Tutup pop-up"
                    class="rounded-lg p-2 text-gray-500 hover:bg-gray-100 hover:text-gray-900 dark:hover:bg-gray-700 dark:hover:text-white">
                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 12 12M13 1 1 13" />
                    </svg>
                </button>
            </header>

            <form action="{{ route('admin.student.store') }}" method="POST">
                @csrf
                <div class="space-y-5 py-5">
                    <div>
                        <label for="student-name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NAMA LENGKAP</label>
                        <input id="student-name" name="name" type="text" value="{{ old('name') }}" required
                            placeholder="Masukkan nama lengkap"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="student-nis" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">NIS</label>
                        <input id="student-nis" name="nis" type="number" min="0" step="1" value="{{ old('nis') }}" required
                            placeholder="Masukkan NIS"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                        @error('nis')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="student-classroom" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">KELAS</label>
                        <select id="student-classroom" name="classroom_id" required
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">
                            <option value="">Pilih kelas</option>
                            @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}" @selected(old('classroom_id') == $classroom->id)>{{ $classroom->name }}</option>
                            @endforeach
                        </select>
                        @error('classroom_id')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="student-address" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white">ALAMAT</label>
                        <textarea id="student-address" name="address" rows="4" required placeholder="Masukkan alamat lengkap"
                            class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-3 text-sm text-gray-900 focus:border-blue-500 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white">{{ old('address') }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <footer class="flex flex-col-reverse gap-3 border-t border-gray-200 pt-4 sm:flex-row dark:border-gray-700">
                    <button type="submit"
                        class="inline-flex items-center justify-center rounded-lg bg-blue-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300">
                        + Tambah Siswa
                    </button>
                    <button type="button" data-close-student-modal
                        class="rounded-lg border border-gray-200 bg-white px-5 py-2.5 text-sm font-medium text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-4 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">
                        Batal
                    </button>
                </footer>
            </form>
        </section>
    </div>
    <script>
        const studentModal = document.getElementById('student-modal');
        const openStudentModalButton = document.getElementById('open-student-modal');

        const openStudentModal = () => {
            studentModal.classList.remove('hidden');
            studentModal.classList.add('flex');
            studentModal.setAttribute('aria-hidden', 'false');
            document.body.classList.add('overflow-hidden');
            document.getElementById('student-name').focus();
        };

        const closeStudentModal = () => {
            studentModal.classList.add('hidden');
            studentModal.classList.remove('flex');
            studentModal.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('overflow-hidden');
            openStudentModalButton.focus();
        };

        openStudentModalButton.addEventListener('click', openStudentModal);
        document.querySelectorAll('[data-close-student-modal]').forEach((button) => {
            button.addEventListener('click', closeStudentModal);
        });

        studentModal.addEventListener('click', (event) => {
            if (event.target === studentModal) {
                closeStudentModal();
            }
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && !studentModal.classList.contains('hidden')) {
                closeStudentModal();
            }
        });

        @if ($errors->any())
            openStudentModal();
        @endif
    </script>
</x-admin.layout>
