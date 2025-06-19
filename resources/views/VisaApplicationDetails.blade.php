<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Visa Application Details</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

  @include('AgentNavbar')

  <!-- Main Content -->
  <main class="flex-1 py-10 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto bg-white p-8 shadow-xl rounded-xl">
      <h1 class="text-3xl font-bold text-blue-700 mb-6 text-center">Visa Application Details</h1>

      <div class="grid grid-cols-1 md:grid-cols-2 gap-6 text-sm text-gray-700">
        <div><strong>Application ID:</strong> VISA1001</div>
        <div><strong>Visa Type:</strong> Tourist</div>
        <div><strong>Full Name:</strong> Amit Patel</div>
        <div><strong>Nationality:</strong> India</div>
        <div><strong>Passport No:</strong> A1234567</div>
        <div><strong>Date of Birth:</strong> 1995-08-10</div>
        <div><strong>Gender:</strong> Male</div>
        <div><strong>Marital Status:</strong> Single</div>
        <div><strong>Passport Issue:</strong> 2018-01-01</div>
        <div><strong>Passport Expiry:</strong> 2028-01-01</div>
        <div><strong>PAN Card:</strong> AB1234567C</div>
        <div><strong>Phone Number:</strong> +91-9876543210</div>
        <div><strong>Address:</strong> 123 Gandhi Nagar, Mumbai</div>
        <div><strong>City:</strong> Mumbai</div>
        <div><strong>State:</strong> Maharashtra</div>
        <div><strong>Pincode:</strong> 400001</div>
        <div><strong>Payment:</strong> <span class="text-green-600 font-semibold">Paid</span></div>
        <div><strong>Status:</strong> <span class="text-yellow-600 font-semibold">Pending</span></div>
      </div>

      <h2 class="text-xl font-semibold mt-8 mb-3 text-gray-800">Uploaded Documents</h2>
      <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div>
          <p class="text-sm font-medium mb-1">Passport First Page</p>
          <img src="https://via.placeholder.com/150" class="border rounded shadow" alt="First Page">
        </div>
        <div>
          <p class="text-sm font-medium mb-1">Passport Last Page</p>
          <img src="https://via.placeholder.com/150" class="border rounded shadow" alt="Last Page">
        </div>
        <div>
          <p class="text-sm font-medium mb-1">PAN Card</p>
          <img src="https://via.placeholder.com/150" class="border rounded shadow" alt="PAN Card">
        </div>
        <div>
          <p class="text-sm font-medium mb-1">Photograph</p>
          <img src="https://via.placeholder.com/150" class="border rounded shadow" alt="Photograph">
        </div>
      </div>

      <div class="mt-6 flex justify-end">
        <button onclick="window.history.back()" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">Back</button>
      </div>
    </div>
  </main>

  @include('Footer')

</body>
</html>

