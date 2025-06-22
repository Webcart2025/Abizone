<!-- Top Navigation Bar -->
<header class="bg-white border-b border-gray-200 shadow-sm">
    <div class="flex items-center justify-between px-4 sm:px-6 lg:px-8 h-16">
        <!-- Left Section: Logo and Menu Toggle -->
        <div class="flex items-center space-x-4">
            <!-- Mobile Menu Toggle -->
            <button id="mobile-menu-toggle" class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                <i class="fas fa-bars text-lg"></i>
            </button>
            
            <!-- Logo/Brand -->
            <div class="flex items-center space-x-3">
                <div class="flex-shrink-0">
                    <i class="fas fa-globe text-2xl text-blue-600"></i>
                </div>
                <div class="hidden sm:block">
                    <h1 class="text-xl font-bold text-gray-900">ABIZONE</h1>
                    <p class="text-xs text-gray-500">Admin Panel</p>
                </div>
            </div>
        </div>

        <!-- Center Section: Search Bar -->
        <div class="flex-1 max-w-lg mx-4 hidden md:block">
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <i class="fas fa-search text-gray-400"></i>
                </div>
                <input type="text" 
                       class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-1 focus:ring-blue-500 focus:border-blue-500 sm:text-sm" 
                       placeholder="Search applications, users, agents...">
            </div>
        </div>

        <!-- Right Section: Notifications, Profile, etc. -->
        <div class="flex items-center space-x-4">
            <!-- Search Button for Mobile -->
            <button class="md:hidden p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                <i class="fas fa-search"></i>
            </button>

            <!-- Notifications -->
            <div class="relative">
                <button id="notifications-dropdown" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100 relative">
                    <i class="fas fa-bell text-lg"></i>
                    <!-- Notification Badge -->
                    <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">3</span>
                </button>
                
                <!-- Notifications Dropdown -->
                <div id="notifications-menu" class="hidden absolute right-0 mt-2 w-80 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                    <div class="py-1">
                        <div class="px-4 py-2 border-b border-gray-200">
                            <h3 class="text-sm font-semibold text-gray-900">Notifications</h3>
                        </div>
                        <div class="max-h-64 overflow-y-auto">
                            <a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-user-plus text-blue-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">New user registration</p>
                                        <p class="text-sm text-gray-500">John Doe registered as a new user</p>
                                        <p class="text-xs text-gray-400 mt-1">2 minutes ago</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-gray-50 border-b border-gray-100">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-file-alt text-green-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">Visa application submitted</p>
                                        <p class="text-sm text-gray-500">New visa application #VA-2024-001</p>
                                        <p class="text-xs text-gray-400 mt-1">5 minutes ago</p>
                                    </div>
                                </div>
                            </a>
                            <a href="#" class="block px-4 py-3 hover:bg-gray-50">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <i class="fas fa-exclamation-triangle text-yellow-500"></i>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <p class="text-sm font-medium text-gray-900">System alert</p>
                                        <p class="text-sm text-gray-500">Database backup completed</p>
                                        <p class="text-xs text-gray-400 mt-1">1 hour ago</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="px-4 py-2 border-t border-gray-200">
                            <a href="#" class="text-sm text-blue-600 hover:text-blue-800">View all notifications</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="relative">
                <button id="quick-actions-dropdown" class="p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <i class="fas fa-plus text-lg"></i>
                </button>
                
                <!-- Quick Actions Dropdown -->
                <div id="quick-actions-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user-plus mr-2"></i>Add New User
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user-tie mr-2"></i>Add New Agent
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-file-alt mr-2"></i>Create Application
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </a>
                    </div>
                </div>
            </div>

            <!-- User Profile -->
            <div class="relative">
                <button id="user-dropdown" class="flex items-center space-x-2 p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                    <div class="flex-shrink-0">
                        <div class="h-8 w-8 rounded-full bg-blue-600 flex items-center justify-center">
                            <i class="fas fa-user text-white text-sm"></i>
                        </div>
                    </div>
                    <div class="hidden sm:block text-left">
                        <p class="text-sm font-medium text-gray-900">Admin User</p>
                        <p class="text-xs text-gray-500">Super Admin</p>
                    </div>
                    <i class="fas fa-chevron-down text-xs"></i>
                </button>
                
                <!-- User Dropdown Menu -->
                <div id="user-menu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 z-50">
                    <div class="py-1">
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user mr-2"></i>Your Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-cog mr-2"></i>Settings
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-question-circle mr-2"></i>Help
                        </a>
                        <div class="border-t border-gray-100"></div>
                        <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                            <i class="fas fa-sign-out-alt mr-2"></i>Sign out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- JavaScript for Dropdown Functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.getElementById('mobile-menu-toggle');
    const sidebar = document.getElementById('sidebar');
    
    if (mobileMenuToggle && sidebar) {
        mobileMenuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('hidden');
        });
    }

    // Notifications dropdown
    const notificationsDropdown = document.getElementById('notifications-dropdown');
    const notificationsMenu = document.getElementById('notifications-menu');
    
    if (notificationsDropdown && notificationsMenu) {
        notificationsDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            notificationsMenu.classList.toggle('hidden');
            
            // Close other dropdowns
            if (quickActionsMenu) quickActionsMenu.classList.add('hidden');
            if (userMenu) userMenu.classList.add('hidden');
        });
    }

    // Quick actions dropdown
    const quickActionsDropdown = document.getElementById('quick-actions-dropdown');
    const quickActionsMenu = document.getElementById('quick-actions-menu');
    
    if (quickActionsDropdown && quickActionsMenu) {
        quickActionsDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            quickActionsMenu.classList.toggle('hidden');
            
            // Close other dropdowns
            if (notificationsMenu) notificationsMenu.classList.add('hidden');
            if (userMenu) userMenu.classList.add('hidden');
        });
    }

    // User dropdown
    const userDropdown = document.getElementById('user-dropdown');
    const userMenu = document.getElementById('user-menu');
    
    if (userDropdown && userMenu) {
        userDropdown.addEventListener('click', function(e) {
            e.stopPropagation();
            userMenu.classList.toggle('hidden');
            
            // Close other dropdowns
            if (notificationsMenu) notificationsMenu.classList.add('hidden');
            if (quickActionsMenu) quickActionsMenu.classList.add('hidden');
        });
    }

    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        if (notificationsMenu) notificationsMenu.classList.add('hidden');
        if (quickActionsMenu) quickActionsMenu.classList.add('hidden');
        if (userMenu) userMenu.classList.add('hidden');
    });
});
</script> 