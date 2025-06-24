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
                  <!-- <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th> -->
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applicant ID</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Applicant Name</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Citizen</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Visa Type</th>
                  <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                  <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase">Action</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y divide-gray-200">
  @foreach($applications as $key => $app)
                <tr class="hover:bg-gray-50 transition">
    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $app->application_id }}</td>
    <td class="px-6 py-4 text-sm text-gray-500">
                      <div class="ml-4">
          <div class="text-sm font-medium text-gray-900">{{ $app->first_name }} {{ $app->last_name }}</div>
          <div class="text-sm text-gray-500">{{ ucfirst($app->visa_type ?? 'Tourist Visa') }}</div>
                    </div>
                  </td>
                  <td class="px-6 py-4">
      <div class="flex items-center">{{ $app->nationality ?? 'Unknown' }} 
        <!-- <img class="h-10 w-10 rounded-full" src="https://randomuser.me/api/portraits/men/{{ rand(1,99) }}.jpg" alt=""> -->
        <!-- <div class="ml-4">
          <div class="text-sm font-medium text-gray-900">{{ $app->first_name }} {{ $app->last_name }}</div>
          <div class="text-sm text-gray-500">{{ ucfirst($app->visa_type ?? 'Tourist Visa') }}</div>
        </div> -->
                    </div>
                  </td>
    <!-- <td class="px-6 py-4 text-sm text-gray-500">{{ $app->nationality ?? 'Unknown' }}</td> -->
    <td class="px-6 py-4 text-sm text-gray-500">{{ ucfirst($app->visa_type ?? 'Tourist') }}</td>
                  <td class="px-6 py-4">
      <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
        {{ $app->status == 'completed' ? 'bg-green-100 text-green-800' : ($app->status == 'pending' ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
        {{ ucfirst($app->status ?? 'Pending') }}
      </span>
                  </td>
                  <td class="px-6 py-4 text-right">
      <button onclick="viewApplication(this)" data-application="{{ json_encode($app) }}"
         class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded text-sm">
        View
      </button>
                  </td>
                </tr>
  @endforeach
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
                      <p><span class="font-medium">Visa Type:</span> <span id="review_visa_type"></span></p>
                      <p><span class="font-medium">Total Price:</span> <span id="review_price" class="text-green-600 font-semibold"></span></p>
                    </div>
                  </div>

                  <!-- Personal Info -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Personal Information</h5>
                    <div class="space-y-2 text-sm">
                      <p><span class="font-medium">First Name:</span> <span id="review_first_name"></span></p>
                      <p><span class="font-medium">Middle Name:</span> <span id="review_middle_name"></span></p>
                      <p><span class="font-medium">Last Name:</span> <span id="review_last_name"></span></p>
                      <p><span class="font-medium">Nationality:</span> <span id="review_nationality"></span></p>
                      <p><span class="font-medium">Birth Date:</span> <span id="review_birth_date"></span></p>
                      <p><span class="font-medium">Gender:</span> <span id="review_gender"></span></p>
                      <p><span class="font-medium">Marital Status:</span> <span id="review_marital_status"></span></p>
                    </div>
                  </div>

                  <!-- Address Info -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Address Information</h5>
                    <div class="space-y-2 text-sm">
                      <p><span class="font-medium">Address:</span> <span id="review_address"></span></p>
                      <p><span class="font-medium">Phone Number:</span> <span id="review_phone_number"></span></p>
                      <p><span class="font-medium">Landmark:</span> <span id="review_landmark"></span></p>
                      <p><span class="font-medium">Country:</span> <span id="review_country"></span></p>
                      <p><span class="font-medium">State:</span> <span id="review_state"></span></p>
                      <p><span class="font-medium">City:</span> <span id="review_city"></span></p>
                      <p><span class="font-medium">Pincode:</span> <span id="review_pincode"></span></p>
                    </div>
                  </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                  <!-- Documents -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Documents</h5>
                    <div id="review_document_links" class="space-y-2">
                      <!-- Document links will be injected here by JavaScript -->
                    </div>
                  </div>

                  <!-- Details -->
                  <div class="bg-gray-50 rounded-lg p-4">
                    <h5 class="font-semibold text-gray-900 mb-3">Additional Details</h5>
                    <div class="space-y-2">
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Passport Number</span>
                        <span id="review_passport_number" class="text-sm font-medium"></span>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Expiry Date</span>
                        <span id="review_passport_expiry_date" class="text-sm font-medium"></span>
                      </div>
                      <div class="flex justify-between items-center py-2 border-b border-gray-200">
                        <span class="text-sm">Pancard Number</span>
                        <span id="review_pan_card_number" class="text-sm font-medium"></span>
                      </div>
                      <div class="flex justify-between items-center py-2">
                        <span class="text-sm">Passport Issue Date</span>
                        <span id="review_passport_issue_date" class="text-sm font-medium"></span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Final Action -->
              <div class="mt-8 bg-gray-50 rounded-lg p-4">
                <h5 class="font-semibold text-gray-900 mb-4">Final Action</h5>
                <form id="updateStatusForm" method="POST" action="">
                    @csrf
                    <input type="hidden" name="status" id="statusInput">
                    
                    <div class="mb-4">
                        <label for="feedback" class="block text-sm font-medium text-gray-700 mb-2">Feedback (Optional)</label>
                        <textarea name="feedback" id="feedback" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Provide feedback or reasons for the decision..."></textarea>
                    </div>

                    <div class="flex space-x-3">
                        <button type="button" onclick="submitUpdate('approved')" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-check mr-2"></i>Approve
                        </button>
                        <button type="button" onclick="submitUpdate('rejected')" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            <i class="fas fa-times mr-2"></i>Reject
                        </button>
                    </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  </div>

  <script>
    function viewApplication(button) {
      const app = JSON.parse(button.dataset.application);
      const baseUrl = '{{ url("/") }}';

      // --- Populate Details ---
      document.getElementById('review_visa_type').textContent = app.visa_type || 'N/A';
      document.getElementById('review_price').textContent = app.price ? `₹${app.price}` : 'N/A';
      
      document.getElementById('review_first_name').textContent = app.first_name || 'N/A';
      document.getElementById('review_middle_name').textContent = app.middle_name || 'N/A';
      document.getElementById('review_last_name').textContent = app.last_name || 'N/A';
      document.getElementById('review_nationality').textContent = app.nationality || 'N/A';
      document.getElementById('review_birth_date').textContent = app.birth_date ? new Date(app.birth_date).toLocaleDateString() : 'N/A';
      document.getElementById('review_gender').textContent = app.gender || 'N/A';
      document.getElementById('review_marital_status').textContent = app.marital_status || 'N/A';

      document.getElementById('review_address').textContent = app.address || 'N/A';
      document.getElementById('review_phone_number').textContent = app.phone_number || 'N/A';
      document.getElementById('review_landmark').textContent = app.landmark || 'N/A';
      document.getElementById('review_country').textContent = app.country || 'N/A';
      document.getElementById('review_state').textContent = app.state || 'N/A';
      document.getElementById('review_city').textContent = app.city || 'N/A';
      document.getElementById('review_pincode').textContent = app.pincode || 'N/A';
      
      document.getElementById('review_passport_number').textContent = app.passport_number || 'N/A';
      document.getElementById('review_passport_expiry_date').textContent = app.passport_expiry_date ? new Date(app.passport_expiry_date).toLocaleDateString() : 'N/A';
      document.getElementById('review_pan_card_number').textContent = app.pan_card_number || 'N/A';
      document.getElementById('review_passport_issue_date').textContent = app.passport_issue_date ? new Date(app.passport_issue_date).toLocaleDateString() : 'N/A';

      // --- Populate Document Links ---
      const docLinksContainer = document.getElementById('review_document_links');
      docLinksContainer.innerHTML = ''; // Clear previous links

      const documents = {
        'Passport Front': app.passport_first_page,
        'Passport Back': app.passport_last_page,
        'Photo': app.photo,
        'PAN Card': app.pan_card,
        'Return Ticket': app.return_ticket,
        'Hotel Booking': app.hotel_details,
      };

      let hasDocuments = false;
      for (const [label, path] of Object.entries(documents)) {
          if (path) {
              hasDocuments = true;
              const url = `${baseUrl}/${path}`;
              const linkHtml = `
                <div class="flex justify-between items-center py-2 border-b last:border-b-0 border-gray-200">
                  <span class="text-sm">${label}</span>
                  <a href="${url}" target="_blank" class="text-blue-600 hover:text-blue-800 text-sm font-medium">View Document</a>
                </div>
              `;
              docLinksContainer.insertAdjacentHTML('beforeend', linkHtml);
          }
      }
      if (!hasDocuments) {
          docLinksContainer.innerHTML = '<p class="text-sm text-gray-500">No documents uploaded.</p>';
      }

      // --- Show Panel ---
      const reviewPanel = document.getElementById("appReviewPanel");
      reviewPanel.style.display = "block";
      reviewPanel.scrollIntoView({ behavior: 'smooth' });
    }

    function submitUpdate(status) {
        const form = document.getElementById('updateStatusForm');
        const statusInput = document.getElementById('statusInput');
        
        const applicationId = JSON.parse(document.querySelector(`[data-application]`).dataset.application).id;

        statusInput.value = status;
        form.action = `/admin/applications/${applicationId}/status`;
        form.submit();
    }
  </script>
</body>
</html> 