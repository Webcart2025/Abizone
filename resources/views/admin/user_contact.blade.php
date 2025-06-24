<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Contact Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #3b82f6;
            --secondary-color: #1e40af;
            --accent-color: #10b981;
            --dark-color: #1f2937;
            --light-color: #f9fafb;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f3f4f6;
        }
        
        .contact-card {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #d97706;
        }
        
        .status-completed {
            background-color: #d1fae5;
            color: #059669;
        }
        
        .status-followup {
            background-color: #dbeafe;
            color: #2563eb;
        }
        
        .search-input:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        .pagination-btn.active {
            background-color: var(--primary-color);
            color: white;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
                position: absolute;
                z-index: 10;
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .overlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 5;
            }
            
            .overlay.active {
                display: block;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex flex-col min-h-screen">
        <!-- Include Top Navigation -->
        @include('admin.topnav')

        <div class="flex flex-1 overflow-hidden flex-col md:flex-row">
            <!-- Sidebar -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <main class="flex-1 overflow-auto p-4 sm:p-6">
                <!-- Mobile Header -->
                <div class="md:hidden flex justify-between items-center mb-6">
                    <button id="sidebarToggle" class="text-gray-700">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                    <h1 class="text-xl font-bold text-blue-600">Contact Inquiries</h1>
                    <div class="w-8"></div> <!-- Spacer for alignment -->
                </div>
                
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800 hidden md:block">Contact Inquiries</h1>
                        <p class="text-gray-600">Manage all contact form submissions</p>
                    </div>
                    <div class="flex items-center space-x-2">
                        <div class="relative">
                            <input type="text" placeholder="Search inquiries..." class="search-input pl-10 pr-4 py-2 border border-gray-300 rounded-md focus:border-blue-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <button class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md flex items-center">
                            <i class="fas fa-filter mr-2"></i> Filter
                        </button>
                    </div>
                </div>
                
                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">Total Inquiries</p>
                                <h3 class="text-2xl font-bold">{{ $totalInquiries ?? 0 }}</h3>
                            </div>
                            <div class="bg-blue-100 p-3 rounded-full">
                                <i class="fas fa-envelope text-blue-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">Pending</p>
                                <h3 class="text-2xl font-bold">{{ $pendingInquiries ?? 0 }}</h3>
                            </div>
                            <div class="bg-yellow-100 p-3 rounded-full">
                                <i class="fas fa-clock text-yellow-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded-lg shadow">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-sm">Completed</p>
                                <h3 class="text-2xl font-bold">{{ $completedInquiries ?? 0 }}</h3>
                            </div>
                            <div class="bg-green-100 p-3 rounded-full">
                                <i class="fas fa-check-circle text-green-600 text-xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Inquiry Table -->
                <div class="bg-white rounded-lg shadow overflow-hidden mb-6">
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Contact Info</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Country</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Inquiry Type</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @forelse ($contacts as $contact)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                                <span class="text-blue-600 font-medium">{{ strtoupper(substr($contact->first_name, 0, 1) . substr($contact->last_name, 0, 1)) }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">{{ $contact->first_name }} {{ $contact->last_name }}</div>
                                                <div class="text-sm text-gray-500">{{ $contact->created_at->format('Y-m-d') }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $contact->email }}</div>
                                        <div class="text-sm text-gray-500">{{ $contact->mobile_number }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $contact->resident_country }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{ $contact->enquiry_type }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm text-gray-900 truncate max-w-xs">{{ $contact->message }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-2 py-1 text-xs rounded-full status-{{ $contact->status }}">{{ ucfirst($contact->status) }}</span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <button class="text-blue-600 hover:text-blue-900 mr-3" onclick='openInquiryModal(@json($contact))'><i class="fas fa-eye"></i></button>
                                        <button class="text-green-600 hover:text-green-900 mr-3"><i class="fas fa-check"></i></button>
                                        <button class="text-red-600 hover:text-red-900"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-gray-500">No contact inquiries found.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                
                <!-- Pagination -->
                <div class="px-4 py-3">
                    {{ $contacts->links() }}
                </div>
                
                <!-- Inquiry Detail Modal (Hidden by default) -->
                <div id="inquiryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                        <div class="p-6">
                            <div class="flex justify-between items-center border-b pb-4">
                                <h3 class="text-xl font-bold text-gray-800">Inquiry Details</h3>
                                <button id="closeModal" class="text-gray-500 hover:text-gray-700" onclick="closeInquiryModal()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <h4 class="text-lg font-medium text-gray-800 mb-4">Personal Information</h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">First Name</label>
                                            <p id="modal_first_name" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Last Name</label>
                                            <p id="modal_last_name" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Email</label>
                                            <p id="modal_email" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Phone Number</label>
                                            <p id="modal_mobile_number" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Country</label>
                                            <p id="modal_resident_country" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h4 class="text-lg font-medium text-gray-800 mb-4">Inquiry Details</h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Inquiry Type</label>
                                            <p id="modal_enquiry_type" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">How Can We Assist You?</label>
                                            <p id="modal_message" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Submitted On</label>
                                            <p id="modal_created_at" class="mt-1 text-sm text-gray-900"></p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Status</label>
                                            <select id="modal_status" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm rounded-md">
                                                <option value="pending">Pending</option>
                                                <option value="completed">Completed</option>
                                                <option value="followup">Follow Up</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6">
                                <h4 class="text-lg font-medium text-gray-800 mb-4">Admin Response</h4>
                                <textarea class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500" rows="4" placeholder="Enter your response here..."></textarea>
                            </div>
                            
                            <div class="mt-6 flex justify-end space-x-3">
                                <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    Save as Draft
                                </button>
                                <button class="px-4 py-2 bg-blue-600 rounded-md text-sm font-medium text-white hover:bg-blue-700">
                                    Send Response
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Modal functionality
        function openInquiryModal(contact) {
            document.getElementById('modal_first_name').textContent = contact.first_name;
            document.getElementById('modal_last_name').textContent = contact.last_name;
            document.getElementById('modal_email').textContent = contact.email;
            document.getElementById('modal_mobile_number').textContent = contact.mobile_number;
            document.getElementById('modal_resident_country').textContent = contact.resident_country;
            document.getElementById('modal_enquiry_type').textContent = contact.enquiry_type;
            document.getElementById('modal_message').textContent = contact.message;
            document.getElementById('modal_created_at').textContent = new Date(contact.created_at).toLocaleString();
            document.getElementById('modal_status').value = contact.status;
            document.getElementById('inquiryModal').classList.remove('hidden');
        }
        
        function closeInquiryModal() {
            document.getElementById('inquiryModal').classList.add('hidden');
        }
        
        // Close modal when clicking outside
        document.getElementById('inquiryModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeInquiryModal();
            }
        });
        
        // Mobile sidebar toggle
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.querySelector('.sidebar');
        const overlay = document.querySelector('.overlay');
        
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                sidebar.classList.toggle('active');
                overlay.classList.toggle('active');
            });
        }
        
        if (overlay) {
            overlay.addEventListener('click', () => {
                sidebar.classList.remove('active');
                overlay.classList.remove('active');
            });
        }
    </script>
</body>
</html> 