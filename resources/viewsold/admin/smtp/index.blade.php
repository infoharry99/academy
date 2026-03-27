
@extends('admin.layout')

@section('page_title', 'Users')

@section('content')

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="container py-5">

    <!-- Page Heading -->
    <div class="mb-4">
        <h2 class="fw-bold"> SMTP Configuration</h2>
        <p class="text-muted">Manage multiple SMTP servers for email delivery</p>
    </div>

    <!-- Add SMTP Card -->
    <div class="card shadow-sm mb-5">
        <div class="card-header bg-primary text-white fw-semibold">
            Add New SMTP
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.smtp.store') }}">
                @csrf

                <div class="row g-3">

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">SMTP Host</label>
                        <input type="text" name="host" class="form-control" placeholder="smtp.gmail.com" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Port</label>
                        <input type="number" name="port" class="form-control" placeholder="587" required>
                    </div>

                    <div class="col-md-3">
                        <label class="form-label fw-semibold">Encryption</label>
                        <select name="encryption" class="form-select">
                            <option value="tls">TLS</option>
                            <option value="ssl">SSL</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="example@gmail.com" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="SMTP password" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">From Email</label>
                        <input type="email" name="from_email" class="form-control" placeholder="no-reply@domain.com" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold">From Name</label>
                        <input type="text" name="from_name" class="form-control" placeholder="Company Name" required>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success px-4">
                        Add SMTP
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SMTP List -->
    <div class="card shadow-sm">
        <div class="card-header bg-dark text-white fw-semibold">
            SMTP List
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Host</th>
                            <th>Username</th>
                            <th>Port</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($smtps as $smtp)
                        <tr>
                            <td>{{ $smtp->host }}</td>
                            <td>{{ $smtp->username }}</td>
                            <td>{{ $smtp->port }}</td>
                            <td>
                                @if($smtp->active)
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-secondary">Disabled</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center text-muted py-4">
                                No SMTP configurations found
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        @if(method_exists($smtps, 'links'))
        <div class="card-footer bg-white">
            {{ $smtps->links('pagination::bootstrap-5') }}
        </div>
        @endif

    </div>

</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


@endsection
