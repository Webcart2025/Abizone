<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Agent Registration</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('asset/css/AgentSide/AgentRegistration.css') }}" />
</head>
<body class="bg-gray-100">
  @include('Navbar2')

  <div class="px-4 py-10">
    <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-lg">
      <h1 class="text-2xl font-bold text-center mb-6">Agent Registration</h1>
      <!-- <form  action="{{ url('/AgentRegistration') }}"  method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf -->

        <!-- Personal Info -->
        <div>
          <h2 class="section-title">Personal Information</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="full_name" placeholder="Full Name" class="input" required />
            <input type="email" name="email" placeholder="Email Address" class="input" required />
            <input type="tel" name="phone" placeholder="Mobile Number" class="input" required />
            <input type="date" name="dob" class="input" required />
            <select name="gender" class="input" required>
              <option value="">Select Gender</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
          </div>
        </div>

        <!-- Address -->
        <div>
          <h2 class="section-title">Address</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="address_line1" placeholder="Address Line 1" class="input" required />
            <input type="text" name="address_line2" placeholder="Address Line 2" class="input" />
            <input type="text" name="city" placeholder="City" class="input" required />
            <input type="text" name="state" placeholder="State" class="input" required />
            <input type="text" name="country" placeholder="Country" class="input" required />
            <input type="text" name="postal_code" placeholder="Postal Code" class="input" required />
          </div>
        </div>

        <!-- ID Verification -->
        <div>
          <h2 class="section-title">ID Verification</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <select name="id_type" class="input" required>
              <option value="">Select ID Type</option>
              <option>Aadhaar</option>
              <option>PAN</option>
              <option>Passport</option>
            </select>
            <input type="text" name="id_number" placeholder="ID Number" class="input" required />
            <input type="file" name="agency_proof_upload" class="input" />
          </div>
        </div>

        <!-- Agency Info -->
        <div>
          <h2 class="section-title">Agency Information</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="agency_name" placeholder="Agency/Company Name" class="input" required />
            <input type="number" name="experience" placeholder="Experience (years)" class="input" required />
          </div>
        </div>

        <!-- Bank Info -->
        <div>
          <h2 class="section-title">Bank Details</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <input type="text" name="bank_account_name" placeholder="Account Holder Name" class="input" required />
            <input type="text" name="bank_account_no" placeholder="Account Number" class="input" required />
            <input type="text" name="ifsc_code" placeholder="IFSC Code" class="input" required />
            <input type="text" name="bank_name" placeholder="Bank Name" class="input" required />
            <input type="text" name="bank_branch" placeholder="Branch (Optional)" class="input" />
            <input type="file" name="bank_doc_upload" class="input" />
          </div>
        </div>

        <!-- Terms -->
        <div class="flex items-center space-x-2">
          <input type="checkbox" name="terms_agree" required />
          <label for="terms_agree" class="text-sm">I agree to the Terms & Conditions</label>
        </div>
        <div class="text-center">
  <button onclick="window.location.href='AgentDashboard';" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
    Register
  </button> 
</div>

        </div>
      </form>
    </div>
  </div>

  @include('footer')
</body>
</html>
