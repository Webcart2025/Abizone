<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page Example</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
</head>
<body class="bg-white font-sans text-gray-900">
    <div class="flex flex-col min-h-screen">
        <!-- Include Top Navigation -->
        @include('admin.topnav')

        <div class="flex flex-1 overflow-hidden flex-col md:flex-row">
            <!-- Include Sidebar -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <main class="flex-1 overflow-auto p-4 sm:p-6">
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-900">Your Page Title</h1>
                    <p class="text-gray-600 mt-2">Your page description goes here</p>
                </div>

                <!-- Your page content goes here -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-lg font-semibold mb-4">Content Section</h2>
                    <p>This is where your main content will go. The top navigation is now included at the top of every admin page.</p>
                </div>
            </main>
        </div>
    </div>
</body>
</html> 