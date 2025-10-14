<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cash Flow Management</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        :root {
            --primary-color: #3498db;
            --secondary-color: #2ecc71;
            --danger-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
        }
        
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .dashboard-header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
            padding: 2rem 0;
            margin-bottom: 2rem;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }
        
        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            transition: transform 0.3s, box-shadow 0.3s;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.05);
            font-weight: 600;
            padding: 1rem 1.25rem;
            border-radius: 12px 12px 0 0 !important;
        }
        
        .summary-card {
            text-align: center;
            padding: 1.5rem;
        }
        
        .income-card {
            border-top: 4px solid var(--secondary-color);
        }
        
        .expense-card {
            border-top: 4px solid var(--danger-color);
        }
        
        .balance-card {
            border-top: 4px solid var(--primary-color);
        }
        
        .amount {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0.5rem 0;
        }
        
        .income-amount {
            color: var(--secondary-color);
        }
        
        .expense-amount {
            color: var(--danger-color);
        }
        
        .balance-amount {
            color: var(--primary-color);
        }
        
        .chart-container {
            position: relative;
            height: 300px;
            width: 100%;
        }
        
        .transaction-item {
            border-left: 4px solid;
            padding: 0.75rem 1rem;
            margin-bottom: 0.75rem;
            border-radius: 0 8px 8px 0;
            background-color: white;
            transition: all 0.2s;
        }
        
        .transaction-item:hover {
            transform: translateX(5px);
            box-shadow: 0 3px 8px rgba(0,0,0,0.08);
        }
        
        .income-item {
            border-left-color: var(--secondary-color);
        }
        
        .expense-item {
            border-left-color: var(--danger-color);
        }
        
        .btn-add {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            border: none;
            border-radius: 50px;
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            box-shadow: 0 4px 10px rgba(52, 152, 219, 0.3);
        }
        
        .btn-add:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(52, 152, 219, 0.4);
        }
        
        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-color));
            color: white;
        }
        
        @media (max-width: 768px) {
            .dashboard-header h1 {
                font-size: 1.8rem;
            }
            
            .amount {
                font-size: 1.5rem;
            }
            
            .chart-container {
                height: 250px;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h1 class="display-5 fw-bold">Cash Flow Management</h1>
                    <p class="lead">Track your income and expenses in real-time</p>
                </div>
                <div class="col-md-4 text-md-end">
                    <button class="btn btn-light btn-lg fw-bold" data-bs-toggle="modal" data-bs-target="#addTransactionModal">
                        + Add Transaction
                    </button>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <div class="container">
        <!-- Summary Cards -->
        <div class="row mb-4">
            <div class="col-md-4">
                <div class="card income-card summary-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Income</h5>
                        <div class="amount income-amount">$5,420.00</div>
                        <p class="text-muted">+12% from last month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card expense-card summary-card">
                    <div class="card-body">
                        <h5 class="card-title">Total Expenses</h5>
                        <div class="amount expense-amount">$3,280.50</div>
                        <p class="text-muted">+5% from last month</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card balance-card summary-card">
                    <div class="card-body">
                        <h5 class="card-title">Net Balance</h5>
                        <div class="amount balance-amount">$2,139.50</div>
                        <p class="text-muted">+22% from last month</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts and Transactions -->
        <div class="row">
            <!-- Left Column - Charts -->
            <div class="col-lg-8">
                <div class="card mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Cash Flow Overview</span>
                        <select class="form-select form-select-sm w-auto">
                            <option>Last 7 Days</option>
                            <option selected>Last 30 Days</option>
                            <option>Last 3 Months</option>
                            <option>Last 12 Months</option>
                        </select>
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="cashFlowChart"></canvas>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-header">
                        Income vs Expenses
                    </div>
                    <div class="card-body">
                        <div class="chart-container">
                            <canvas id="incomeExpenseChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column - Recent Transactions -->
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>Recent Transactions</span>
                        <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div id="transactionList">
                            <!-- Transactions will be populated by JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Transaction Modal -->
    <div class="modal fade" id="addTransactionModal" tabindex="-1" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addTransactionModalLabel">Add New Transaction</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="transactionForm">
                        <div class="mb-3">
                            <label for="transactionType" class="form-label">Transaction Type</label>
                            <select class="form-select" id="transactionType" required>
                                <option value="">Select Type</option>
                                <option value="income">Income</option>
                                <option value="expense">Expense</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="transactionCategory" class="form-label">Category</label>
                            <select class="form-select" id="transactionCategory" required>
                                <option value="">Select Category</option>
                                <!-- Categories will be populated by JavaScript based on type -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="transactionAmount" class="form-label">Amount</label>
                            <div class="input-group">
                                <span class="input-group-text">$</span>
                                <input type="number" class="form-control" id="transactionAmount" placeholder="0.00" step="0.01" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="transactionDescription" class="form-label">Description</label>
                            <input type="text" class="form-control" id="transactionDescription" placeholder="Enter description" required>
                        </div>
                        <div class="mb-3">
                            <label for="transactionDate" class="form-label">Date</label>
                            <input type="date" class="form-control" id="transactionDate" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveTransaction">Save Transaction</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Sample transaction data
        const transactions = [
            { id: 1, type: 'income', category: 'Salary', amount: 2500, description: 'Monthly Salary', date: '2023-04-01' },
            { id: 2, type: 'expense', category: 'Housing', amount: 1200, description: 'Rent Payment', date: '2023-04-01' },
            { id: 3, type: 'expense', category: 'Food', amount: 350, description: 'Groceries', date: '2023-04-03' },
            { id: 4, type: 'income', category: 'Freelance', amount: 800, description: 'Web Design Project', date: '2023-04-05' },
            { id: 5, type: 'expense', category: 'Transportation', amount: 120, description: 'Gas', date: '2023-04-07' },
            { id: 6, type: 'income', category: 'Investment', amount: 150, description: 'Dividends', date: '2023-04-10' }
        ];

        // Categories for income and expenses
        const categories = {
            income: ['Salary', 'Freelance', 'Investment', 'Bonus', 'Other Income'],
            expense: ['Housing', 'Food', 'Transportation', 'Entertainment', 'Healthcare', 'Utilities', 'Other Expenses']
        };

        // Initialize the page
        document.addEventListener('DOMContentLoaded', function() {
            // Render transactions
            renderTransactions();
            
            // Initialize charts
            initCharts();
            
            // Set today's date as default in the form
            document.getElementById('transactionDate').valueAsDate = new Date();
            
            // Update category options when type changes
            document.getElementById('transactionType').addEventListener('change', function() {
                updateCategoryOptions(this.value);
            });
            
            // Save transaction button event
            document.getElementById('saveTransaction').addEventListener('click', function() {
                saveTransaction();
            });
        });

        // Function to render transactions
        function renderTransactions() {
            const transactionList = document.getElementById('transactionList');
            transactionList.innerHTML = '';
            
            // Sort transactions by date (newest first) and take the first 5
            const recentTransactions = [...transactions]
                .sort((a, b) => new Date(b.date) - new Date(a.date))
                .slice(0, 5);
            
            recentTransactions.forEach(transaction => {
                const transactionElement = document.createElement('div');
                transactionElement.className = `transaction-item ${transaction.type}-item`;
                
                const formattedDate = new Date(transaction.date).toLocaleDateString('en-US', {
                    month: 'short',
                    day: 'numeric'
                });
                
                transactionElement.innerHTML = `
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="mb-1">${transaction.description}</h6>
                            <small class="text-muted">${transaction.category} • ${formattedDate}</small>
                        </div>
                        <div class="text-end">
                            <div class="fw-bold ${transaction.type === 'income' ? 'text-success' : 'text-danger'}">
                                ${transaction.type === 'income' ? '+' : '-'}$${transaction.amount.toFixed(2)}
                            </div>
                        </div>
                    </div>
                `;
                
                transactionList.appendChild(transactionElement);
            });
        }

        // Function to initialize charts
        function initCharts() {
            // Cash Flow Chart (Line Chart)
            const cashFlowCtx = document.getElementById('cashFlowChart').getContext('2d');
            const cashFlowChart = new Chart(cashFlowCtx, {
                type: 'line',
                data: {
                    labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                    datasets: [
                        {
                            label: 'Income',
                            data: [3200, 4100, 3800, 5200, 4800, 5420],
                            borderColor: '#2ecc71',
                            backgroundColor: 'rgba(46, 204, 113, 0.1)',
                            tension: 0.3,
                            fill: true
                        },
                        {
                            label: 'Expenses',
                            data: [2800, 3200, 2900, 3100, 3400, 3280],
                            borderColor: '#e74c3c',
                            backgroundColor: 'rgba(231, 76, 60, 0.1)',
                            tension: 0.3,
                            fill: true
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value;
                                }
                            }
                        }
                    }
                }
            });

            // Income vs Expenses Chart (Doughnut)
            const incomeExpenseCtx = document.getElementById('incomeExpenseChart').getContext('2d');
            const incomeExpenseChart = new Chart(incomeExpenseCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Income', 'Expenses'],
                    datasets: [{
                        data: [5420, 3280],
                        backgroundColor: [
                            '#2ecc71',
                            '#e74c3c'
                        ],
                        borderWidth: 0,
                        hoverOffset: 8
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: $${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Function to update category options based on transaction type
        function updateCategoryOptions(type) {
            const categorySelect = document.getElementById('transactionCategory');
            categorySelect.innerHTML = '<option value="">Select Category</option>';
            
            if (type && categories[type]) {
                categories[type].forEach(category => {
                    const option = document.createElement('option');
                    option.value = category;
                    option.textContent = category;
                    categorySelect.appendChild(option);
                });
            }
        }

        // Function to save a new transaction
        function saveTransaction() {
            const type = document.getElementById('transactionType').value;
            const category = document.getElementById('transactionCategory').value;
            const amount = parseFloat(document.getElementById('transactionAmount').value);
            const description = document.getElementById('transactionDescription').value;
            const date = document.getElementById('transactionDate').value;
            
            // Basic validation
            if (!type || !category || !amount || !description || !date) {
                alert('Please fill in all fields');
                return;
            }
            
            // Create new transaction object
            const newTransaction = {
                id: transactions.length + 1,
                type,
                category,
                amount,
                description,
                date
            };
            
            // Add to transactions array
            transactions.push(newTransaction);
            
            // Update UI
            renderTransactions();
            
            // Close modal
            const modal = bootstrap.Modal.getInstance(document.getElementById('addTransactionModal'));
            modal.hide();
            
            // Reset form
            document.getElementById('transactionForm').reset();
            document.getElementById('transactionDate').valueAsDate = new Date();
            
            // Show success message
            alert('Transaction added successfully!');
        }
    </script>
</body>
</html>