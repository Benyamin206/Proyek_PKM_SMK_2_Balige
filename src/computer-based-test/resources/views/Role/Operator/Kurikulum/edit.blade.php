<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>QuizHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Custom dropdown styles */
        .dropdown:hover .dropdown-menu {
            display: block;
        }
    </style>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <div class="bg-white shadow p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold text-teal-500">Kelas</h1>
        <div class="relative dropdown">
            <div class="flex items-center cursor-pointer">
                <div class="flex flex-col items-center">
                    <span class="text-teal-500">Welcome, Operator</span>
                    <span class="text-teal-500 font-semibold">{{ $user->name}}</span>
                </div>
                <img alt="Profile picture of Natan Hutahean" class="rounded-full ml-4" height="40"
                    src="https://storage.googleapis.com/a1aa/image/sG3g-w8cayIo0nXWyycQx8dmzPb0_0-Zc6iv6Fls36s.jpg"
                    width="40">
            </div>
            <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 hidden">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="block px-4 py-2 text-gray-700 hover:bg-gray-100 w-full text-left">Logout</button>
                </form>
            </div>
        </div>
    </div>
    <div class="flex flex-col md:flex-row">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 bg-gray-200 h-screen p-4">
            <ul>
                <li class="mb-4">
                    <a href="{{ route('Operator.Siswa.index') }}" class="flex items-center text-gray-700 p-2 rounded-lg">
                        <i class="fas fa-user-graduate text-teal-500 mr-2"></i>
                        Daftar Siswa
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('Operator.Guru.index') }}" class="flex items-center text-gray-700 p-2 rounded-lg">
                        <i class="fas fa-chalkboard-teacher text-teal-500 mr-2"></i>
                        Daftar Guru
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('Operator.MataPelajaran.index') }}" class="flex items-center text-gray-700 p-2 rounded-lg">
                        <i class="fas fa-book text-teal-500 mr-2"></i>
                        Mata Pelajaran
                    </a>
                </li>
                <li class="mb-4">
                    <a href="{{ route('Operator.Kelas.index') }}" class="flex items-center text-gray-700 p-2 rounded-lg">
                        <i class="fas fa-home text-teal-500 mr-2"></i>
                        Kelas
                    </a>
                </li>
                <li class="mb-4">
                    <a href="#" class="flex items-center text-gray-700 bg-white p-2 rounded-lg shadow">
                        <i class="fas fa-calendar-alt text-teal-500 mr-2"></i>
                        Kurikulum
                    </a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="flex-1 p-4">
            <form action="{{ route('Operator.Kurikulum.update', $kurikulum->id_kurikulum) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="space-y-4">
                    <div>
                        <label for="nama-kurikulum" class="block text-lg font-semibold">Nama Kurikulum</label>
                        <input type="text" id="nama_kurikulum" name="nama_kurikulum" value="{{ $kurikulum->nama_kurikulum }}" class="mt-1 block w-full border border-gray-400 rounded-md p-2">
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg flex items-center">
                            <span>Simpan</span>
                            <i class="fas fa-check ml-2"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script>
        // Toggle dropdown menu
        document.querySelector('.dropdown').addEventListener('click', function() {
            this.querySelector('.dropdown-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>