
@extends('admin.layout')

@section('page_title', 'Users')

@section('content')

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- DataTables Bootstrap 5 -->
    <link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">


    <style>
       body {
        font-family: 'DM Sans', sans-serif;
        background: var(--bg);
        color: var(--text);
        min-height: 100vh;
        }
    </style>

<div class="container py-5">

    <!-- Heading -->
    <div class="mb-4">
        <h2 class="fw-bold">Bulk Email Manager</h2>
        <p class="text-muted">Add and manage bulk email addresses for campaigns</p>
    </div>
    
    

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Reset All -->
    <form method="POST"
          action="{{ route('admin.bulk-emails.reset-all') }}"
          onsubmit="return confirm('Reset ALL sent & failed emails to pending?')">
        @csrf
        <button class="btn btn-danger mb-3">
            Reset ALL Emails to Pending
        </button>
    </form

    <br>
    <br>
    <a href="{{ route('admin.email-template.edit') }}" class="btn btn-primary mb-4">
        Edit Email Template
    </a>
    
    

    <!-- Add Emails -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white fw-semibold">
            Add Email Addresses
        </div>
        <!-- COUNTS SUMMARY -->
      

        <div class="card-body">
            <form method="POST" action="{{ route('admin.bulk-emails.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email IDs (comma separated)(email#name)</label>
                    <textarea name="emails"
                              rows="4"
                              class="form-control"
                              placeholder="email1@test.com#email, email2@test.com#email"
                              required></textarea>
                </div>

                <button type="submit" class="btn btn-success">
                    Save Emails
                </button>
            </form>
        </div>
    </div>

    <!-- Email List -->
        <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-semibold">
            Email List
        </div>
        
          <div class="row mb-4">
    <div class="col-md-2 col-6 mb-2">
        <div class="card text-center shadow-sm">
            <div class="card-body">
                <h6 class="text-muted">Total</h6>
                <h4 class="fw-bold">{{ $counts['total'] }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-6 mb-2">
        <div class="card text-center shadow-sm border-warning">
            <div class="card-body">
                <h6 class="text-warning">Pending</h6>
                <h4 class="fw-bold text-warning">{{ $counts['pending'] }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-6 mb-2">
        <div class="card text-center shadow-sm border-success">
            <div class="card-body">
                <h6 class="text-success">Sent</h6>
                <h4 class="fw-bold text-success">{{ $counts['sent'] }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-6 mb-2">
        <div class="card text-center shadow-sm border-danger">
            <div class="card-body">
                <h6 class="text-danger">Failed</h6>
                <h4 class="fw-bold text-danger">{{ $counts['failed'] }}</h4>
            </div>
        </div>
    </div>

    <div class="col-md-2 col-6 mb-2">
        <div class="card text-center shadow-sm border-dark">
            <div class="card-body">
                <h6 class="text-dark">Blocked</h6>
                <h4 class="fw-bold">{{ $counts['blocked'] }}</h4>
            </div>
        </div>
    </div>
</div>

        <!-- Filter -->
        <div class="p-3 bg-light border-bottom d-flex gap-2 align-items-center">
            <label class="fw-semibold mb-0">Filter:</label>
            <select id="statusFilter" class="form-select form-select-sm w-auto">
                <option value="">All</option>
                <option value="pending">Pending</option>
                <option value="sent">Sent</option>
                <option value="blocked">Blocked</option>
            </select>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table id="emailsTable"
                       class="table table-striped table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Email</th>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emails as $e)
                        <tr>
                            <td>{{ $e->email }}</td>
                             <td>{{ $e->name }}</td>

                            <td data-status="{{ $e->is_blocked ? 'blocked' : $e->status }}">
                                @if($e->is_blocked)
                                    <span class="badge bg-danger">Blocked</span>
                                @elseif($e->status === 'pending')
                                    <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($e->status === 'sent')
                                    <span class="badge bg-success">Sent</span>
                                @else
                                    <span class="badge bg-secondary">{{ ucfirst($e->status) }}</span>
                                @endif
                            </td>

                            <td>
                                @if(!$e->is_blocked && $e->status !== 'pending')
                                <form method="POST"
                                      action="{{ route('admin.bulk-emails.reset', $e->id) }}"
                                      class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-warning"
                                            onclick="return confirm('Reset to pending?')">
                                        Reset
                                    </button>
                                </form>
                                @endif

                                <form method="POST"
                                      action="{{ route('admin.bulk-emails.toggle-block', $e->id) }}"
                                      class="d-inline">
                                    @csrf
                                    <button class="btn btn-sm {{ $e->is_blocked ? 'btn-success' : 'btn-danger' }}"
                                            onclick="return confirm('{{ $e->is_blocked ? 'Unblock' : 'Block' }} this email?')">
                                        {{ $e->is_blocked ? 'Unblock' : 'Block' }}
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function () {

    let table = $('#emailsTable').DataTable({
        pageLength: 10,
        lengthChange: false,
        ordering: true,
        language: {
            search: "Search email:"
        }
    });

    // Custom status filter using DataTables API
    $('#statusFilter').on('change', function () {
        let val = this.value;

        if (val) {
            table.column(2).search(val, true, false).draw();
        } else {
            table.column(2).search('').draw();
        }
    });

});
</script>


@endsection
