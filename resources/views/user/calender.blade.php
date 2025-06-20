<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Visa Travel Calendar</title>
    <link rel="stylesheet" href="{{ asset('asset/css/calender.css') }}" />
    @if(!auth()->check())
        <script>
            window.location.href = "{{ route('login') }}";
        </script>
    @endif
    <style>
        .form-group {
            margin: 15px 0;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 5px;
        }
        .form-group label {
            font-weight: bold;
            color: #333;
            margin-right: 10px;
        }
        .visa-details {
            background: #fff;
            border: 1px solid #e0e0e0;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .visa-type {
            color: #2c3e50;
            font-weight: 600;
            font-size: 1.2em;
            margin: 10px 0;
            line-height: 1.4;
        }
        .duration {
            color: #27ae60;
            font-weight: 600;
        }
        .price {
            color: #e74c3c;
            font-weight: 600;
            font-size: 1.2em;
        }
        .visa-summary {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }
        .visa-icon {
            margin-right: 5px;
        }
        .selected-visa-card {
            border: 2px solid #3498db;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            background: #f8f9fa;
        }
    </style>
</head>
<body>
<div class="calendar-wrapper">
    <div class="calendar-header">
        <p>When Are You Travelling?</p>
        <button class="close-btn" onclick="window.history.back()">&times;</button>
    </div>

    <!-- Display selected visa card details -->
    <div class="selected-visa-card">
        <div class="corner-label">evisa</div>
        <h2>{{ request('visa_type') }}</h2>
        <hr />
        <div class="visa-summary">
            <span>🌐 {{ request('visa_category', 'Tourist, Business') }}</span>
            <span>🛫 {{ request('visa_entry', 'Single') }}</span>
        </div>
        <hr />
        <div class="visa-footer">
            <span>{{ request('days', '30') }} Days Stay</span>
            <span class="price">INR {{ number_format(request('price'), 2) }}</span>
        </div>
    </div>

    <div class="month-nav">
        <button onclick="changeMonth(-1)">&#10094;</button>
        <span class="month-year" id="monthYear"></span>
        <button onclick="changeMonth(1)">&#10095;</button>
    </div>

    <div class="calendar-grid" id="dayNames"></div>
    <div class="calendar-grid" id="calendarDays"></div>

    <div id="visaSelectionForm" style="display: none; margin-top: 20px;">
        <h3>Booking Summary</h3>
        <form id="visaForm" onsubmit="return false;">
            @csrf
            <input type="hidden" name="selected_date" id="selectedDateInput">
            <input type="hidden" name="visa_type" value="{{ request('visa_type') }}">
            <input type="hidden" name="price" value="{{ request('price') }}">
            <input type="hidden" name="days" value="{{ request('days') }}">
            
            <div class="form-group">
                <label>Selected Travel Date:</label>
                <span id="displaySelectedDate"></span>
            </div>
            
            <div class="form-group visa-details">
                <h4>Visa Details</h4>
                <div><strong>Category:</strong> {{ request('visa_category', 'Tourist, Business') }}</div>
                <div><strong>Entry:</strong> {{ request('visa_entry', 'Single') }}</div>
                <div><strong>Duration:</strong> {{ request('days', '30') }} Days Stay</div>
                <div><strong>Total Price:</strong> INR {{ number_format(request('price'), 2) }}</div>
            </div>
            
            <button type="button" class="proceed-btn" onclick="redirectToNextPage()">Proceed to Next</button>
        </form>
    </div>

    <button class="proceed-btn" onclick="proceedToNext()" id="proceedBtn">Proceed to Next</button>
</div>

<script>
    const monthYearLabel = document.getElementById('monthYear');
    const calendarDays = document.getElementById('calendarDays');
    const dayNames = document.getElementById('dayNames');
    const visaSelectionForm = document.getElementById('visaSelectionForm');
    const proceedBtn = document.getElementById('proceedBtn');

    const dayList = ['S', 'M', 'T', 'W', 'T', 'F', 'S'];
    let today = new Date();
    let currentMonth = today.getMonth();
    let currentYear = today.getFullYear();
    let selectedDate = null;

    function generateDayHeaders() {
        dayNames.innerHTML = '';
        dayList.forEach(day => {
            const div = document.createElement('div');
            div.textContent = day;
            div.classList.add('day-name');
            dayNames.appendChild(div);
        });
    }

    function renderCalendar(month, year) {
        const firstDay = new Date(year, month).getDay();
        const lastDate = new Date(year, month + 1, 0).getDate();
        const monthNames = ['JAN', 'FEB', 'MAR', 'APR', 'MAY', 'JUN', 'JUL', 'AUG', 'SEP', 'OCT', 'NOV', 'DEC'];

        monthYearLabel.textContent = `${monthNames[month]} ${year}`;
        calendarDays.innerHTML = '';

        const today = new Date();
        today.setHours(0, 0, 0, 0);

        const minSelectableDate = new Date(today);
        minSelectableDate.setDate(today.getDate() + 7); // 7 days after today

        for (let i = 0; i < firstDay; i++) {
            calendarDays.innerHTML += '<div></div>';
        }

        for (let d = 1; d <= lastDate; d++) {
            const div = document.createElement('div');
            div.textContent = d;
            div.classList.add('day');
            const thisDate = new Date(year, month, d);
            thisDate.setHours(0, 0, 0, 0);

            if (thisDate.toDateString() === today.toDateString()) {
                div.classList.add('today');
            }

            if (thisDate <= minSelectableDate) {
                div.style.opacity = '0.4';
                div.style.pointerEvents = 'none';
            } else {
                div.onclick = () => {
                    selectedDate = thisDate;
                    renderCalendar(currentMonth, currentYear);
                };

                if (selectedDate && thisDate.toDateString() === selectedDate.toDateString()) {
                    div.classList.add('selected');
                }
            }

            calendarDays.appendChild(div);
        }
    }

    function changeMonth(offset) {
        currentMonth += offset;
        if (currentMonth < 0) {
            currentMonth = 11;
            currentYear--;
        } else if (currentMonth > 11) {
            currentMonth = 0;
            currentYear++;
        }
        renderCalendar(currentMonth, currentYear);
    }

    function proceedToNext() {
        if (selectedDate) {
            // Show visa selection form
            visaSelectionForm.style.display = 'block';
            proceedBtn.style.display = 'none';
            
            // Update form with selected date
            document.getElementById('selectedDateInput').value = selectedDate.toISOString().split('T')[0];
            document.getElementById('displaySelectedDate').textContent = selectedDate.toDateString();
        } else {
            alert('Please select a valid date (at least 7 days from today).');
        }
    }

    function redirectToNextPage() {
    const selectedDate = document.getElementById('selectedDateInput').value;
    
    // Create an object with all visa details
    const visaDetails = {
        date: selectedDate,
        visa_type: "{{ request('visa_type') }}",
        price: "{{ request('price') }}",
        days: "{{ request('days') }}",
        visa_category: "{{ request('visa_category', 'Tourist, Business') }}",
        visa_entry: "{{ request('visa_entry', 'Single') }}"
    };
    
    // Store in localStorage
    localStorage.setItem('visaDetails', JSON.stringify(visaDetails));
    
    // Redirect to form page
    window.location.href = "{{ route('Form1') }}";
}
    generateDayHeaders();
    renderCalendar(currentMonth, currentYear);
</script>
</body>
</html>