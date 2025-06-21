<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - User Review Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .star { color: #fbbf24; }
        .star.empty { color: #d1d5db; }
        .rating-5 { background-color: #d1fae5; color: #065f46; }
        .rating-4 { background-color: #dbeafe; color: #1e40af; }
        .rating-3 { background-color: #fef3c7; color: #d97706; }
        .rating-2 { background-color: #fed7aa; color: #ea580c; }
        .rating-1 { background-color: #fee2e2; color: #b91c1c; }
        .status-published { background-color: #d1fae5; color: #065f46; }
        .status-pending { background-color: #fef3c7; color: #d97706; }
        .status-hidden { background-color: #f3f4f6; color: #6b7280; }
        .review-card:hover { transform: translateY(-2px); box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1); }
        .pagination-btn.active { background-color: #4f46e5; color: white; }
    </style>
</head>
<body class="min-h-screen">
    <div class="flex flex-col min-h-screen">
        @include('admin.topnav')
        <div class="flex flex-1 overflow-hidden flex-col md:flex-row">
            @include('admin.sidebar')
            <main class="flex-1 overflow-auto p-4 sm:p-6">
                <div class="flex justify-between items-center mb-6">
                    <div>
                        <h1 class="text-2xl font-bold text-gray-800">User Review Management</h1>
                        <p class="text-gray-600">Manage all user reviews and ratings</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative">
                            <input type="text" placeholder="Search reviews..." class="pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <i class="fas fa-search absolute left-3 top-3 text-gray-400"></i>
                        </div>
                    </div>
                </div>

                <div class="flex border-b border-gray-200 mb-6">
                    <button id="reviews-tab" class="px-4 py-2 font-medium text-sm border-b-2 border-indigo-500 text-indigo-600">All Reviews</button>
                    <button id="analytics-tab" class="px-4 py-2 font-medium text-sm text-gray-500 hover:text-gray-700">Review Analytics</button>
                </div>

                <div id="reviews-section">
                    <div class="bg-white rounded-lg shadow p-4 mb-6">
                        <div class="flex flex-wrap items-center gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                                <select class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Ratings</option>
                                    <option>5 Stars</option>
                                    <option>4 Stars</option>
                                    <option>3 Stars</option>
                                    <option>2 Stars</option>
                                    <option>1 Star</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                                <select class="border rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                                    <option>All Status</option>
                                    <option>Published</option>
                                    <option>Pending</option>
                                    <option>Hidden</option>
                                </select>
                            </div>
                            <button class="ml-auto bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 flex items-center">
                                <i class="fas fa-filter mr-2"></i> Apply Filters
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-lg shadow overflow-hidden">
                        <div class="grid grid-cols-12 bg-gray-100 p-4 font-medium text-gray-700">
                            <div class="col-span-2">User Name</div>
                            <div class="col-span-2">Rating</div>
                            <div class="col-span-4">Review Message</div>
                            <div class="col-span-2">Date</div>
                            <div class="col-span-1">Status</div>
                            <div class="col-span-1">Actions</div>
                        </div>
                        
                        <div id="review-list">
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 review-card transition duration-200 items-center">
                                <div class="col-span-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-blue-100 rounded-full flex items-center justify-center">
                                            <span class="text-blue-600 font-medium">JD</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">John Doe</div>
                                            <div class="text-sm text-gray-500">john.doe@email.com</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex">
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                        </div>
                                        <span class="text-sm font-medium rating-5 px-2 py-1 rounded-full">5.0</span>
                                    </div>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-sm text-gray-900">Excellent service! The visa application process was smooth and professional. The staff was very helpful throughout the entire process.</p>
                                </div>
                                <div class="col-span-2">
                                    <div class="text-sm text-gray-900">Jun 15, 2023</div>
                                    <div class="text-sm text-gray-500">14:30</div>
                                </div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-published">Published</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewReview('1')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-12 p-4 border-b border-gray-200 hover:bg-gray-50 review-card transition duration-200 items-center">
                                <div class="col-span-2">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10 bg-purple-100 rounded-full flex items-center justify-center">
                                            <span class="text-purple-600 font-medium">AS</span>
                                        </div>
                                        <div class="ml-3">
                                            <div class="text-sm font-medium text-gray-900">Alice Smith</div>
                                            <div class="text-sm text-gray-500">alice.smith@email.com</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-span-2">
                                    <div class="flex items-center space-x-2">
                                        <div class="flex">
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="fas fa-star star"></i>
                                            <i class="far fa-star star empty"></i>
                                        </div>
                                        <span class="text-sm font-medium rating-4 px-2 py-1 rounded-full">4.0</span>
                                    </div>
                                </div>
                                <div class="col-span-4">
                                    <p class="text-sm text-gray-900">Good experience overall. The application was processed quickly and the team was responsive to my questions.</p>
                                </div>
                                <div class="col-span-2">
                                    <div class="text-sm text-gray-900">Jun 16, 2023</div>
                                    <div class="text-sm text-gray-500">09:15</div>
                                </div>
                                <div class="col-span-1">
                                    <span class="px-2 py-1 rounded-full text-xs status-pending">Pending</span>
                                </div>
                                <div class="col-span-1 flex space-x-2">
                                    <button class="text-indigo-600 hover:text-indigo-800" onclick="viewReview('2')">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                    <button class="text-green-600 hover:text-green-800">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="text-red-600 hover:text-red-800">
                                        <i class="fas fa-ban"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        
                        <div class="p-4 flex justify-between items-center">
                            <div class="text-sm text-gray-600">
                                Showing 1 to 2 of 124 reviews
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

                <div id="analytics-section" class="hidden">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Average Rating</p>
                                    <h3 class="text-2xl font-bold text-gray-900">4.2</h3>
                                </div>
                                <div class="bg-yellow-100 p-3 rounded-full">
                                    <i class="fas fa-star text-yellow-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Total Reviews</p>
                                    <h3 class="text-2xl font-bold text-gray-900">1,248</h3>
                                </div>
                                <div class="bg-blue-100 p-3 rounded-full">
                                    <i class="fas fa-comments text-blue-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Published Reviews</p>
                                    <h3 class="text-2xl font-bold text-gray-900">1,156</h3>
                                </div>
                                <div class="bg-green-100 p-3 rounded-full">
                                    <i class="fas fa-check-circle text-green-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-white rounded-lg shadow p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <p class="text-gray-500 text-sm">Pending Reviews</p>
                                    <h3 class="text-2xl font-bold text-gray-900">92</h3>
                                </div>
                                <div class="bg-orange-100 p-3 rounded-full">
                                    <i class="fas fa-clock text-orange-600 text-xl"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id="reviewModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
                    <div class="bg-white rounded-lg shadow-xl w-full max-w-4xl max-h-[90vh] overflow-y-auto">
                        <div class="p-6">
                            <div class="flex justify-between items-center border-b pb-4">
                                <h3 class="text-xl font-bold text-gray-800">Review Details</h3>
                                <button id="closeModal" class="text-gray-500 hover:text-gray-700" onclick="closeReviewModal()">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            
                            <div class="mt-6">
                                <div class="flex items-center mb-4">
                                    <div class="flex-shrink-0 h-12 w-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-medium text-lg">JD</span>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg font-medium text-gray-900">John Doe</h4>
                                        <p class="text-sm text-gray-500">john.doe@email.com</p>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="flex items-center">
                                            <div class="flex">
                                                <i class="fas fa-star star text-lg"></i>
                                                <i class="fas fa-star star text-lg"></i>
                                                <i class="fas fa-star star text-lg"></i>
                                                <i class="fas fa-star star text-lg"></i>
                                                <i class="fas fa-star star text-lg"></i>
                                            </div>
                                            <span class="ml-2 text-lg font-medium">5.0</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-500 mb-2">Review Message</label>
                                    <div class="bg-gray-50 p-4 rounded-lg">
                                        <p class="text-gray-900">Excellent service! The visa application process was smooth and professional. The staff was very helpful throughout the entire process.</p>
                                    </div>
                                </div>
                                
                                <div class="mt-6 flex justify-end space-x-3">
                                    <button class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        <i class="fas fa-ban mr-2"></i> Hide Review
                                    </button>
                                    <button class="px-4 py-2 bg-indigo-600 rounded-md text-sm font-medium text-white hover:bg-indigo-700">
                                        <i class="fas fa-check mr-2"></i> Approve & Publish
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
        const reviewsTab = document.getElementById('reviews-tab');
        const analyticsTab = document.getElementById('analytics-tab');
        const reviewsSection = document.getElementById('reviews-section');
        const analyticsSection = document.getElementById('analytics-section');
        
        reviewsTab.addEventListener('click', () => {
            reviewsTab.classList.add('border-indigo-500', 'text-indigo-600');
            reviewsTab.classList.remove('text-gray-500');
            analyticsTab.classList.remove('border-indigo-500', 'text-indigo-600');
            analyticsTab.classList.add('text-gray-500');
            reviewsSection.classList.remove('hidden');
            analyticsSection.classList.add('hidden');
        });
        
        analyticsTab.addEventListener('click', () => {
            analyticsTab.classList.add('border-indigo-500', 'text-indigo-600');
            analyticsTab.classList.remove('text-gray-500');
            reviewsTab.classList.remove('border-indigo-500', 'text-indigo-600');
            reviewsTab.classList.add('text-gray-500');
            analyticsSection.classList.remove('hidden');
            reviewsSection.classList.add('hidden');
        });
        
        function viewReview(reviewId) {
            document.getElementById('reviewModal').classList.remove('hidden');
        }
        
        function closeReviewModal() {
            document.getElementById('reviewModal').classList.add('hidden');
        }
        
        document.getElementById('reviewModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeReviewModal();
            }
        });
    </script>
</body>
</html> 