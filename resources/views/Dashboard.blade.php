<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Abizon Agent Side</title>
    <!-- base:css -->
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/base/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{ asset('asset/css/AgentSide/Dashboard.css') }}">
    <!-- endinject -->
    <link rel="shortcut icon" href="" />
  </head>


  
  <body>
    <div class="container-scroller">
    @include('AgentNavbar')

    <!-- partial -->
		<div class="container-fluid page-body-wrapper">
			<div class="main-panel">
				<div class="content-wrapper">
					
					<div class="row">
						<div class="col-sm-8 flex-column d-flex stretch-card">
							<div class="row">
								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">6475</h2>
											<h4 class="card-title mb-2">Total Users</h4>
											<!-- <small class="text-muted">APRIL 2019</small> -->
										</div>
									</div>
								</div>
								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">6475</h2>
											<h4 class="card-title mb-2">Total Application</h4>
											<!-- <small class="text-muted">APRIL 2019</small> -->
										</div>
									</div>
								</div>
								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">3479</h2>
											<h4 class="card-title mb-2">Pending Application</h4>
											<!-- <small class="text-muted">APRIL 2019</small> -->
										</div>
									</div>
								</div>
							</div>
							
							<div class="row mt-4">
								<!-- Next 3 cards -->
								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">6475</h2>
											<h4 class="card-title mb-2">Approvel Application</h4>
											<!-- <small class="text-muted">APRIL 2019</small> -->
										</div>
									</div>
								</div>
								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card sale-diffrence-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">6475</h2>
											<h4 class="card-title mb-2">Reject Application</h4>
											<!-- <small class="text-muted">APRIL 2019</small> -->
										</div>
									</div>
								</div>
								<div class="col-lg-4 d-flex grid-margin stretch-card">
									<div class="card sale-visit-statistics-border">
										<div class="card-body">
											<h2 class="text-dark mb-2 font-weight-bold">3479</h2>
											<h4 class="card-title mb-2">New Application</h4>
											<!-- <small class="text-muted">APRIL 2019</small> -->
										</div>
									</div>
								</div>
							  </div>

						</div>
						<div class="col-sm-4 flex-column d-flex stretch-card">
							<div class="row flex-grow">
								<div class="col-sm-12 grid-margin stretch-card">
									<div class="card">
										<div class="card-body">
											<div class="row">
											</div>
											<div class="row">
												<div class="col-sm-12 mt-4 mt-lg-0">
													<div class="bg-primary text-white px-4 py-4 card">
														<div class="row">
															<div class="col-sm-6 pl-lg-5">
																<h2>0</h2>
																<p class="mb-0">Total Wallet</p>
															</div>
															<div class="col-sm-6 climate-info-border mt-lg-0 mt-2">
																<h2>0</h2>
																<p class="mb-0">Your Spending Money</p>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="row pt-3 mt-md-1">
												<div class="col">
													<div class="d-flex purchase-detail-legend align-items-center">
														<div id="circleProgress1" class="p-2"></div>
														<div>
															<p class="font-weight-medium text-dark text-small">Sessions</p>
															<h3 class="font-weight-bold text-dark  mb-0">26.80%</h3>
														</div>
													</div>
												</div>
												<div class="col">
													<div class="d-flex purchase-detail-legend align-items-center">
														<div id="circleProgress2" class="p-2"></div>
														<div>
															<p class="font-weight-medium text-dark text-small">Users</p>
															<h3 class="font-weight-bold text-dark  mb-0">56.80%</h3>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								
								<div class="col-sm-12 grid-margin stretch-card">
									
								</div>
								
							</div>


							
						</div>
						
					</div>
					
				</div>
				<!-- content-wrapper ends -->
				<!-- partial:partials/_footer.html -->
				@include('Footer')
				<!-- partial -->
			</div>
			<!-- main-panel ends -->
		</div>
		<!-- page-body-wrapper ends -->
    </div>
		<!-- container-scroller -->
    <!-- base:js -->
    <script src="vendors/base/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page-->
    <!-- End plugin js for this page-->
    <!-- inject:js -->
    <script src="js/template.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/progressbar.js/progressbar.min.js"></script>
		<script src="vendors/chartjs-plugin-datalabels/chartjs-plugin-datalabels.js"></script>
		<script src="vendors/justgage/raphael-2.1.4.min.js"></script>
		<script src="vendors/justgage/justgage.js"></script> -->
    <!-- <script src="js/jquery.cookie.js" type="text/javascript"></script> -->
    <!-- Custom js for this page-->
    <script src="js/Dashboard.js"></script>
    <!-- End custom js for this page-->
    <script>
  function toggleDropdown(event) {
    event.preventDefault();
    const submenu = event.currentTarget.nextElementSibling;
    submenu.style.display = submenu.style.display === 'none' || submenu.style.display === '' ? 'block' : 'none';
  }
</script>

  </body>
</html>