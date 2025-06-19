<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Payment</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Roboto', sans-serif;
        }
        
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background-image: url('https://images.unsplash.com/photo-1436491865332-7a61a109cc05?ixlib=rb-4.0.3');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding: 20px;
            position: relative;
        }
        
        .container {
            max-width: 600px;
            margin: auto;
            display: flex;
            flex-direction: column;
            gap: 20px;
        }
        
        .card {
            background: white;
            font-weight: bold;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.05);
            transition: background-color 0.3s ease, box-shadow 0.3s ease;
        }
        
        .visa-card {
            position: relative;
            background: #FDC805; /* Yellow color */
            color: white;
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        
        /* Left side half-circle */
        .visa-card::before,
        .visa-card::after {
            content: "";
            position: absolute;
            width: 20px;
            height: 40px;
            background: #f8f9fa; /* Match background */
            top: 50%;
            transform: translateY(-50%);
            border-radius: 50%;
            z-index: 2;
        }
        
        .visa-card::before {
            left: -10px;
        }
        
        .visa-card::after {
            right: -10px;
        }
        
        .section {
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
            color: black;
        }
        
        .label {
            font-size: 12px;
            opacity: 0.8;
            font-weight: bold;
        }
        
        h2 {
            margin: 5px 0;
            font-size: 32px;
            font-weight: bold;
        }
        
        .sub {
            font-size: 14px;
        }
        
        .icon {
            font-size: 24px;
        }
        
        .dotted {
            border-top: 2px dotted black;
            margin: 20px 0;
        }
        
        .info-boxes {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            font-size: 13px;
            color: black;
        }
        
        .info {
            flex: 1;
            min-width: 120px;
        }
        
        .info span {
            display: block;
            font-weight: bold;
            margin-top: 4px;
        }
        
        .price-details {
            margin-bottom: 20px;
        }
        
        .price-details h3 {
            margin-bottom: 15px;
        }
        
        .row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
            font-size: 14px;
        }
        
        .total {
            font-weight: bold;
            border-top: 1px solid #ddd;
            padding-top: 10px;
        }
        
        .pay-btn button {
            background-color: #FDC805;
            color: black;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
        }
        
        .selected-visa-card {
            border: 2px solid #FDC805;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            background: #f8f9fa;
            position: relative;
        }
        
        .corner-label {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #FDC805 ;
            color: white;
            padding: 2px 8px;
            border-radius: 4px;
            font-size: 0.8em;
        }
        
        .visa-summary {
            display: flex;
            justify-content: space-between;
            margin: 15px 0;
        }
        
        .price {
            color: #e74c3c;
            font-weight: 600;
            font-size: 1.2em;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Visa Card -->
        <div class="card visa-card" id="countryCard">
            <div class="section">
                <div>
                    <p class="label">VISA For Citizen Of</p>
                    <h2>IND</h2>
                    <p class="sub">India</p>
                </div>
                <div class="icon"><i class="fas fa-plane"></i></div>
                <div>
                    <p class="label">Destination Country</p>
                    <h2>ARE</h2>
                    <p class="sub">United Arab Emirates</p>
                </div>
            </div>
            <hr class="dotted" />
            <div class="info-boxes" id="visaInfoBoxes">
                <div class="info"><i class="fas fa-passport"></i> <strong>Category:</strong> <span id="displayCategory">Tourist, Business</span></div>
                <div class="info"><i class="fas fa-door-open"></i> <strong>Entry:</strong> <span id="displayEntry">Single</span></div>
                <div class="info"><i class="fas fa-calendar-check"></i> <strong>Duration:</strong> <span id="displayDays">58</span> Days Stay</div>
            </div>
        </div>

        <!-- Visa Details Container -->
        <div id="visaDetailsContainer"></div>
        
        <!-- Payment Form -->
        <div class="card">
            <div id="priceDetailsContainer"></div>
            <form id="paymentForm" action="{{ route('process.visa') }}" method="POST">
                @csrf
                <input type="hidden" name="selected_date" id="formSelectedDate">
                <input type="hidden" name="visa_type" id="formVisaType">
                <input type="hidden" name="price" id="formPrice">
                <input type="hidden" name="days" id="formDays">
                <input type="hidden" name="visa_category" id="formVisaCategory">
                <input type="hidden" name="visa_entry" id="formVisaEntry">
                
                <div class="pay-btn">
                    <button type="submit">Pay Now</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Retrieve visa details from localStorage
            const visaDetails = JSON.parse(localStorage.getItem('visaDetails'));
            
            if (visaDetails) {
                // Update country card info
                document.getElementById('displayCategory').textContent = visaDetails.visa_category;
                document.getElementById('displayEntry').textContent = visaDetails.visa_entry;
                document.getElementById('displayDays').textContent = visaDetails.days;

                // Display visa details card
                const visaContainer = document.getElementById('visaDetailsContainer');
                visaContainer.innerHTML = `
                    <div class="selected-visa-card">
                        <div class="corner-label">evisa</div>
                        <h2>${visaDetails.visa_type}</h2>
                        <hr />
                        <div class="visa-summary">
                            <span>🌐 ${visaDetails.visa_category}</span>
                            <span>🛫 ${visaDetails.visa_entry}</span>
                        </div>
                        <hr />
                        <div class="visa-footer">
                            <span>${visaDetails.days} Days Stay</span>
                            <span class="price">INR ${parseFloat(visaDetails.price).toFixed(2)}</span>
                        </div>
                    </div>
                `;

                // Display price details
                const priceContainer = document.getElementById('priceDetailsContainer');
                priceContainer.innerHTML = `
                    <div class="price-details">
                        <h3>Price Details</h3>
                        <div class="row">
                            <span>Travel Date</span>
                            <span>${new Date(visaDetails.date).toLocaleDateString('en-US', { day: 'numeric', month: 'short', year: 'numeric' })}</span>
                        </div>
                        <div class="row">
                            <span>No Of Travellers <i class="fas fa-info-circle"></i></span>
                            <span>1</span>
                        </div>
                        
                        <div class="row total">
                            <span><i class="fas fa-wallet"></i> Total - To Be Paid Now</span>
                            <span class="price">INR ${parseFloat(visaDetails.price).toFixed(2)}</span>
                        </div>
                    </div>
                `;
                
                // Set form values
                document.getElementById('formSelectedDate').value = visaDetails.date;
                document.getElementById('formVisaType').value = visaDetails.visa_type;
                document.getElementById('formPrice').value = visaDetails.price;
                document.getElementById('formDays').value = visaDetails.days;
                document.getElementById('formVisaCategory').value = visaDetails.visa_category;
                document.getElementById('formVisaEntry').value = visaDetails.visa_entry;
            } else {
                alert('No visa details found. Please start the application again.');
                window.location.href = '/'; // Redirect to home
            }
        });
    </script>
</body>
</html>