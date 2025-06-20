<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Visa Application</title>
  <link rel="stylesheet" href="{{ asset('css/Agent_Visa_Application.css') }}">
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f6f9;
      display: flex;
      flex-direction: column;
      min-height: 100vh;
    }

    .container {
      max-width: 1200px;
      margin: 2rem auto;
      padding: 0;
    }

    h1 {
      font-size: 2rem;
      color: #4b4e6d;
      margin-bottom: 1rem;
    }

    .table-container {
      background: #ffffff;
      border-radius: 10px;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      overflow-x: auto;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 800px;
    }

    th, td {
      text-align: left;
      padding: 15px 20px;
      border-bottom: 1px solid #f0f0f0;
      color: #4b4e6d;
    }

    thead {
      background-color:rgb(121, 129, 136);
      color: white;
    }

    .status-cell {
      display: inline-block;
      padding: 6px 14px;
      border-radius: 9999px;
      font-size: 0.75rem;
      font-weight: bold;
    }

    .status-pending {
      background: #e74c3c;
      color: white;
    }

    .status-completed {
      background: #2ecc71;
      color: white;
    }

    .action-buttons {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
    }

    .btn {
      padding: 8px 14px;
      border: none;
      border-radius: 6px;
      font-weight: 500;
      cursor: pointer;
      transition: background 0.2s ease;
    }

    .btn-primary {
      background-color: #5e60ce;
      color: white;
    }

    .btn-primary:hover {
      background-color: #4b4dc0;
    }

    .btn-success {
      background-color: #00cba9;
      color: white;
    }

    .btn-success:hover {
      background-color: #00b39b;
    }

    @media (max-width: 768px) {
      h1 {
        font-size: 1.5rem;
      }

      th, td {
        padding: 10px 12px;
        font-size: 0.9rem;
      }

      .action-buttons {
        flex-direction: column;
        align-items: flex-start;
      }

      .btn {
        width: 100%;
        text-align: center;
      }
    }

    .content-area {
  flex: 1;
  padding: 2rem 1rem;
}

@media (max-width: 768px) {
  .content-area {
    padding: 1rem;
  }
}

  </style>
</head>
<body>
  @include('AgentNavbar')


  <main class="content-area">
  <div class="container">
    <h1>Visa Application Management</h1>
    <div class="table-container">
      <table>
        <thead>
          <tr>
            <th>Applicant Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Application Date</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>John Doe</td>
            <td>john@example.com</td>
            <td>+1 234 567 890</td>
            <td>2023-08-15</td>
            <td><span class="status-cell status-pending">Pending</span></td>
            <td>
              <div class="action-buttons">
                <a href="{{ url('Agentform') }}" class="btn btn-primary">Edit</a>
                <button class="btn btn-success">Submit</button>
              </div>
            </td>
          </tr>
          <tr>
            <td>Jane Smith</td>
            <td>jane@example.com</td>
            <td>+1 345 678 901</td>
            <td>2023-08-14</td>
            <td><span class="status-cell status-completed">Completed</span></td>
            <td>
              <div class="action-buttons">
                <a href="{{ url('Agentform') }}" class="btn btn-primary">View</a>
                <button class="btn btn-success">Download</button>
              </div>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  </main>

  @include('Footer')
</body>
</html>
