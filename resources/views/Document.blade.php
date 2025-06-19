<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Visa Application</title>

    <link rel="stylesheet" href="{{ asset('asset/css/Document.css')}}" />

</head>

<body>
    
@include('navbar2')
    <div class="container">
        
        <div class="box">

           
  <div class="visa-form">
    <h3>Planning to request an entry permit?</h3>
    <p>Please choose the visa type which you want to request</p>

    <label>Travelling to:</label>
    <select id="travel-to">
      <option>Select Destination</option>
      <option>United Arab Emirates</option>
      <option>India</option>
    </select>

    <label>Nationality:</label>
    <select id="nationality">
      <option>Select Nationality</option>
      <option>India</option>
      <option>United Arab Emirates</option>
    </select>

    <label>Visa Type:</label>
    <select id="visa-type">
      <option>Select Visa Type</option>
      <option>30 days tourist single entry</option>
      <option>30 days tourist express entry</option>
    </select>

    <label>When Are You Travelling?</label>
    <div class="date-container">
      <input type="date" id="travel-date">
    </div>

    <hr class="line" />

    <div class="info-box">
      <ul>
        <li><span id="output-travel-to"></span></li>
        <li><span id="output-nationality"></span></li>
        <li><span id="output-visa-type"></span></li>
        <li><span id="output-travel-date"></span></li>
      </ul>
    </div>

    <a href='Form1' class="apply-btn" id="apply-btn">✔ Apply for this visa</a>
  </div>

  <script>
    document.getElementById("apply-btn").addEventListener("click", function (e) {
      e.preventDefault();

      const travelTo = document.getElementById("travel-to").value;
      const nationality = document.getElementById("nationality").value;
      const visaType = document.getElementById("visa-type").value;
      const travelDate = document.getElementById("travel-date").value;

      if (
        travelTo === "Select Destination" ||
        nationality === "Select Nationality" ||
        visaType === "Select Visa Type" ||
        travelDate === ""
      ) {
        alert("Please fill out all the fields before proceeding.");
        return;
      }

      document.getElementById("output-travel-to").textContent = "Traveling to: " + travelTo;
      document.getElementById("output-nationality").textContent = "Nationality: " + nationality;
      document.getElementById("output-visa-type").textContent = "Visa Type: " + visaType;
      document.getElementById("output-travel-date").textContent = "Travel Date: " + travelDate;

        window.location.href = "Form1";
      // alert("All fields validated. Information updated below.");
    });
  </script>
          

        </div>

        <h3 class="document-title">Required Documents</h3>
        <div class="documents" >
        <div class="document-item">
            <div class="flip-card-inner">

                <div class="flip-card-front">
                    <img src="{{ url('asset/css/Images/Rectangle118.png') }}" alt="Photograph">
                    <p>Passport Front</p>
                </div>

                <div class="flip-card-back">
                    <h3>1.Passport Front</h3>
                    <p>copy of the passport</p>
                    <p>first page showing</p>
                    <p>personal image.</p>
                </div>

            </div>

        </div>

        
        <div class="document-item">
            <div class="flip-card-inner">

                <div class="flip-card-front">
                    <img src="{{ url('asset/css/Images/Rectangle119.png') }}" alt="Return Ticket">
                    <p>Passport Book</p>
                </div>

                <div class="flip-card-back">
                    <h3>2.Passport Back</h3>
                    <p>copy of the passport</p>
                    <p>last page with details</p>
                    <p>of residential and</p>
                    <p>parental details.</p>
                </div>

            </div>

        </div>

        <div class="document-item">
            <div class="flip-card-inner">

                <div class="flip-card-front">
                    <img src="{{ url('asset/css/Images/Rectangle120.png') }}" alt="Hotel Booking">
                    <p>Photograph</p>
                </div>

                <div class="flip-card-back">
                    <h3>3.Photograph</h3>
                    <p>recent passport size</p>
                    <p>photo as per visa</p>
                    <p>specification</p>
                </div>
            </div>
        </div>

        
            <div class="document-item">

                <div class="flip-card-inner">
                    <div class="flip-card-front">
                        <img src="{{ url('asset/css/Images/Rectangle121.png') }}" alt="Passport Front">
                        <p>Return Ticket</p>
                    </div>

                    <div class="flip-card-back">
                        <h3>4.Return Ticket</h3>
                        <p>Proof of ticket for</p>
                        <p>return journey</p>
                    </div>
                </div>
            </div>

            <div class="document-item ">
                <div class="flip-card-inner">

                    <div class="flip-card-front">
                        <img src="{{ url('asset/css/Images/Rectangle122.png') }}" alt="Passport Back">
                        <p>Hotel booking</p>
                    </div>

                    <div class="flip-card-back">
                        <h3>5.Hotel booking</h3>
                        <p>Hotel booking proof of</p>
                        <p>hotel booking</p>
                        <p>vouchers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
    @include('footer')

    <script>
document.getElementById("submit-btn").addEventListener("click", function () {
    const destination = document.getElementById("travel-to").value;
    const nationality = document.getElementById("nationality").value;
    const visaType = document.getElementById("visa-type").value;
    const travelDate = document.getElementById("travel-date").value;

    if (
      destination === "Select Destination" ||
      nationality === "Select Nationality" ||
      visaType === "Select Visa Type" ||
      travelDate === ""
    ) {
      alert("Please complete all fields before submitting the form.");
    } else {
      // ✅ All fields valid, proceed
      alert("Form submitted successfully!");
      // You can replace this with actual form logic (e.g. form.submit())
    }
  });


        const outputTravelTo = document.getElementById('output-travel-to');
        const outputNationality = document.getElementById('output-nationality');
        const outputVisaType = document.getElementById('output-visa-type');
        const outputTravelDate = document.getElementById('output-travel-date');

        function updateOutput() {
            outputTravelTo.textContent = travelTo.value;
            outputNationality.textContent = nationality.value;
            outputVisaType.textContent = visaType.value;
            outputTravelDate.textContent = travelDate.value;
        }

        travelTo.addEventListener('change', updateOutput);
        nationality.addEventListener('change', updateOutput);
        visaType.addEventListener('change', updateOutput);
        travelDate.addEventListener('input', updateOutput);
    </script>
</body>

</html>