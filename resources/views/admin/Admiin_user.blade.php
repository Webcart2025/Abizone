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
    <!-- Top nav -->
    <header class="flex items-center justify-between bg-gray-900 text-gray-200 px-4 sm:px-6 h-10 select-none">
      <div class="text-sm font-normal">ABIZON</div>
      <div class="flex-1 px-4">
        <input type="search" aria-label="Search" placeholder="Search"
          class="w-full bg-gray-900 placeholder-gray-600 text-gray-600 text-sm border-none focus:ring-0 focus:outline-none" />
      </div>
      <div class="flex items-center gap-3">
        <!-- Toggle button for mobile -->
        <button class="md:hidden text-gray-400 hover:text-white" onclick="toggleSidebar()">
          <i class="fas fa-bars"></i>
        </button>
        <div class="text-xs font-normal whitespace-nowrap">Sign out</div>
      </div>
    </header>

    <div class="flex flex-1 overflow-hidden flex-col md:flex-row">
      <!-- Sidebar -->
      <nav id="sidebar"
        class="hidden md:flex flex-col bg-gray-50 border-t border-gray-200 md:border-r md:border-t-0 w-full md:w-56 min-w-0 md:min-w-[14rem] overflow-x-auto md:overflow-y-auto text-xs text-gray-700">
        <ul class="flex flex-col px-3 py-2 md:py-4 space-y-1 whitespace-nowrap md:whitespace-normal">
          <li>
            <a href="{{ url('Dashboard') }}" class="flex items-center gap-2 px-2 py-1 rounded text-blue-600 font-semibold">
              <i class="fas fa-home text-xs"></i> Dashboard
            </a>
          </li>
          <li>
            <a href="{{ url('admin_user') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-file-alt text-xs"></i> User/Applicant
            </a>
          </li>
          <li>
            <a href="{{ url('admin_agent') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-shopping-cart text-xs"></i> Agents_Applicant's
            </a>
          </li>
          <li>
            <a href="{{ url('AgentDetails') }}" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-user-friends text-xs"></i> Agent_Detail's
            </a>
          </li>
          <!-- <li>
            <a href="#" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-chart-bar text-xs"></i> Reports
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-layer-group text-xs"></i> Integrations
            </a>
          </li> -->
        </ul>

        <div class="px-3 mt-6 mb-2 text-gray-400 text-[9px] font-semibold tracking-wider select-none flex items-center justify-between">
          <!-- <span>SAVED REPORTS</span>
          <button type="button" aria-label="Add new report"
            class="text-gray-400 hover:text-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-1 focus:ring-gray-400 rounded">
            <i class="fas fa-plus text-[10px]"></i>
          </button>
        </div>

        <ul class="flex flex-col px-3 space-y-1 text-xs text-gray-700 whitespace-nowrap md:whitespace-normal">
          <li>
            <a href="#" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100 font-semibold">
              <i class="fas fa-file-alt text-xs"></i> Current month
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-file-alt text-xs"></i> Last quarter
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-file-alt text-xs"></i> Social engagement
            </a>
          </li>
          <li>
            <a href="#" class="flex items-center gap-2 px-2 py-1 rounded hover:bg-gray-100">
              <i class="fas fa-file-alt text-xs"></i> Year-end sale
            </a>
          </li> -->
        </ul>
      </nav>

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
     </div>
      -->
          <h2 class="text-xl font-semibold mb-2">Users</h2>
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