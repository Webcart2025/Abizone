<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <style>
    ::-webkit-scrollbar {
      width: 6px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: #94a3b8;
      border-radius: 3px;
    }
  </style>
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      sidebar.classList.toggle('hidden');
    }
  </script>
</head>
<body class="bg-white font-sans text-gray-900">
  
    
  <div class="flex flex-col min-h-screen">
    <!-- Include Top Navigation -->
    @include('admin.topnav')

    <div class="flex flex-1 overflow-hidden flex-col md:flex-row">
      <!-- Sidebar -->
      @include('admin.sidebar')

      <!-- Main content -->
      <main class="flex-1 overflow-auto p-4 sm:p-6">
        <!-- <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-4">
          <h1 class="text-2xl font-bold text-gray-900 mb-3 sm:mb-0">Dashboard</h1>
          <div class="flex gap-2 text-xs font-normal text-gray-700 flex-wrap">
            <button class="border border-gray-300 rounded px-3 py-1 hover:bg-gray-100 whitespace-nowrap" type="button">Share</button>
            <button class="border border-gray-300 rounded px-3 py-1 hover:bg-gray-100 whitespace-nowrap" type="button">Export</button>
            <button class="border border-gray-300 rounded px-3 py-1 flex items-center gap-1 hover:bg-gray-100 whitespace-nowrap" type="button">
              <i class="fas fa-calendar-alt text-[10px]"></i> This week <i class="fas fa-chevron-down text-[10px]"></i>
            </button>
          </div>
        </div> -->

        <section>
               <!-- Cards container -->
     <!-- <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-4 mb-6">
      <div class="bg-gray-100 rounded p-4 flex flex-col justify-center items-center text-center">
       <div class="text-sm font-semibold text-gray-700 mb-1">
        Total Users
       </div>
       <div class="text-2xl font-bold text-gray-900">
        1,234
       </div>
      </div>
      <div class="bg-gray-100 rounded p-4 flex flex-col justify-center items-center text-center">
       <div class="text-sm font-semibold text-gray-700 mb-1">
        Total Income
       </div>
       <div class="text-2xl font-bold text-gray-900">
        $56,789
       </div>
      </div>
      <div class="bg-gray-100 rounded p-4 flex flex-col justify-center items-center text-center">
       <div class="text-sm font-semibold text-gray-700 mb-1">
        Total Visa Pending
       </div>
       <div class="text-2xl font-bold text-gray-900">
        123
       </div>
      </div>
      <div class="bg-gray-100 rounded p-4 flex flex-col justify-center items-center text-center">
       <div class="text-sm font-semibold text-gray-700 mb-1">
        Visas Delivered
       </div>
       <div class="text-2xl font-bold text-gray-900">
        1,111
       </div>
      </div>
      <div class="bg-gray-100 rounded p-4 flex flex-col justify-center items-center text-center">
       <div class="text-sm font-semibold text-gray-700 mb-1">
        Total Visa
       </div>
       <div class="text-2xl font-bold text-gray-900">
        1,234
       </div>
      </div>
      <div class="bg-gray-100 rounded p-4 flex flex-col justify-center items-center text-center">
       <div class="text-sm font-semibold text-gray-700 mb-1">
        Total Agent
       </div>
       <div class="text-2xl font-bold text-gray-900">
        456
       </div>
      </div>
     </div>
     </div> -->
     
          <h2 class="text-xl font-semibold mb-2">Agents_Applicant's</h2>
          <div class="overflow-x-auto">
            <table class="w-full border-collapse border border-gray-300 text-xs min-w-[600px]">
              <thead class="bg-gray-100">
                <tr>
                  <th class="border border-gray-300 px-2 py-1 text-left font-semibold">#</th>
                  <th class="border border-gray-300 px-2 py-1 text-left font-semibold">Header</th>
                  <th class="border border-gray-300 px-2 py-1 text-left font-semibold">Header</th>
                  <th class="border border-gray-300 px-2 py-1 text-left font-semibold">Header</th>
                  <th class="border border-gray-300 px-2 py-1 text-left font-semibold">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr class="bg-gray-50">
                  <td class="border border-gray-300 px-2 py-1">1,001</td>
                  <td class="border border-gray-300 px-2 py-1">random</td>
                  <td class="border border-gray-300 px-2 py-1">data</td>
                  <td class="border border-gray-300 px-2 py-1">placeholder</td>
                  <td class="border border-gray-300 px-2 py-1">text</td>
                </tr>
                <tr>
                  <td class="border border-gray-300 px-2 py-1">1,002</td>
                  <td class="border border-gray-300 px-2 py-1">placeholder</td>
                  <td class="border border-gray-300 px-2 py-1">irrelevant</td>
                  <td class="border border-gray-300 px-2 py-1">visual</td>
                  <td class="border border-gray-300 px-2 py-1">layout</td>
                </tr>
                <tr class="bg-gray-50">
                  <td class="border border-gray-300 px-2 py-1">1,003</td>
                  <td class="border border-gray-300 px-2 py-1">data</td>
                  <td class="border border-gray-300 px-2 py-1">rich</td>
                  <td class="border border-gray-300 px-2 py-1">dashboard</td>
                  <td class="border border-gray-300 px-2 py-1">tabular</td>
                </tr>
              </tbody>
            </table>
          </div>
        </section>
      </main>
    </div>
  </div>
  
</body>
</html>