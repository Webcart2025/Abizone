<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>User Profile</title>

  <!-- Bootstrap CSS CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome CDN (for icons) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

  <style>
    body {
      background-color: #eee;
    }
    .card {
      border: none;
      border-radius: 15px;
    }
    .card-body {
      padding: 1.5rem;
    }
    .progress {
      background-color: #e9ecef;
    }
    .progress-bar {
      background-color: #0d6efd;
    }
    .breadcrumb-item + .breadcrumb-item::before {
      content: ">";
    }
    .text-muted {
      font-size: 0.9rem;
    }
  </style>
</head>
<body>
  
@include('AgentNavbar')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <!-- <div class="col">
        <nav aria-label="breadcrumb" class="bg-light rounded-3 p-3 mb-4">
          <ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">User</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
          </ol>
        </nav>
      </div> -->
    </div>

    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">username</h5>
            <p class="text-muted mb-1"></p>
            <p class="text-muted mb-4"></p>
            <div class="d-flex justify-content-center mb-2">
              <!-- <button type="button" class="btn btn-primary">Follow</button>
              <button type="button" class="btn btn-outline-primary ms-1">Message</button> -->
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            
            <ul class="list-group list-group-flush rounded-3">
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
              <i class=" text-info">Application Id :- </i>
              <p class="mb-0">App id</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
    <i class="text-info">Details Preview :-</i>
    <button class="btn btn-sm btn-outline-primary" id="viewDetailsBtn" >View</button>
</li>

<!-- Modal to show user details -->
<div class="modal" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailsModalLabel">User Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Form to show user details -->
                <form id="userDetailsForm">
                    @csrf
                    <div class="form-group">
                        <label for="application_id">Application ID</label>
                        <input type="text" class="form-control" id="application_id" name="application_id" disabled>
                    </div>
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <input type="text" class="form-control" id="first_name" name="first_name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" id="middle_name" name="middle_name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nationality">Nationality</label>
                        <input type="text" class="form-control" id="nationality" name="nationality" disabled>
                    </div>
                    <div class="form-group">
                        <label for="passport_number">Passport Number</label>
                        <input type="text" class="form-control" id="passport_number" name="passport_number" disabled>
                    </div>
                    <div class="form-group">
                        <label for="birth_date">Birth Date</label>
                        <input type="text" class="form-control" id="birth_date" name="birth_date" disabled>
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <input type="text" class="form-control" id="gender" name="gender" disabled>
                    </div>
                    <div class="form-group">
                        <label for="marital_status">Marital Status</label>
                        <input type="text" class="form-control" id="marital_status" name="marital_status" disabled>
                    </div>
                    <div class="form-group">
                        <label for="passport_issue_date">Passport Issue Date</label>
                        <input type="text" class="form-control" id="passport_issue_date" name="passport_issue_date" disabled>
                    </div>
                    <div class="form-group">
                        <label for="passport_expiry_date">Passport Expiry Date</label>
                        <input type="text" class="form-control" id="passport_expiry_date" name="passport_expiry_date" disabled>
                    </div>
                    <div class="form-group">
                        <label for="pan_card_number">Pan Card Number</label>
                        <input type="text" class="form-control" id="pan_card_number" name="pan_card_number" disabled>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea class="form-control" id="address" name="address" disabled></textarea>
                    </div>
                    <div class="form-group">
                        <label for="phone_number">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" disabled>
                    </div>
                    <div class="form-group">
                        <label for="landmark">Landmark</label>
                        <input type="text" class="form-control" id="landmark" name="landmark" disabled>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input type="text" class="form-control" id="country" name="country" disabled>
                    </div>
                    <div class="form-group">
                        <label for="state">State</label>
                        <input type="text" class="form-control" id="state" name="state" disabled>
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" class="form-control" id="city" name="city" disabled>
                    </div>
                    <div class="form-group">
                        <label for="pincode">Pincode</label>
                        <input type="text" class="form-control" id="pincode" name="pincode" disabled>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<script>
document.getElementById('viewDetailsBtn').addEventListener('click', function() {
    let visaApplicationId = this.getAttribute('data-id');
    
    // Correct URL using template literal
    fetch(`/visa-applications/${visaApplicationId}`)
        .then(response => response.json())
        .then(data => {
            document.getElementById('application_id').value = data.application_id;
            document.getElementById('first_name').value = data.first_name;
            document.getElementById('middle_name').value = data.middle_name;
            document.getElementById('last_name').value = data.last_name;
            document.getElementById('nationality').value = data.nationality;
            document.getElementById('passport_number').value = data.passport_number;
            document.getElementById('birth_date').value = data.birth_date;
            document.getElementById('gender').value = data.gender;
            document.getElementById('marital_status').value = data.marital_status;
            document.getElementById('passport_issue_date').value = data.passport_issue_date;
            document.getElementById('passport_expiry_date').value = data.passport_expiry_date;
            document.getElementById('pan_card_number').value = data.pan_card_number;
            document.getElementById('address').value = data.address;
            document.getElementById('phone_number').value = data.phone_number;
            document.getElementById('landmark').value = data.landmark;
            document.getElementById('country').value = data.country;
            document.getElementById('state').value = data.state;
            document.getElementById('city').value = data.city;
            document.getElementById('pincode').value = data.pincode;

            // Bootstrap 5 Modal show
            var modal = new bootstrap.Modal(document.getElementById('detailsModal'));
            modal.show();
        })
        .catch(error => console.error('Error fetching data:', error));
});
</script>

              <!-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="text-info">Document Preview :-</i>
                <button class="btn btn-sm btn-outline-primary">View</button>
              </li> -->
             
              <!-- <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-twitter fa-lg text-info"></i>
                <p class="mb-0">@mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-instagram fa-lg text-danger"></i>
                <p class="mb-0">mdbootstrap</p>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fab fa-facebook-f fa-lg text-primary"></i>
                <p class="mb-0">mdbootstrap</p>
              </li> -->
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-4">
        <div class="card-body position-relative">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h5 class="mb-0">User Information</h5>
    <button type="button" onclick="toggleEdit()" class="btn btn-sm btn-outline-primary" id="editBtn">
      <i class="fas fa-edit me-1"></i> Edit
    </button>
  </div>

  <!-- <form method="POST" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT') -->

    <div class="row mb-3">
      <div class="col-sm-3"><p class="mb-0">Full Name</p></div>
      <div class="col-sm-9">
        <p class="text-muted mb-0 view-mode"></p>
        <input type="text" class="form-control edit-mode d-none" name="name" value="">
      </div>
    </div><hr>

    <div class="row mb-3">
      <div class="col-sm-3"><p class="mb-0">Email</p></div>
      <div class="col-sm-9">
        <p class="text-muted mb-0 view-mode"></p>
        <input type="email" class="form-control edit-mode d-none" name="email" value="">
      </div>
    </div><hr>

    <div class="row mb-3">
      <div class="col-sm-3"><p class="mb-0">Mobile</p></div>
      <div class="col-sm-9">
        <p class="text-muted mb-0 view-mode">{{ $user->mobilenumber ?? '-' }}</p>
        <input type="text" class="form-control edit-mode d-none" name="mobilenumber" value="">
      </div>
    </div><hr>

    <div class="text-end edit-mode d-none">
      <button type="submit" class="btn btn-primary">Save</button>
      <button type="button" onclick="toggleEdit()" class="btn btn-secondary">Cancel</button>
    </div>
  </form>
</div>

<script>
  function toggleEdit() {
    const editFields = document.querySelectorAll('.edit-mode');
    const viewFields = document.querySelectorAll('.view-mode');
    const editBtn = document.getElementById('editBtn');

    editFields.forEach(el => el.classList.toggle('d-none'));
    viewFields.forEach(el => el.classList.toggle('d-none'));

    if (editBtn.innerText.trim() === 'Edit') {
      editBtn.innerHTML = '<i class="fas fa-times me-1"></i> Cancel';
    } else {
      editBtn.innerHTML = '<i class="fas fa-edit me-1"></i> Edit';
    }
  }
</script>


        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <p class="mb-4"><span class="text-primary font-italic me-1"></span> Visa Status</p>
                <p class="mb-1" style="font-size: .77rem;">Payment</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 80%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Personal Details</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 72%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Documents</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 89%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Visa officer</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                  <!-- <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                  <div class="progress rounded" style="height: 5px;">
                    <div class="progress-bar" style="width: 66%"></div> -->
                </div>
              </div>
            </div>
          </div>
          <!-- Duplicate project card on right side -->
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <!-- <p class="mb-4"><span class="text-primary font-italic me-1">Assignment</span> Project Status</p>
                <p class="mb-1" style="font-size: .77rem;">Web Design</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 80%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Website Markup</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 72%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">One Page</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 89%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Mobile Template</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 55%"></div>
                </div>
                <p class="mt-4 mb-1" style="font-size: .77rem;">Backend API</p>
                <div class="progress rounded" style="height: 5px;">
                  <div class="progress-bar" style="width: 66%"></div> -->
                </div>
              </div>
            </div>
          </div>
        </div><!-- row -->
      </div><!-- col-lg-8 -->
    </div><!-- row -->
  </div><!-- container -->
</section>
@include('AgentFooter')

  </body>
</html>