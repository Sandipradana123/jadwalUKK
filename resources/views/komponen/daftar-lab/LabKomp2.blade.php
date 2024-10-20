@include('komponen.style')
<div id="subMenu2" class="hidden">
    <div class="bg-blue-400 text-white p-4 flex items-center justify-center relative">
        <h1 class="text-xl font-bold text-center">Sistem Pendataan Penggunaan Laboratorium UNIPMA</h1>
    </div>
        <h1 class="text-3xl font-bold mb-4 text-center">Tabel Informasi</h1>
        <button onclick="showBackFromTable()"
            class="mt-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-gray-600 rounded-lg hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-300 dark:bg-gray-500 dark:hover:bg-gray-600 dark:focus:ring-gray-400 mb-6">
            Kembali
        </button>

        <form action="{{ url('/export-jadwal') }}" method="GET" >
        <div class="flex gap-12">
            <div class="flex  items-center mb-4">
                <label for="filterKegiatan" class="mr-2 text-sm font-medium text-gray-700">Kegiatan:</label>
                <select id="filterKegiatan" class="border border-gray-300 text-sm rounded-lg p-2" name="kegiatan">
                    <option value="">Semua</option>
                    @foreach ($kegiatan as $daftarKegiatan)
                        <option value="{{ $daftarKegiatan['daftar-kegiatan'] }}">
                            {{ $daftarKegiatan['daftar-kegiatan'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="filterTanggal" class="mr-2 text-sm font-medium text-gray-700">Jadwal</label>
                <select id="filterTanggal" class="border border-gray-300 text-sm rounded-lg p-2" name="tanggal">
                    <option value="">Semua</option>
                    @foreach ($jadwal as $daftarTanggal)
                        <option value="{{ $daftarTanggal['daftar-jadwal'] }}">
                            {{ $daftarTanggal['daftar-jadwal'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <label for="filterSesi" class="mr-2 text-sm font-medium text-gray-700">Sesi</label>
                <select id="filterSesi" class="border border-gray-300 text-sm rounded-lg p-2" name="sesi">
                    <option value="">Semua</option>
                    @foreach ($sesi as $daftarSesi)
                        <option value="{{ $daftarSesi['daftar-sesi'] }}">
                            {{ $daftarSesi['daftar-sesi'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="flex items-center mb-4">
                <button type="submit" class="block text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">Export to Excel</button>
            </div>
            
           
        </div>
    </form>
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-xs text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">Nama</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">NIM</th>
                        <th scope="col" class="px-6 py-3">Prodi</th>
                        <th scope="col" class="px-6 py-3">Kegiatan</th>
                        <th scope="col" class="px-6 py-3">Tanggal</th>
                        <th scope="col" class="px-6 py-3">Sesi</th>
                        <th scope="col" class="px-6 py-3">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($labKomp2 as $lab1)
                        <tr class="row-item odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700"
                        data-kegiatan="{{ $lab1->kegiatan }}"
                        data-tanggal="{{ $lab1->jadwal }}"
                        data-sesi="{{ $lab1->sesi }}">
                            <th class="px-6 py-4">{{ $lab1->id }}</th>
                            <th class="px-6 py-4">{{ $lab1->nama }}</th>
                            <td class="px-6 py-4 truncate max-w-[100px]">{{ $lab1->email }}</td>
                            <td class="px-6 py-4">{{ $lab1->nim }}</td>
                            <td class="px-6 py-4">{{ $lab1['progam-studi'] }}</td>
                            <td class="px-6 py-4">{{ $lab1->kegiatan }}</td>
                            <td class="px-6 py-4">{{ $lab1->jadwal }}</td>
                            <td class="px-6 py-4">{{ $lab1->sesi }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <button
                                    class="block text-white bg-blue-700 hover:bg-blue-800 font-medium rounded-lg text-sm px-5 py-2.5">
                                    Edit
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
</div>