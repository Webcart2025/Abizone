<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Bill Page</title>
    <link rel="stylesheet" href="{{ asset('asset/css/TotalBill.css')}}" />
   
</head>
<body>
    <div class="container">
        <div class="visa-options">
            <div class="visa selected" id="regular-visa" data-price="7250">
                <h3>UAE 30 Days<br>Single Entry EVisa</h3>
                <hr></hr>
                <p>🌍 Tourist, Business</p>
                <p>30 Days - <strong>INR 7,250.00</strong></p>
            </div>
            <div class="visa" id="express-visa" data-price="9536">
                <h3>UAE 30 Days<br>Single Entry Express EVisa</h3>
                <hr></hr>
                <p>🌍 Tourist, Business ✈ Single</p>
                <p>30 Days - <strong>INR 9,536.00</strong></p>
            </div>
        </div>
        
        <div class="traveller-info">
            <h2>TRAVELLER</h2>
            <p>Govt. Visa Fees: <span id="govt-fees">INR 5,959.00</span></p>
            <p>Service Fees: <span id="service-fees">INR 3,577.00</span></p>
            <label>Total Adult: <input type="number" id="adults" value="1" min="1"></label>
            <label>Total Child: <input type="number" id="children" value="0" min="0"></label>
            <p>Total Govt. Fees: <span id="total-govt">INR 5,959</span></p>
            <p>Total Service Fees: <span id="total-service">INR 3,577</span></p>
            <h3>Total - To Be Paid Now: <span id="total-amount">INR 9,536.00</span></h3>
            <button id="pay-now">Pay Now</button>
        </div>
    </div>
    
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const visaOptions = document.querySelectorAll(".visa");
            const adultInput = document.getElementById("adults");
            const childInput = document.getElementById("children");
            const totalAmount = document.getElementById("total-amount");
            let visaPrice = 7250;

            visaOptions.forEach(option => {
                option.addEventListener("click", () => {
                    visaOptions.forEach(v => v.classList.remove("selected"));
                    option.classList.add("selected");
                    visaPrice = parseInt(option.dataset.price);
                    calculateTotal();
                });
            });

            function calculateTotal() {
                let adults = parseInt(adultInput.value) || 1;
                let children = parseInt(childInput.value) || 0;
                let totalPersons = adults + children;
                totalAmount.textContent = `INR ${visaPrice * totalPersons}`;
            }

            adultInput.addEventListener("input", calculateTotal);
            childInput.addEventListener("input", calculateTotal);
        });
    </script>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visa Payment</title>
    <link rel="stylesheet" href="{{ asset('asset/css/TotalBill.css')}}" />
    
</head>
<body>
@include('navbar2')
    <div class="container">
        <!-- <img src="{{asset('asset/css/Images/AirplaneTakeOff.png')}}" alt="UAE Visa" class="visa-image"> -->
        
        <div class="visa-options">
            <div class="visa-card">
                <div class="visa-details">
                    <h3 class="visa-title">UAE 30 Days Single Entry EVisa</h3>
                    <div class="visa-type">Tourist, Business</div>
                    <div class="visa-duration">30 Days</div>
                </div>
                <div class="price">INR 7,250.00</div>
            </div>

            <div class="visa-card">
                <div class="visa-details">
                    <h3 class="visa-title">UAE 30 Days Single Entry Express EVisa</h3>
                    <div class="visa-type">Tourist, Business</div>
                    <div class="visa-duration">30 Days</div>
                </div>
                <div class="price">INR 9,536.00</div>
            </div>
        </div>

        <!-- <div class="traveler-summary">
            <h2>TRAVELLER</h2>
            <div class="summary-row">
                <span>Govt. Visa Fees</span>
                <span>INR 5,959.00</span>
            </div>
            <div class="summary-row">
                <span>Service Fees</span>
                <span>INR 3,577.00</span>
            </div>
            <div class="summary-row">
                <span>Total Adult</span>
                <span>3</span>
            </div>
            <div class="summary-row">
                <span>Total Child</span>
                <span>3</span>
            </div>
        </div>

        <div class="total-section">
            <div class="summary-row">
                <span>Total Govt. Fees</span>
                <span>INR 35,754</span>
            </div>
            <div class="summary-row">
                <span>Total Service Fees</span>
                <span>INR 21,462</span>
            </div>
            <div class="summary-row">
                <strong>Total - To Be Paid Now</strong>
                <strong>INR 57,216</strong>
            </div>
        </div> -->

        <button class="pay-button" onclick="handlePayment()">Pay Now</button>
    </div>

    <script>
        function handlePayment() {
            // Add payment processing logic here
            alert('Redirecting to payment gateway...');
            // window.location.href = 'payment-gateway-url';
        }

        // Add any additional interactivity here
        document.querySelectorAll('.visa-card').forEach(card => {
            card.addEventListener('click', () => {
                document.querySelectorAll('.visa-card').forEach(c => 
                    c.style.borderColor = '#ddd');
                card.style.borderColor = '#007bff';
            });
        });
    </script>
</body>
</html>