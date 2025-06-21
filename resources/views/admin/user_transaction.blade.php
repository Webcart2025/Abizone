<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Visa Transaction Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --secondary: #f9fafb;
            --accent: #10b981;
            --danger: #ef4444;
            --text: #1f2937;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            color: var(--text);
            background-color: #f3f4f6;
        }
        
        .transaction-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        .pagination-btn.active {
            background-color: var(--primary);
            color: white;
        }
        
        .status-completed {
            background-color: #d1fae5;
            color: #065f46;
        }
        
        .status-pending {
            background-color: #fef3c7;
            color: #d97706;
        }
        
        .status-failed {
            background-color: #fee2e2;
            color: #b91c1c;
        }
        
        .status-refunded {
            background-color: #dbeafe;
            color: #1e40af;
        }
        
        .status-processing {
            background-color: #e0e7ff;
            color: #3730a3;
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
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">Visa Transaction Management</h1>
                        <p class="text-gray-600">Manage all visa application payments and transactions</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search transactions..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                        <button class="p-2 text-gray-500 hover:text-gray-700">
                            <i class="fas fa-bell"></i>
                        </button>
                    </div>
                </div>

                <!-- Tabs -->
                <div class="flex border-b border-gray-200 mb-6">
                    <button id="transactions-tab" class="px-4 py-2 font-medium text-sm border-b-2 border-indigo-500 text-indigo-600">Transactions</button>
                    <button id="payments-tab" class="px-4 py-2 font-medium text-sm text-gray-500 hover:text-gray-700">Payment Analytics</button>
                </div>

                <!-- Transactions Section -->
                <div id="transactions-section">
                    <!-- Filters -->
                    <div class="bg-white rounded-lg shadow p-4 mb-6">
                        <div class="flex flex-wrap items-center gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Date Range</label>
                                <div class="flex items-center">
                                    <input type="date" class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <span class="mx-2 text-gray-500">to</span>
                                    <input type="date" class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Status</option>
                                    <option>Completed</option>
                                    <option>Pending</option>
                                    <option>Failed</option>
                                    <option>Refunded</option>
                                    <option>Processing</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Visa Type</label>
                                <select class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Visa Types</option>
                                    <option>Tourist Visa</option>
                                    <option>Business Visa</option>
                                    <option>Student Visa</option>
                                    <option>Work Visa</option>
                                    <option>Transit Visa</option>
                                </select>
                            </div>
                            <button class="ml-auto bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex items-center">
                                <i class="fas fa-filter mr-2"></i> Apply Filters
                            </button>
                        </div>
                    </div>

                    <!-- Transaction List -->
                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="grid grid-cols-12 bg-gray-100 p-4 font-medium text-gray-700">
                            <div class="col-span-2">Transaction ID</div>
                            <div class="col-span-2">Applicant</div>
                            <div class="col-span-2">Visa Type</div>
                            <div class="col-span-1">Country</div>
                            <div class="col-span-1">Amount</div>
                            <div class="col-span-2">Date</div>
                            <div class="col-span-1">Status</div>
                            <div class="col-span-1">Actions</div>
                        </div>
                        
                        <!-- Transaction Items -->
                        <div id="transaction-list">
                            <!-- Sample Transaction 1 -->
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transaction-card transition duration-200">
                                <div class="col-span-2 font-medium text-indigo-600">#VISA-789456</div>
                                <div class="col-span-2">John Doe</div>
                                <div class="col-span-2">Tourist Visa</div>
                                <div class="col-span-1">USA</div>
                                <div class="col-span-1">$150.00</div>
                                <div class="col-span-2">Jun 15, 2023 14:30</div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-completed">Completed</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewTransaction('VISA-789456')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Sample Transaction 2 -->
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transaction-card transition duration-200">
                                <div class="col-span-2 font-medium text-indigo-600">#VISA-789457</div>
                                <div class="col-span-2">Jane Smith</div>
                                <div class="col-span-2">Business Visa</div>
                                <div class="col-span-1">UK</div>
                                <div class="col-span-1">$200.00</div>
                                <div class="col-span-2">Jun 16, 2023 09:15</div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-pending">Pending</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewTransaction('VISA-789457')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Sample Transaction 3 -->
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transaction-card transition duration-200">
                                <div class="col-span-2 font-medium text-indigo-600">#VISA-789458</div>
                                <div class="col-span-2">Robert Johnson</div>
                                <div class="col-span-2">Student Visa</div>
                                <div class="col-span-1">Canada</div>
                                <div class="col-span-1">$180.00</div>
                                <div class="col-span-2">Jun 17, 2023 18:45</div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-failed">Failed</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewTransaction('VISA-789458')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Sample Transaction 4 -->
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transaction-card transition duration-200">
                                <div class="col-span-2 font-medium text-indigo-600">#VISA-789459</div>
                                <div class="col-span-2">Emily Davis</div>
                                <div class="col-span-2">Work Visa</div>
                                <div class="col-span-1">Australia</div>
                                <div class="col-span-1">$250.00</div>
                                <div class="col-span-2">Jun 18, 2023 20:00</div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-refunded">Refunded</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewTransaction('VISA-789459')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <!-- Sample Transaction 5 -->
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 transaction-card transition duration-200">
                                <div class="col-span-2 font-medium text-indigo-600">#VISA-789460</div>
                                <div class="col-span-2">Michael Brown</div>
                                <div class="col-span-2">Transit Visa</div>
                                <div class="col-span-1">Germany</div>
                                <div class="col-span-1">$80.00</div>
                                <div class="col-span-2">Jun 19, 2023 11:20</div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-processing">Processing</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewTransaction('VISA-789460')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-gray-600 hover:text-gray-800">
                                        <i class="fas fa-print"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Pagination -->
                        <div class="p-4 flex justify-between items-center">
                            <div class="text-sm text-gray-600">
                                Showing 1 to 5 of 124 transactions
                            </div>
                            <div class="flex space-x-1">
                                <button class="pagination-btn px-3 py-1 rounded-lg border hover:bg-gray-100">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button class="pagination-btn active px-3 py-1 rounded-lg border">1</button>
                                <button class="pagination-btn px-3 py-1 rounded-lg border hover:bg-gray-100">2</button>
                                <button class="pagination-btn px-3 py-1 rounded-lg border hover:bg-gray-100">3</button>
                                <span class="px-3 py-1">...</span>
                                <button class="pagination-btn px-3 py-1 rounded-lg border hover:bg-gray-100">8</button>
                                <button class="pagination-btn px-3 py-1 rounded-lg border hover:bg-gray-100">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payment Analytics Section (Hidden by default) -->
                <div id="payments-section" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Revenue</p>
                                    <h3 class="text-2xl font-bold text-gray-900">$45,678</h3>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-dollar-sign text-green-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-green-500 text-sm font-medium"><i class="fas fa-arrow-up mr-1"></i> 15% from last month</span>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Successful Transactions</p>
                                    <h3 class="text-2xl font-bold text-gray-900">892</h3>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-check-circle text-blue-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-green-500 text-sm font-medium"><i class="fas fa-arrow-up mr-1"></i> 8% from last month</span>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Failed Transactions</p>
                                    <h3 class="text-2xl font-bold text-gray-900">23</h3>
                                </div>
                                <div class="bg-red-100 p-3 rounded-full">
                                    <i class="fas fa-times-circle text-red-600 text-xl"></i>
                                </div>
                            </div>
                            <div class="mt-2">
                                <span class="text-red-500 text-sm font-medium"><i class="fas fa-arrow-down mr-1"></i> 12% from last month</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-lg shadow p-6">
                        <h3 class="text-lg font-semibold mb-4">Transaction Summary</h3>
                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-indigo-600">Tourist Visa</div>
                                <div class="text-sm text-gray-500">45% of total</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-green-600">Business Visa</div>
                                <div class="text-sm text-gray-500">30% of total</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-blue-600">Student Visa</div>
                                <div class="text-sm text-gray-500">15% of total</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-purple-600">Other</div>
                                <div class="text-sm text-gray-500">10% of total</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Transaction Detail Modal (Hidden by default) -->
                <div id="transactionModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                        <div class="p-6">
                            <div class="flex justify-between items-center border-b pb-4">
                                <h3 class="text-xl font-bold text-gray-800">Transaction Details</h3>
                                <button id="closeModal" class="text-gray-500 hover:text-gray-700" onclick="closeTransactionModal()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                                <div>
                                    <h4 class="text-lg font-medium text-gray-800 mb-4">Transaction Information</h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Transaction ID</label>
                                            <p class="mt-1 text-sm text-gray-900" id="modal-transaction-id">#VISA-789456</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Amount</label>
                                            <p class="mt-1 text-sm text-gray-900">$150.00</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Payment Method</label>
                                            <p class="mt-1 text-sm text-gray-900">Credit Card</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Status</label>
                                            <p class="mt-1 text-sm text-gray-900">Completed</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Date & Time</label>
                                            <p class="mt-1 text-sm text-gray-900">June 15, 2023 at 14:30</p>
                                        </div>
                                    </div>
                                </div>
                                
                                <div>
                                    <h4 class="text-lg font-medium text-gray-800 mb-4">Applicant Information</h4>
                                    <div class="space-y-4">
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Full Name</label>
                                            <p class="mt-1 text-sm text-gray-900">John Doe</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Email</label>
                                            <p class="mt-1 text-sm text-gray-900">john.doe@example.com</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Phone</label>
                                            <p class="mt-1 text-sm text-gray-900">+1 (555) 123-4567</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Visa Type</label>
                                            <p class="mt-1 text-sm text-gray-900">Tourist Visa</p>
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-500">Destination Country</label>
                                            <p class="mt-1 text-sm text-gray-900">United States</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="mt-6 flex justify-end space-x-3">
                                <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    <i class="fas fa-print mr-2"></i> Print Receipt
                                </button>
                                <button class="px-4 py-2 bg-indigo-600 rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                                    <i class="fas fa-download mr-2"></i> Download Invoice
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script>
        // Tab functionality
        const transactionsTab = document.getElementById('transactions-tab');
        const paymentsTab = document.getElementById('payments-tab');
        const transactionsSection = document.getElementById('transactions-section');
        const paymentsSection = document.getElementById('payments-section');
        
        transactionsTab.addEventListener('click', () => {
            transactionsTab.classList.add('border-indigo-500', 'text-indigo-600');
            transactionsTab.classList.remove('text-gray-500');
            paymentsTab.classList.remove('border-indigo-500', 'text-indigo-600');
            paymentsTab.classList.add('text-gray-500');
            
            transactionsSection.classList.remove('hidden');
            paymentsSection.classList.add('hidden');
        });
        
        paymentsTab.addEventListener('click', () => {
            paymentsTab.classList.add('border-indigo-500', 'text-indigo-600');
            paymentsTab.classList.remove('text-gray-500');
            transactionsTab.classList.remove('border-indigo-500', 'text-indigo-600');
            transactionsTab.classList.add('text-gray-500');
            
            paymentsSection.classList.remove('hidden');
            transactionsSection.classList.add('hidden');
        });
        
        // Modal functionality
        function viewTransaction(transactionId) {
            document.getElementById('modal-transaction-id').textContent = '#' + transactionId;
            document.getElementById('transactionModal').classList.remove('hidden');
        }
        
        function closeTransactionModal() {
            document.getElementById('transactionModal').classList.add('hidden');
        }
        
        // Close modal when clicking outside
        document.getElementById('transactionModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeTransactionModal();
            }
        });
    </script>
</body>
</html> 