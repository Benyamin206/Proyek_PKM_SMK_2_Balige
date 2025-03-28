<html>
 <head>
  <title>
   QuizHub
  </title>
  <script src="https://cdn.tailwindcss.com">
  </script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
  <style>
   /* Custom dropdown styles */
   .dropdown-menu {
    display: none;
   }
   .dropdown:hover .dropdown-menu {
    display: block;
   }
  </style>
 </head>
 <body class="bg-gray-100">
  <div class="flex flex-col h-screen">
   <!-- Top Bar -->
   <div class="bg-white shadow p-4 flex justify-between items-center">
    <h1 class="text-2xl font-bold text-teal-500">QUIZHUB</h1>
    <div class="relative dropdown">
        <div class="flex items-center cursor-pointer">
            <div class="flex flex-col items-center">
                <span class="text-teal-500">Hello, Guru</span>
                <span class="text-teal-500 font-semibold">Natan Hutahean</span>
            </div>
            <img alt="Profile picture of Natan Hutahean" class="rounded-full ml-4" height="40" src="https://storage.googleapis.com/a1aa/image/sG3g-w8cayIo0nXWyycQx8dmzPb0_0-Zc6iv6Fls36s.jpg" width="40">
        </div>
        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-2 hidden">
            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Logout</a>
        </div>
    </div>
</div>
   <div class="flex flex-1">
    <!-- Sidebar -->
    <div class="w-full md:w-1/5 bg-gray-200 h-auto md:h-full p-4">
     <div class="text-center mb-8">
      <h1 class="text-2xl font-bold text-teal-500">
       QUIZHUB
      </h1>
     </div>
     <div class="mb-4">
      <div class="flex items-center p-2 bg-white rounded-lg shadow-md">
       <i class="fas fa-user-circle text-2xl text-teal-500">
       </i>
       <span class="ml-2 text-lg font-semibold">
        Course
       </span>
      </div>
     </div>
     <div>
      <div class="flex items-center p-2">
       <i class="fas fa-id-card text-2xl text-teal-500">
       </i>
       <span class="ml-2 text-lg font-semibold">
        Latihan Soal
       </span>
      </div>
     </div>
    </div>
    <div class="flex-1 p-6">
     <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Card 1 -->
      <div class="bg-white shadow-lg rounded-lg overflow-visible">
       <img alt="Science subject banner" class="w-full h-32 object-cover" src="https://placehold.co/600x200"/>
       <div class="p-4 flex justify-between items-center">
        <div>
         <h2 class="text-lg font-bold">
          Kelas 9
         </h2>
         <p class="text-gray-600">
          Ilmu Pengetahuan Alam
         </p>
        </div>
        <div class="relative dropdown">
         <i class="fas fa-bars text-gray-500 cursor-pointer" onclick="toggleDropdown(event)">
         </i>
         <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-10">
          <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="#">
           Manage Course
          </a>
          <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="#">
           Add Student
          </a>
          <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="#">
           Delete Course
          </a>
         </div>
        </div>
       </div>
      </div>
      <!-- Card 2 -->
      <div class="bg-white shadow-lg rounded-lg overflow-visible">
       <img alt="Science subject banner" class="w-full h-32 object-cover" src="https://placehold.co/600x200"/>
       <div class="p-4 flex justify-between items-center">
        <div>
         <h2 class="text-lg font-bold">
          Kelas 9
         </h2>
         <p class="text-gray-600">
          Ilmu Pengetahuan Alam
         </p>
        </div>
        <div class="relative dropdown">
         <i class="fas fa-bars text-gray-500 cursor-pointer" onclick="toggleDropdown(event)">
         </i>
         <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white border rounded shadow-lg z-10">
          <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="#">
           Manage Course
          </a>
          <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="#">
           Add Student
          </a>
          <a class="block px-4 py-2 text-gray-800 hover:bg-gray-200" href="#">
           Delete Course
          </a>
         </div>
        </div>
       </div>
      </div>
     </div>
    </div>
   </div>
  </div>
  <script>
   function toggleDropdown(event) {
    const dropdownMenu = event.currentTarget.nextElementSibling;
    dropdownMenu.classList.toggle('hidden');
   }
   // Close the dropdown if the user clicks outside of it
   window.onclick = function(event) {
    if (!event.target.matches('.fa-bars')) {
     const dropdowns = document.getElementsByClassName("dropdown-menu");
     for (let i = 0; i < dropdowns.length; i++) {
      const openDropdown = dropdowns[i];
      if (!openDropdown.classList.contains('hidden')) {
       openDropdown.classList.add('hidden');
      }
     }
    }
   }
  </script>
 </body>
</html>
