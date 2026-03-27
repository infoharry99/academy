{{-- ====== USERS PAGE: resources/views/admin/users.blade.php ======

@extends('admin.layout')

@section('page_title', 'Users')

@section('content')

<div class="page-header">
    <h1>All Users</h1>
    <p>Manage registered user accounts</p>
</div>

<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr>
                <td>#{{ $u->id }}</td>
                <td style="font-weight:500;color:var(--text)">{{ $u->name }}</td>
                <td style="color:var(--muted)">{{ $u->email }}</td>
                <td style="color:var(--muted)">{{ $u->created_at ? $u->created_at->format('d M Y') : '—' }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4">
                    <div class="empty-state">
                        <span class="emoji">👤</span>
                        <p>No users found</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection --}}

{{-- ====== USERS PAGE: resources/views/admin/users.blade.php ====== --}}

@extends('admin.layout')

@section('page_title', 'Users')

@section('content')



<style>
/* Simple modal styling */
.modal-overlay {
    display: none;
    position: fixed;
    inset: 0;
    background: rgba(0,0,0,0.6);
    z-index: 999;
}

.modal-box {
    background: var(--bg);
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    border-radius: 10px;
}

.modal-box h3 {
    margin-bottom: 15px;
}

.modal-box button {
    width: 100%;
    padding: 10px;
    margin-bottom: 10px;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-email { background: #1969f3ce; color: #fff; }
.btn-sms { background: #f59e0b; color: #fff; }
.btn-wa { background: #2C5B63; color: #fff; }
.btn-cancel { background: #ddd; color: #000;}

textarea {
    width: 100%;
    padding: 10px;
    border-radius: 6px;
    border: 1px solid #ccc;
    color: #333;
}

.action-btn {
    padding: 10px 15px;
    background: #2C5B63;
    color: #fff;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.custom-alert {
    background: #d1fae5;
    color: #065f46;
    padding: 12px 16px;
    border-radius: 6px;
    margin-bottom: 15px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border: 1px solid #10b981;
}

.custom-alert button {
    background: transparent;
    border: none;
    font-size: 16px;
    cursor: pointer;
    color: #065f46;
}
.modal-box button i {
    margin-right: 8px;
}
</style>

<div class="page-header">
    <h1>All Users</h1>
    <p>Manage registered user accounts</p>
</div>

@if(session('success'))
    <div id="successAlert" class="custom-alert">
        <span>{{ session('success') }}</span>
        <button onclick="closeAlert()">✕</button>
    </div>
@endif

<script>
function closeAlert() {
    document.getElementById('successAlert').style.display = 'none';
}
</script>

<script>
setTimeout(() => {
    let alert = document.getElementById('successAlert');
    if (alert) alert.style.display = 'none';
}, 3000);
</script>

{{-- TEXTAREA --}}
<div style="margin-bottom:20px;">
    <label style="font-weight:600;">Selected Emails (auto-generated)</label>

    <textarea id="selectedEmails"
              rows="3"
              placeholder="email1@test.com#email, email2@test.com#email"
              readonly></textarea>
</div>

{{-- BUTTON --}}
<div style="margin-bottom:15px;">
    <button class="action-btn" onclick="openModal()">
        Send Notification
    </button>
</div>

{{-- TABLE --}}
<div class="table-wrap">
    <table>
        <thead>
            <tr>
                <th>
                    <input type="checkbox" id="selectAll">
                </th>
                <th>#ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Joined</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $u)
            <tr>
                <td>
                    <input type="checkbox"
                           class="userCheckbox"
                           data-email="{{ $u->email }}"
                           data-name="{{ $u->name }}">
                </td>
                <td>#{{ $u->id }}</td>
                <td style="font-weight:500;color:var(--text)">{{ $u->name }}</td>
                <td style="color:var(--muted)">{{ $u->email }}</td>
                <td style="color:var(--muted)">
                    {{ $u->created_at?->format('d M Y') ?? '—' }}
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5">
                    <div class="empty-state">
                        <span class="emoji">👤</span>
                        <p>No users found</p>
                    </div>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- FORM --}}
<form id="bulkForm" method="POST" action="{{ route('admin.bulk-emails.store') }}">
    @csrf
    <input type="hidden" name="emails" id="finalEmails">
    <input type="hidden" name="type" id="notifyType">
</form>

{{-- MODAL --}}
<div class="modal-overlay" id="notifyModal">
    <div class="modal-box">
        <h3>Select Notification Type</h3>

        <button class="btn-email" onclick="submitType('email')">
            <i class="fa-solid fa-envelope"></i> Email
        </button>

        <button class="btn-sms" onclick="submitType('sms')">
            <i class="fa-solid fa-comment-dots"></i> SMS
        </button>

        <button class="btn-wa" onclick="submitType('whatsapp')">
            <i class="fa-brands fa-whatsapp"></i> WhatsApp
        </button>

        <button class="btn-cancel" onclick="closeModal()">
            <i class="fa-solid fa-xmark"></i> Cancel
        </button>
    </div>
</div>

{{-- JS --}}
<script>

// SELECT ALL
document.getElementById('selectAll').addEventListener('change', function () {
    document.querySelectorAll('.userCheckbox').forEach(cb => {
        cb.checked = this.checked;
    });
    updateTextarea();
});

// INDIVIDUAL SELECT
document.querySelectorAll('.userCheckbox').forEach(cb => {
    cb.addEventListener('change', updateTextarea);
});

// UPDATE TEXTAREA
function updateTextarea() {
    let selected = document.querySelectorAll('.userCheckbox:checked');
    let emails = [];

    selected.forEach(cb => {
        let email = cb.dataset.email;
        let name = cb.dataset.name || 'User';

        if (email) {
            emails.push(email + '#' + 'email');
        }
    });

    document.getElementById('selectedEmails').value = emails.join(', ');
}

// OPEN MODAL
function openModal() {
    let data = document.getElementById('selectedEmails').value;

    if (!data) {
        alert('Please select at least one user');
        return;
    }

    document.getElementById('notifyModal').style.display = 'block';
}

// CLOSE MODAL
function closeModal() {
    document.getElementById('notifyModal').style.display = 'none';
}

// SUBMIT
function submitType(type) {
    let emails = document.getElementById('selectedEmails').value;

    document.getElementById('finalEmails').value = emails;
    document.getElementById('notifyType').value = type;

    document.getElementById('bulkForm').submit();
}

</script>

@endsection