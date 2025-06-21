<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard - Visa Applications</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    :root {
        --primary: #4f46e5;
        --primary-light: #6366f1;
        --secondary: #f9fafb;
        --dark: #1f2937;
        --light: #f3f4f6;
    }
    
    body {
        font-family: 'Inter', sans-serif;
        background-color: #f5f7fa;
    }
    
    .table-row:hover {
        background-color: #f8fafc;
        transform: translateY(-1px);
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .search-input:focus {
        outline: none;
        box-shadow: 0 0 0 3px rgba(79, 70, 229, 0.2);
    }
    
    .pagination-btn:hover {
        background-color: var(--primary-light);
        color: white;
    }
    
    ::-webkit-scrollbar {
      width: 6px;
    }
    ::-webkit-scrollbar-thumb {
      background-color: #94a3b8;
      border-radius: 3px;
    }
    
    .status-badge {
      font-size: 0.85rem;
    }
    
    .card {
      box-shadow: 0 2px 6px rgba(0, 0, 0, 0.08);
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
        <div class="mb-4">
          <h2 class="text-2xl font-bold text-gray-900">Visa Applications (Users)</h2>
        </div>

        <!-- Visa Applications Table -->
        <div class="bg-white rounded-xl shadow-sm overflow-hidden mb-6">
          <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
              <thead class="bg-gray-50">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applicant ID</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applicant Name</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Citizen</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Visa Type</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
                <tr class="hover:bg-gray-50 transition">
                  <td class="px-6 py-4 text-sm font-medium text-gray-900">1</td>
                  <td class="px-6 py-4 text-sm text-gray-500">User</td>
                  <td class="px-6 py-4">
                    <div class="flex items-center">
                      <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/32.jpg" alt="">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Om Sharma</div>
                        <div class="text-sm text-gray-500">Tourist Visa</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">Canada</td>
                  <td class="px-6 py-4 text-sm text-gray-500">Tourist</td>
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Pending</span>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm" onclick="viewApplication('1')">View</button>
                  </td>
                </tr>
                
                <tr class="hover:bg-gray-50 transition">
                  <td class="px-6 py-4 text-sm font-medium text-gray-900">2</td>
                  <td class="px-6 py-4 text-sm text-gray-500">Agent - YatraLink</td>
                  <td class="px-6 py-4">
                    <div class="flex items-center">
                      <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/women/44.jpg" alt="">
                      <div class="ml-4">
                        <div class="text-sm font-medium text-gray-900">Riya Patel</div>
                        <div class="text-sm text-gray-500">Work Visa</div>
                      </div>
                    </div>
                  </td>
                  <td class="px-6 py-4 text-sm text-gray-500">United States</td>
                  <td class="px-6 py-4 text-sm text-gray-500">Work</td>
                  <td class="px-6 py-4">
                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">Processing</span>
                  </td>
                  <td class="px-6 py-4 text-right">
                    <button class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm" onclick="viewApplication('2')">View</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Visa Application Review Section -->
        <div id="appReviewPanel" class="mt-8" style="display: none;">
          <div class="bg-white rounded-xl shadow-sm overflow-hidden">
            <div class="p-6 border-b border-gray-200">
              <h4 class="text-lg font-semibold text-gray-900">Visa Application Review</h4>
            </div>
            
            <div class="p-6">
              <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Left Column -->
                <div class="space-y-6">
                  <!-- Applicant Info -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Applicant Information</h5>
                    <div class="space-y-2 text-sm">
                      <p><span class="font-medium">Category:</span> <span id="category">Tourist</span></p>
                      <p><span class="font-medium">Entry:</span> <span id="entry">Single Entry</span></p>
                      <p><span class="font-medium">Duration:</span> <span id="duration">30 Days</span></p>
                      <p><span class="font-medium">Total Price:</span> <span id="totalprice" class="text-green-600 font-semibold">₹15,000</span></p>
                    </div>
                  </div>

                  <!-- Personal Info -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Personal Information</h5>
                    <div class="space-y-2 text-sm">
                      <p><span class="font-medium">First Name:</span> Dhruvi</p>
                      <p><span class="font-medium">Middle Name:</span> Ashokbhai</p>
                      <p><span class="font-medium">Last Name:</span> Mangroliya</p>
                      <p><span class="font-medium">Nationality:</span> Indian</p>
                      <p><span class="font-medium">Birth Date:</span> 6th Feb 2005</p>
                      <p><span class="font-medium">Gender:</span> Female</p>
                      <p><span class="font-medium">Marital Status:</span> Unmarried</p>
                    </div>
                  </div>

                  <!-- Address Info -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Address Information</h5>
                    <div class="space-y-2 text-sm">
                      <p><span class="font-medium">Address:</span> Naranpura Ahmedabad</p>
                      <p><span class="font-medium">Phone Number:</span> 9960061354</p>
                      <p><span class="font-medium">Landmark:</span> Ahmedabad</p>
                      <p><span class="font-medium">Country:</span> India</p>
                      <p><span class="font-medium">State:</span> Gujarat</p>
                      <p><span class="font-medium">City:</span> Ahmedabad</p>
                      <p><span class="font-medium">Pincode:</span> 380051</p>
                    </div>
                  </div>

                  <!-- Payment -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Payment Information</h5>
                    <div class="space-y-2 text-sm">
                      <p><span class="font-medium">Status:</span> <span class="text-green-600 font-semibold">Paid</span></p>
                      <p><span class="font-medium">Transaction ID:</span> TXN123456</p>
                    </div>
                  </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                  <!-- Documents -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Documents</h5>
                    <div class="space-y-2">
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Passport Front</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Passport Back</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Travel Photo</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Return Ticket</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Pan Card</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                      </div>
                      <div class="flex justify-between items-center py-2">
                        <span class="text-sm">Hotel Booking</span>
                        <a href="#" class="text-blue-600 hover:text-blue-800 text-sm">View</a>
                      </div>
                    </div>
                  </div>

                  <!-- Details -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Additional Details</h5>
                    <div class="space-y-2">
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Passport Number</span>
                        <span class="text-sm font-medium">A12345678</span>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Expiry Date</span>
                        <span class="text-sm font-medium">2028-12-31</span>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Pancard Number</span>
                        <span class="text-sm font-medium">ABCDE1234F</span>
                      </div>
                      <div class="flex justify-between items-center py-2">
                        <span class="text-sm">Passport Issue Date</span>
                        <span class="text-sm font-medium">2020-01-15</span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Final Action -->
              <div class="mt-8 bg-gray-50 rounded-lg p-4">
                <h5 class="font-semibold text-gray-900 mb-4">Final Action</h5>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Change Status</label>
                    <select class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                      <option value="pending">Pending</option>
                      <option value="processing">Processing</option>
                      <option value="approved">Approved</option>
                      <option value="cancelled">Cancelled</option>
                    </select>
                  </div>
                  <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Upload Visa File</label>
                    <input type="file" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />
                  </div>
                </div>
                <div class="flex space-x-3">
                  <button class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Approve
                  </button>
                  <button class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                    Reject
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
    function viewApplication(id) {
      document.getElementById("appReviewPanel").style.display = "block";
      // Scroll to the review panel
      document.getElementById("appReviewPanel").scrollIntoView({ behavior: 'smooth' });
    }
  </script>
</body>
</html> 