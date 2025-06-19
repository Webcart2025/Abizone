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
      box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }
    .card-body {
      padding: 1.5rem;
    }
    .progress {
      background-color: #e9ecef;
    }
    .progress-bar {
      background-color: #ead537;
      transition: width 0.6s ease;
    }
    .breadcrumb-item + .breadcrumb-item::before {
      content: ">";
    }
    .text-muted {
      font-size: 0.9rem;
      color: #6c757d!important;
    }
    .application-id {
      font-weight: 600;
      color: #ead537;
      background-color: rgba(234, 213, 55, 0.1);
      padding: 3px 8px;
      border-radius: 4px;
    }
    .status-badge {
      padding: 3px 8px;
      border-radius: 12px;
      font-size: 0.75rem;
      font-weight: 600;
    }
    .status-pending {
      background-color: #fff3cd;
      color: #856404;
    }
    .status-approved {
      background-color: #d4edda;
      color: #155724;
    }
    .status-rejected {
      background-color: #f8d7da;
      color: #721c24;
    }
  </style>
</head>
<body>
@include('navbar2')
<section style="background-color: #eee;">
  <div class="container py-5">
    <div class="row">
      <div class="col-lg-4">
        <div class="card mb-4">
          <div class="card-body text-center">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
              class="rounded-circle img-fluid" style="width: 150px;">
            <h5 class="my-3">{{ $user->name }}</h5>
            <p class="text-muted mb-1">Visa Applicant</p>
            @if($visaApplication)
            <p class="text-muted mb-4">
              <span class="application-id">{{ $visaApplication->application_id }}</span>
            </p>
            @endif
            <div class="d-flex justify-content-center mb-2">
              <!-- Additional buttons can go here -->
            </div>
          </div>
        </div>
        <div class="card mb-4 mb-lg-0">
          <div class="card-body p-0">
            <ul class="list-group list-group-flush rounded-3">
            <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-id-card text-info me-2"></i>
                <p class="mb-0">Application ID</p>
                <span class="badge bg-light text-dark">
                    @if($visaApplication)
                        {{ $visaApplication->application_id }}
                    @else
                        N/A
                    @endif
                </span>
            </li>
              
              <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                <i class="fas fa-file-alt text-info me-2"></i>
                <p class="mb-0">Document Preview</p>
                <button class="btn btn-sm btn-outline-primary" style="color: #ead537; border-color: #ead537;">
                  <i class="fas fa-eye me-1"></i> View
                </button>
              </li>
              
            </ul>
          </div>
        </div>
      </div>

      <div class="col-lg-8">
        <div class="card mb-4">
          <div class="card-body position-relative">
            <div class="d-flex justify-content-between align-items-center mb-3">
              <h5 class="mb-0">User Information</h5>
              <button type="button" onclick="toggleEdit()" class="btn btn-sm btn-outline-primary" id="editBtn"
                style="color: #ead537; border-color: #ead537;">
                <i class="fas fa-edit me-1"></i> Edit
              </button>
            </div>

            <form method="POST" action="{{ route('profile.update') }}">
              @csrf
              @method('PUT')

              <div class="row mb-3">
                <div class="col-sm-3"><p class="mb-0">Full Name</p></div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 view-mode">{{ $user->name }}</p>
                  <input type="text" class="form-control edit-mode d-none" name="name" value="{{ $user->name }}">
                </div>
              </div>
              <hr>

              <div class="row mb-3">
                <div class="col-sm-3"><p class="mb-0">Email</p></div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 view-mode">{{ $user->email }}</p>
                  <input type="email" class="form-control edit-mode d-none" name="email" value="{{ $user->email }}">
                </div>
              </div>
              <hr>

              <div class="row mb-3">
                <div class="col-sm-3"><p class="mb-0">Mobile</p></div>
                <div class="col-sm-9">
                  <p class="text-muted mb-0 view-mode">{{ $user->mobilenumber ?? '-' }}</p>
                  <input type="text" class="form-control edit-mode d-none" name="mobilenumber" value="{{ $user->mobilenumber }}">
                </div>
              </div>
              <hr>

              <div class="text-end edit-mode d-none">
                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                <button type="button" onclick="toggleEdit()" class="btn btn-outline-secondary">Cancel</button>
              </div>
            </form>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3">
                  <h5 class="mb-0">Application Progress</h5>
                  @if($visaApplication)
                    <span class="badge bg-light text-dark">
                      {{ $visaApplication->created_at->diffForHumans() }}
                    </span>
                  @endif
                </div>
                
                <div class="progress-steps">
                  <div class="step mb-4">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="text-muted">Payment</span>
                      <span class="text-muted">
                        @if($visaApplication && $visaApplication->payment_status == 100)
                          <i class="fas fa-check-circle text-success"></i>
                        @endif
                      </span>
                    </div>
                    <div class="progress rounded" style="height: 8px;">
                      <div class="progress-bar" 
                          style="width: {{ $visaApplication->payment_status ?? 0 }}%;
                                background-color: {{ ($visaApplication->payment_status ?? 0) >= 100 ? '#28a745' : '#ead537' }}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="step mb-4">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="text-muted">Document Verification</span>
                      <span class="text-muted">
                        @if($visaApplication && $visaApplication->document_status == 100)
                          <i class="fas fa-check-circle text-success"></i>
                        @endif
                      </span>
                    </div>
                    <div class="progress rounded" style="height: 8px;">
                      <div class="progress-bar" 
                          style="width: {{ $visaApplication->document_status ?? 0 }}%;
                                background-color: {{ ($visaApplication->document_status ?? 0) >= 100 ? '#28a745' : '#17a2b8' }}">
                      </div>
                    </div>
                  </div>
                  
                  <div class="step mb-4">
                    <div class="d-flex justify-content-between mb-1">
                      <span class="text-muted">Approval Process</span>
                      <span class="text-muted">
                        @if($visaApplication && $visaApplication->approval_status == 100)
                          <i class="fas fa-check-circle text-success"></i>
                        @endif
                      </span>
                    </div>
                    <div class="progress rounded" style="height: 8px;">
                      <div class="progress-bar" 
                          style="width: {{ $visaApplication->approval_status ?? 0 }}%;
                                background-color: {{ ($visaApplication->approval_status ?? 0) >= 100 ? '#28a745' : '#6f42c1' }}">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card mb-4 mb-md-0">
              <div class="card-body">
                <h5 class="mb-3">Visa Details</h5>
                
                @if($visaApplication)
               
                  
                  <div class="detail-item mb-3">
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Entry Type</span>
                      <span class="fw-bold">{{ $visaApplication->entry_type ?? 'Single Entry' }}</span>
                    </div>
                  </div>
                  
                  <div class="detail-item mb-3">
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Processing Time</span>
                      <span class="fw-bold">3-5 Days</span>
                    </div>
                  </div>
                  
                  <div class="detail-item mb-3">
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Validity</span>
                      <span class="fw-bold">30 Days</span>
                    </div>
                  </div>
                  
                  <div class="detail-item mb-3">
                    <div class="d-flex justify-content-between">
                      <span class="text-muted">Stay Duration</span>
                      <span class="fw-bold">14 Days</span>
                    </div>
                  </div>
                </div>
                @else
                <div class="alert alert-warning">
                  <i class="fas fa-exclamation-circle me-2"></i>
                  No active visa application found.
                </div>
                
                @endif
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function toggleEdit() {
    const editFields = document.querySelectorAll('.edit-mode');
    const viewFields = document.querySelectorAll('.view-mode');
    const editBtn = document.getElementById('editBtn');

    editFields.forEach(el => el.classList.toggle('d-none'));
    viewFields.forEach(el => el.classList.toggle('d-none'));

    if (editBtn.innerHTML.includes('Edit')) {
      editBtn.innerHTML = '<i class="fas fa-times me-1"></i> Cancel';
      editBtn.classList.remove('btn-outline-primary');
      editBtn.classList.add('btn-outline-danger');
    } else {
      editBtn.innerHTML = '<i class="fas fa-edit me-1"></i> Edit';
      editBtn.classList.remove('btn-outline-danger');
      editBtn.classList.add('btn-outline-primary');
    }
  }
</script>

<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>