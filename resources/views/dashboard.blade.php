<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard Survei Pelanggan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <!-- Cards Ringkasan -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm">Total Responden</h3>
                    <p class="text-3xl font-bold mt-2">{{ $totalSurvey }}</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-sm">
                    <h3 class="text-gray-500 text-sm">Rata-Rata Rating</h3>
                    <p class="text-3xl font-bold mt-2 text-yellow-500">
                        ★ {{ number_format($averageRating, 1) }} / 5
                    </p>
                </div>
            </div>

            <!-- Tabel Data Survei -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-lg font-semibold mb-4">Daftar Hasil Survei</h3>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="border-b bg-gray-50">
                                <th class="p-3">Tanggal</th>
                                <th class="p-3">Nama</th>
                                <th class="p-3">WhatsApp</th>
                                <th class="p-3">Email</th>
                                <th class="p-3">Sosial Media</th>
                                <th class="p-3">Rating</th>
                                <th class="p-3">Masukan & Saran</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($surveys as $survey)
                                <tr class="border-b hover:bg-gray-50">
                                    <td class="p-3 text-sm">{{ $survey->created_at->format('d M Y H:i') }}</td>
                                    <td class="p-3 font-medium">{{ $survey->nama_lengkap }}</td>
                                    <td class="p-3">{{ $survey->no_whatsapp }}</td>
                                    <td class="p-3">{{ $survey->email }}</td>
                                    <td class="p-3">{{ $survey->sosialmedia }}</td>
                                    <td class="p-3 text-yellow-500">★ {{ $survey->rating }}</td>
                                    <td class="p-3 text-sm text-gray-600">{{ $survey->masukan_saran ?? '-' }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="p-4 text-center text-gray-500">Belum ada data survei.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $surveys->links() }}
                </div>
            </div>

        </div>
    </div>
</x-app-layout>