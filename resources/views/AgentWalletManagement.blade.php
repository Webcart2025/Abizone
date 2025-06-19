<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Agent Wallet Management</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .input {
      @apply border border-gray-300 p-2 rounded w-full focus:outline-none focus:ring-2 focus:ring-blue-400;
    }
    .btn {
      @apply bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700;
    }
    .table-style th, .table-style td {
      @apply border px-4 py-2 text-center;
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
  @include('AgentNavbar')

  <main class="flex-grow mt-8 mb-8">
    <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-md">
      <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-blue-700">Agent Wallet Management</h2>
        <div class="bg-green-100 text-green-700 px-4 py-2 rounded text-xl font-semibold">
          Wallet Balance: ₹<span id="wallet-balance">0.00</span>
        </div>
      </div>

      <!-- Add Money Form -->
      <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4 text-green-700">Add Money to Wallet</h3>
        <form id="add-money-form" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input type="number" id="amount" placeholder="Enter amount" required class="input">
          <input type="text" id="note" placeholder="Note (optional)" class="input">
          <button type="submit" class="btn col-span-2">Add Money</button>
        </form>
      </div>

      <!-- Withdraw Form -->
      <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4 text-yellow-600">Withdraw from Wallet</h3>
        <form id="withdraw-form" class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <input type="number" id="withdraw-amount" placeholder="Withdraw amount" required class="input">
          <input type="text" id="withdraw-note" placeholder="Note (optional)" class="input">
          <button type="submit" class="btn col-span-2 bg-yellow-500 hover:bg-yellow-600">Withdraw</button>
        </form>
      </div>

      <!-- Transaction Table -->
      <div class="mb-6">
        <h3 class="text-xl font-semibold mb-4 text-gray-700">Transaction History</h3>
        <table class="table-auto w-full table-style">
          <thead>
            <tr class="bg-blue-100">
              <th>Date</th>
              <th>Type</th>
              <th>Amount</th>
              <th>Note</th>
            </tr>
          </thead>
          <tbody id="transaction-list">
            <!-- Transactions go here -->
          </tbody>
        </table>
      </div>
    </div>
  </main>

  @include('Footer')

  <script>
    const transactions = [];
    let balance = 0;

    function updateBalance() {
      document.getElementById('wallet-balance').textContent = balance.toFixed(2);
    }

    function renderTransactions() {
      const list = document.getElementById('transaction-list');
      list.innerHTML = transactions.map(t => `
        <tr>
          <td>${t.date}</td>
          <td>${t.type}</td>
          <td>${t.amount}</td>
          <td>${t.note || '-'}</td>
        </tr>
      `).join('');
      updateBalance();
    }

    document.getElementById('add-money-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const amount = parseFloat(document.getElementById('amount').value);
      const note = document.getElementById('note').value;
      if (amount > 0) {
        transactions.push({
          date: new Date().toLocaleString(),
          type: 'Credit',
          amount: amount.toFixed(2),
          note
        });
        balance += amount;
        renderTransactions();
        this.reset();
      }
    });

    document.getElementById('withdraw-form').addEventListener('submit', function(e) {
      e.preventDefault();
      const amount = parseFloat(document.getElementById('withdraw-amount').value);
      const note = document.getElementById('withdraw-note').value;
      if (amount > 0 && amount <= balance) {
        transactions.push({
          date: new Date().toLocaleString(),
          type: 'Debit',
          amount: amount.toFixed(2),
          note
        });
        balance -= amount;
        renderTransactions();
        this.reset();
      } else {
        alert("Insufficient balance or invalid amount");
      }
    });
  </script>
</body>

</html>