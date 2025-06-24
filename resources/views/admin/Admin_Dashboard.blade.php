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
            <div class="text-2xl font-bold text-gray-900">{{ $totalUsers ?? '0' }}</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-green-100 p-3 rounded-full mb-2"><i class="fas fa-user-tie text-green-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Total Agents</div>
            <div class="text-2xl font-bold text-gray-900">{{ $totalAgents ?? '0' }}</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-indigo-100 p-3 rounded-full mb-2"><i class="fas fa-passport text-indigo-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Visa Applications</div>
            <div class="text-2xl font-bold text-gray-900">{{ $totalApplications ?? '0' }}</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-yellow-100 p-3 rounded-full mb-2"><i class="fas fa-hourglass-half text-yellow-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Pending Applications</div>
            <div class="text-2xl font-bold text-gray-900">{{ $pendingApplications ?? '0' }}</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-green-100 p-3 rounded-full mb-2"><i class="fas fa-check-circle text-green-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Completed Applications</div>
            <div class="text-2xl font-bold text-gray-900">{{ $completedApplications ?? '0' }}</div>
          </div>
          <div class="dashboard-card bg-white rounded-lg p-5 flex flex-col items-center shadow">
            <div class="bg-purple-100 p-3 rounded-full mb-2"><i class="fas fa-dollar-sign text-purple-600 text-xl"></i></div>
            <div class="text-xs text-gray-500">Total Revenue</div>
            <div class="text-2xl font-bold text-gray-900">${{ number_format($totalRevenue ?? 0, 2) }}</div>
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
                @forelse($recentActivities as $activity)
                <tr>
                  <td class="px-4 py-2">
                    @if($activity->activity_type === 'Visa Application')
                      <span class="inline-flex items-center px-2 py-1 bg-indigo-100 text-indigo-700 rounded"><i class="fas fa-passport mr-1"></i> Visa</span>
                    @else
                      <span class="inline-flex items-center px-2 py-1 bg-yellow-100 text-yellow-700 rounded"><i class="fas fa-user-plus mr-1"></i> User</span>
                    @endif
                  </td>
                  <td class="px-4 py-2">{{ $activity->activity_user }}</td>
                  <td class="px-4 py-2">{{ $activity->activity_detail }}</td>
                  <td class="px-4 py-2">{{ $activity->activity_date->format('M d, Y') }}</td>
                  <td class="px-4 py-2">
                    <span class="inline-block px-2 py-1 rounded
                      @if(in_array(strtolower($activity->activity_status), ['completed', 'approved', 'active'])) bg-green-100 text-green-700
                      @elseif(in_array(strtolower($activity->activity_status), ['pending'])) bg-yellow-100 text-yellow-700
                      @else bg-red-100 text-red-700
                      @endif
                    ">
                      {{ $activity->activity_status }}
                    </span>
                  </td>
                </tr>
                @empty
                <tr>
                  <td colspan="5" class="px-4 py-4 text-center text-gray-500">No recent activity found.</td>
                </tr>
                @endforelse
              </tbody>
            </table>
          </div>
        </div>
      </main>
    </div>
  </div>
</body>
</html>