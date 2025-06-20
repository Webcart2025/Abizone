<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Visa Entry Form</title>
  <style>
    * {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #f9fafb;
      padding: 0;
    }

    .container {
      max-width: 600px;
      margin: auto;
      background-color: #ffffff;
      border-radius: 1rem;
      padding: 2rem;
      box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    }

    h2 {
      text-align: center;
      margin-bottom: 1.5rem;
      font-size: clamp(1.5rem, 3vw, 2rem);
      color: #333;
    }

    label {
      display: block;
      margin-top: 1.2rem;
      margin-bottom: 0.4rem;
      font-weight: 600;
      color: #444;
    }

    input[type="text"],
    input[type="email"],
    input[type="tel"],
    input[type="date"] {
      width: 100%;
      padding: 0.65rem 0.75rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      font-size: 1rem;
      transition: border 0.3s ease;
    }

    input:focus {
      border-color: #007bff;
      outline: none;
    }

    .radio-group {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
      gap: 10px;
      padding: 0.8rem;
      border: 1px solid #ccc;
      border-radius: 8px;
      background-color: #f4f4f4;
      margin-top: 0.5rem;
    }

    .radio-group label {
      display: flex;
      align-items: center;
      font-weight: normal;
      font-size: 0.95rem;
      gap: 8px;
    }

    .total-days {
      font-weight: bold;
      margin-top: 1rem;
      font-size: 1rem;
      color: #333;
    }

    button {
      width: 100%;
      margin-top: 1.8rem;
      padding: 0.8rem;
      background-color: #007bff;
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 600;
      cursor: pointer;
      transition: background 0.3s ease;
    }

    button:hover {
      background-color: #0056b3;
    }

    @media (max-width: 500px) {
      /* body {
        padding: 1rem;
      } */

      .container {
        padding: 1.2rem;
      }
    }

    .main-content {
  margin: 3rem auto;
  padding: 1rem;
}

@media (max-width: 768px) {
  .main-content {
    margin: 2rem auto;
  }
}

  </style>
</head>
<body>

  @include('AgentNavbar')

  <main class="main-content">
  <div class="container">
    <h2>Add New Users</h2>

    <form id="entryForm" novalidate>
      <label>Entry Type</label>
      <div class="radio-group">
        <label><input type="radio" name="entry_type" value="Single Entry" required> Single Entry</label>
        <label><input type="radio" name="entry_type" value="Single Express Entry"> Single Express Entry</label>
        <label><input type="radio" name="entry_type" value="Multi Entry"> Multi Entry</label>
        <label><input type="radio" name="entry_type" value="Multi Express Entry"> Multi Express Entry</label>
      </div>

      <label for="name">Full Name</label>
      <input type="text" id="name" name="name" aria-label="Full Name" required />

      <label for="email">Email</label>
      <input type="email" id="email" name="email" required />

      <label for="mobile">Mobile Number (+91)</label>
      <input type="tel" id="mobile" name="mobile" placeholder="+91xxxxxxxxxx" pattern="^\+91[0-9]{10}$" required />

      <label for="start_date">Start Date</label>
      <input type="date" id="start_date" name="start_date" required />

      <label for="end_date">End Date</label>
      <input type="date" id="end_date" name="end_date" required />

      <p class="total-days">Total Days: <span id="totalDays">0</span></p>

      <button type="submit">Submit</button>
    </form>
  </div>
  </main>

  @include('Footer')

  <script>
    const startDate = document.getElementById('start_date');
    const endDate = document.getElementById('end_date');
    const totalDaysDisplay = document.getElementById('totalDays');

    function calculateDays() {
      const start = new Date(startDate.value);
      const end = new Date(endDate.value);
      const diff = end - start;

      if (!isNaN(diff) && diff >= 0) {
        const days = Math.ceil(diff / (1000 * 60 * 60 * 24)) + 1;
        totalDaysDisplay.textContent = days;
      } else {
        totalDaysDisplay.textContent = 0;
      }
    }

    startDate.addEventListener('change', calculateDays);
    endDate.addEventListener('change', calculateDays);

    document.getElementById('entryForm').addEventListener('submit', function(e) {
      e.preventDefault();
      alert('Form submitted successfully!');
    });
  </script>

</body>
</html>
