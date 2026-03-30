@extends('admin.layout')

@section('page_title', 'Payments')

@section('content')

<style>
/* MODAL OVERLAY */
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0,0,0,0.7);
    display: none;
    align-items: center;
    justify-content: center;
    z-index: 999;
}

/* MODAL BOX */
.modal-box {
    background: #0f172a;
    padding: 25px;
    border-radius: 12px;
    width: 420px;
    color: #fff;
    box-shadow: 0 0 30px rgba(0,0,0,0.6);
}

/* BUTTONS */
.btn-primary {
    background: #2563eb;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 6px;
    cursor: pointer;
    margin-right: 8px;
}

.btn-primary:hover {
    background: #1d4ed8;
}

.btn-secondary {
    background: #374151;
    color: white;
    border: none;
    padding: 8px 14px;
    border-radius: 6px;
    cursor: pointer;
}

.btn-secondary:hover {
    background: #1f2937;
}

/* INVOICE TEXT */
#invoiceContent p {
    margin: 6px 0;
    font-size: 14px;
}

/* STATUS COLORS */
.status-paid {
    color: #22c55e;
    font-weight: 500;
}

.status-pending {
    color: #f59e0b;
    font-weight: 500;
}
</style>

<div class="page-header">
    <h1>Payments</h1>
    <p>Manage user payments & generate invoices</p>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Email</th>
                <th>Amount</th>
                <th>Status</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody id="paymentTable"></tbody>
    </table>
</div>

<!-- INVOICE MODAL -->
<div id="invoiceModal" class="modal-overlay">
    <div class="modal-box">
        <h2 style="margin-bottom:10px;">Invoice</h2>

        <div id="invoiceContent"></div>

        <div style="margin-top:15px;">
            <button onclick="sendInvoice()" class="btn-primary">Send</button>
            <button onclick="printInvoice()" class="btn-primary">Print</button>
            <button onclick="closeModal()" class="btn-secondary">Close</button>
        </div>
    </div>
</div>




<script>
document.addEventListener("DOMContentLoaded", function () {

const payments = [
    { id: 101, name: "John Doe", email: "john@example.com", amount: 1200, status: "Paid", date: "2026-03-20" },
    { id: 102, name: "Sarah Khan", email: "sarah@example.com", amount: 850, status: "Pending", date: "2026-03-22" },
    { id: 103, name: "Amit Sharma", email: "amit@example.com", amount: 2300, status: "Paid", date: "2026-03-25" }
];

const table = document.getElementById('paymentTable');

// FORMAT DATE
function formatDate(date){
    return new Date(date).toLocaleDateString('en-IN',{
        day:'2-digit', month:'short', year:'numeric'
    });
}

// RENDER TABLE
function renderTable() {
    table.innerHTML = payments.map(p => `
        <tr>
            <td>#${p.id}</td>
            <td style="font-weight:500;">${p.name}</td>
            <td style="color:var(--muted)">${p.email}</td>
            <td>£${p.amount}</td>
            <td class="${p.status === 'Paid' ? 'status-paid' : 'status-pending'}">
                ${p.status}
            </td>
            <td>${formatDate(p.date)}</td>
            <td>
                <button onclick="generateInvoice(${p.id})" class="btn-primary">
                    Generate Invoice
                </button>
            </td>
        </tr>
    `).join('');
}

// GENERATE INVOICE
window.generateInvoice = function(id){
    const payment = payments.find(p => p.id === id);

    document.getElementById('invoiceContent').innerHTML = `
        <p><strong>Invoice ID:</strong> INV-${payment.id}</p>
        <p><strong>Name:</strong> ${payment.name}</p>
        <p><strong>Email:</strong> ${payment.email}</p>
        <p><strong>Amount:</strong> £${payment.amount}</p>
        <p><strong>Status:</strong> ${payment.status}</p>
        <p><strong>Date:</strong> ${formatDate(payment.date)}</p>
    `;

    document.getElementById('invoiceModal').style.display = 'flex';
}

// CLOSE MODAL
window.closeModal = function(){
    document.getElementById('invoiceModal').style.display = 'none';
}

// PRINT
window.printInvoice = function(){
    const content = document.getElementById('invoiceContent').innerHTML;
    const win = window.open('', '', 'width=800,height=600');

    win.document.write(`
        <html>
            <head><title>Invoice</title></head>
            <body>
                <h2>Invoice</h2>
                ${content}
            </body>
        </html>
    `);

    win.document.close();
    win.print();
}

// SEND (DUMMY)
window.sendInvoice = function(){
    alert("Invoice sent successfully (demo)");
}

// INIT
renderTable();

});
</script>
@endsection