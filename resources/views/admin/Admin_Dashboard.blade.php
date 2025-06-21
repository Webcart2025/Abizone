<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
  <style>
    ::-webkit-scrollbar { width: 6px; }
    ::-webkit-scrollbar-thumb { background-color: #94a3b8; border-radius: 3px; }
    .dashboard-card { transition: box-shadow 0.2s; }
    .dashboard-card:hover { box-shadow: 0 10px 20px rgba(0,0,0,0.08); }
  </style>
</head>
<body class="bg-gray-50 font-sans text-gray-900">
  <div class="flex flex-col min-h-screen">
    @include('admin.topnav')
    <div class="flex flex-1 overflow-hidden flex-col md:flex-row">
      @include('admin.sidebar')
      <main class="flex-1 overflow-auto p-6">
        <div class="mb-8">
          <h1 class="text-3xl font-bold text-gray-900 mb-2">Dashboard</h1>
          <p class="text-gray-500">Welcome back, Admin! Here's an overview of your platform.</p>
        </div>
        <!-- Cards container -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-6 mb-8">
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-blue-100 p-3 rounded-full mb-2"><i class="fas fa-users text-blue-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Total Users</div>
            <div class="text-2xl font-bold text-gray-900">1,234</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-green-100 p-3 rounded-full mb-2"><i class="fas fa-user-tie text-green-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Total Agents</div>
            <div class="text-2xl font-bold text-gray-900">456</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-indigo-100 p-3 rounded-full mb-2"><i class="fas fa-passport text-indigo-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Visa Applications</div>
            <div class="text-2xl font-bold text-gray-900">2,345</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-yellow-100 p-3 rounded-full mb-2"><i class="fas fa-hourglass-half text-yellow-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Pending Applications</div>
            <div class="text-2xl font-bold text-gray-900">123</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-green-100 p-3 rounded-full mb-2"><i class="fas fa-check-circle text-green-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Completed Applications</div>
            <div class="text-2xl font-bold text-gray-900">1,111</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-purple-100 p-3 rounded-full mb-2"><i class="fas fa-dollar-sign text-purple-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Total Revenue</div>
            <div class="text-2xl font-bold text-gray-900">$56,789</div>
          </div>
        </div>
        <!-- Recent Activity Table -->
        <div class="bg-white rounded-lg shadow p-6">
          <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-semibold text-gray-900">Recent Activity</h2>
            <a href="#" class="text-indigo-600 text-sm hover:underline">View All</a>
          </div>
          <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
              <thead>
                <tr class="bg-gray-100">
                  <th class="px-4 py-2 text-left font-semibold">Type</th>
                  <th class="px-4 py-2 text-left font-semibold">User/Agent</th>
                  <th class="px-4 py-2 text-left font-semibold">Details</th>
                  <th class="px-4 py-2 text-left font-semibold">Date</th>
                  <th class="px-4 py-2 text-left font-semibold">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="px-4 py-2"><span class="inline-flex items-center px-2 py-1 bg-indigo-100 text-indigo-700 rounded"><i class="fas fa-passport mr-1"></i> Visa</span></td>
                  <td class="px-4 py-2">John Doe</td>
                  <td class="px-4 py-2">Tourist Visa Application</td>
                  <td class="px-4 py-2">Jun 15, 2023</td>
                  <td class="px-4 py-2"><span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded">Completed</span></td>
                </tr>
                <tr>
                  <td class="px-4 py-2"><span class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-700 rounded"><i class="fas fa-user-plus mr-1"></i> User</span></td>
                  <td class="px-4 py-2">Alice Smith</td>
                  <td class="px-4 py-2">Registered New Account</td>
                  <td class="px-4 py-2">Jun 16, 2023</td>
                  <td class="px-4 py-2"><span class="inline-block px-2 py-1 bg-blue-100 text-blue-700 rounded">Active</span></td>
                </tr>
                <tr>
                  <td class="px-4 py-2"><span class="inline-flex items-center px-2 py-1 bg-green-100 text-green-700 rounded"><i class="fas fa-user-tie mr-1"></i> Agent</span></td>
                  <td class="px-4 py-2">Michael Brown</td>
                  <td class="px-4 py-2">Agent Application Approved</td>
                  <td class="px-4 py-2">Jun 17, 2023</td>
                  <td class="px-4 py-2"><span class="inline-block px-2 py-1 bg-green-100 text-green-700 rounded">Approved</span></td>
                </tr>
                <tr>
                  <td class="px-4 py-2"><span class="inline-flex items-center px-2 py-1 bg-red-100 text-red-700 rounded"><i class="fas fa-times-circle mr-1"></i> Visa</span></td>
                  <td class="px-4 py-2">Emily Davis</td>
                  <td class="px-4 py-2">Visa Application Rejected</td>
                  <td class="px-4 py-2">Jun 18, 2023</td>
                  <td class="px-4 py-2"><span class="inline-block px-2 py-1 bg-red-100 text-red-700 rounded">Rejected</span></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>