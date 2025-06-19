<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Visa Application Form - Multiple Users</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .input {
      @apply border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400;
    }
    .file-upload-container {
      @apply bg-blue-50 p-4 rounded-lg shadow-md mb-6;
    }
    .file-upload-container h3 {
      @apply text-lg font-semibold mb-4;
    }
  </style>
</head>
<body class="bg-gray-100 flex flex-col min-h-screen">
@include('AgentNavbar')

<main class="flex-grow">
<div class="max-w-6xl mx-auto bg-white p-10 mt-12 mb-12 rounded-xl shadow-md">
      <h2 class="text-3xl font-bold mb-8 text-center text-blue-700">Visa Application Form (Max 4 Users)</h2>

    <div id="users-container"></div>

    <div class="text-center mt-6">
      <button id="add-user" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition">Add User</button>
      <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
      Submit All Applications
    </button>
    </div>
    </main>
    <script>
      let userCount = 0;
      const maxUsers = 4;
      const container = document.getElementById('users-container');

      function createUserForm(index) {
        return `
          <div class="border border-gray-300 rounded-lg mb-10 p-6">
            <h3 class="text-xl font-semibold mb-4 text-blue-600">User ${index + 1}</h3>

            <div class="file-upload-container">
              <h3>Upload Documents</h3>
              <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <label class="input">Passport First Page <input type="file" name="passport_first_page_${index}" id="passportFirstPage${index}" required></label>
                <label class="input">Passport Last Page <input type="file" name="passport_last_page_${index}" required></label>
                <label class="input">Traveller Photo <input type="file" name="traveller_photo_${index}" required></label>
                <label class="input">PAN Card <input type="file" name="pan_card_${index}"></label>
                <label class="input">Return Ticket <input type="file" name="return_ticket_${index}" required></label>
                <label class="input">Hotel Booking <input type="file" name="hotel_booking_${index}" required></label>
              </div>
            </div>

            <form class="grid grid-cols-1 md:grid-cols-2 gap-6" enctype="multipart/form-data">
              <input type="text" name="first_name_${index}" placeholder="First Name" required class="input">
              <input type="text" name="middle_name_${index}" placeholder="Middle Name" class="input">
              <input type="text" name="last_name_${index}" placeholder="Last Name" required class="input">
              <input type="text" name="nationality_${index}" placeholder="Nationality" required class="input">
              <input type="text" name="passport_number_${index}" id="passportNumber${index}" placeholder="Passport Number" required class="input">
              <input type="date" name="birth_date_${index}" required class="input">

              <select name="gender_${index}" required class="input">
                <option value="">Select Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Other">Other</option>
              </select>

              <select name="marital_status_${index}" required class="input">
                <option value="">Select Marital Status</option>
                <option value="Single">Single</option>
                <option value="Married">Married</option>
                <option value="Divorced">Divorced</option>
                <option value="Widowed">Widowed</option>
              </select>

              <input type="date" name="passport_issue_date_${index}" required class="input">
              <input type="date" name="passport_expiry_date_${index}" required class="input">
              <input type="text" name="pan_card_number_${index}" placeholder="PAN Card Number" class="input">
              <input type="text" name="phone_number_${index}" placeholder="Phone Number" required class="input">
              <input type="text" name="landmark_${index}" placeholder="Landmark" class="input">
              <textarea name="address_${index}" placeholder="Full Address" required class="input"></textarea>
              <input type="text" name="country_${index}" placeholder="Country" required class="input">
              <input type="text" name="state_${index}" placeholder="State" required class="input">
              <input type="text" name="city_${index}" placeholder="City" required class="input">
              <input type="text" name="pincode_${index}" placeholder="Pincode" required class="input">
            </form>
          </div>
        `;
      }

      function addUserForm() {
        if (userCount < maxUsers) {
          container.insertAdjacentHTML('beforeend', createUserForm(userCount));

          // Auto-fill simulation for each user's passport number
          setTimeout(() => {
            const input = document.getElementById(`passportFirstPage${userCount}`);
            const field = document.getElementById(`passportNumber${userCount}`);
            input?.addEventListener("change", function () {
              setTimeout(() => {
                if (field) field.value = `P123456${userCount}`;
                alert(`User ${userCount + 1} passport number auto-filled.`);
              }, 1000);
            });
          }, 100);

          userCount++;
        } else {
          alert("Maximum 4 users allowed.");
        }
      }

      document.getElementById("add-user").addEventListener("click", addUserForm);

      // Initialize first form on page load
      window.onload = addUserForm;
    </script>


    @include('Footer')
</body>
</html>