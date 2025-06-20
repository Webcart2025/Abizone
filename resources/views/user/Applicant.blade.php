<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Visa Application Tracker</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col justify-between">
  @include('AgentNavbar')

  <main class="flex-grow">
    <div class="max-w-6xl mx-auto bg-white shadow-lg rounded-xl p-8 mt-10 mb-10">
      <h2 class="text-3xl font-bold text-blue-700 mb-6 text-center">Visa Application Tracker</h2>

      <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse">
          <thead>
            <tr class="bg-blue-100 text-left text-sm font-semibold text-gray-700">
              <th class="px-4 py-2 border">App ID</th>
              <th class="px-4 py-2 border">User Name</th>
              <th class="px-4 py-2 border">Visa Type</th>
              <th class="px-4 py-2 border">App Status</th>
              <th class="px-4 py-2 border">Payment</th>
              <th class="px-4 py-2 border text-center">Actions</th>
            </tr>
          </thead>
          <tbody id="visaTableBody" class="text-sm">
            <!-- Data will be inserted via JS -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  @include('user.Footer')

  <script>
    const applications = [
      {
        id: 'VISA1001',
        name: 'Amit Patel',
        type: 'Tourist',
        status: 'Pending',
        payment: 'Unpaid'
      },
      {
        id: 'VISA1002',
        name: 'Neha Singh',
        type: 'Tourist',
        status: 'Approved',
        payment: 'Paid'
      },
      {
        id: 'VISA1003',
        name: 'Ravi Mehta',
        type: 'Tourist',
        status: 'Rejected',
        payment: 'Refunded'
      }
    ];

    const body = document.getElementById('visaTableBody');
    applications.forEach(app => {
      const row = document.createElement('tr');
      row.classList.add('border-b');
      row.innerHTML = `
        <td class="px-4 py-2 border">${app.id}</td>
        <td class="px-4 py-2 border">${app.name}</td>
        <td class="px-4 py-2 border">${app.type}</td>
        <td class="px-4 py-2 border">
          <span class="px-2 py-1 rounded-full text-white text-xs ${getStatusColor(app.status)}">${app.status}</span>
        </td>
        <td class="px-4 py-2 border">
          <span class="px-2 py-1 rounded-full text-white text-xs ${getPaymentColor(app.payment)}">${app.payment}</span>
        </td>
        <td class="px-4 py-2 border text-center">
          <a href="{{ url('VisaApplicationDetails') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded text-sm">
            View
          </a>
        </td>
      `;
      body.appendChild(row);
    });

    function getStatusColor(status) {
      switch (status) {
        case 'Pending': return 'bg-yellow-500';
        case 'Approved': return 'bg-green-600';
        case 'Rejected': return 'bg-red-600';
        default: return 'bg-gray-500';
      }
    }

    function getPaymentColor(status) {
      switch (status) {
        case 'Paid': return 'bg-green-600';
        case 'Unpaid': return 'bg-red-600';
        case 'Refunded': return 'bg-yellow-600';
        default: return 'bg-gray-500';
      }
    }
  </script>
</body>
</html>
