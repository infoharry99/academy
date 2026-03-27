
@extends('admin.layout')

@section('page_title', 'Users')

@section('content')

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Summernote -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">

    <style>
       body {
        font-family: 'DM Sans', sans-serif;
        background: var(--bg);
        color: var(--text);
        min-height: 100vh;
        }

        .note-editor.note-frame {
            border-radius: 0.375rem;
        }
    </style>

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-lg-12">
            
            <a href="{{ route('admin.bulk-emails.index') }}" class="btn btn-primary">
               Email List
            </a><br><br>
            
            
            <!-- Card -->
            <div class="card shadow-sm border-0">

                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">✉️ Email Template Settings</h5>
                </div>
                

                <div class="card-body">

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('admin.email-template.update') }}">
                        @csrf

                        <!-- Subject -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email Subject</label>
                            <input type="text"
                                   name="subject"
                                   class="form-control"
                                   placeholder="Enter email subject"
                                   value="{{ $template->subject ?? old('subject') }}"
                                   required>
                        </div>


                        <!-- From Email -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold">From Email</label>
                            <input type="email"
                                   name="from_mail"
                                   class="form-control"
                                   placeholder="from@example.com"
                                   value="{{ $template->from_mail ?? old('from_mail') }}"
                                   required>
                        </div>
                          <div class="mb-3">
                            <label class="form-label fw-semibold">From Name</label>
                            <input type="text"
                                   name="from_name"
                                   class="form-control"
                                   placeholder="TheNexteck"
                                   value="{{ $template->from_name ?? old('from_name') }}"
                                   required>
                        </div>

                        <!-- Email Body -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold">Email Body</label>
                            <textarea id="summernote"
                                      name="body">
                                {{ $template->body ?? '' }}
                            </textarea>
                        </div>

                        <!-- Save Button -->
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary px-4">
                                💾 Save Template
                            </button>
                        </div>

                    </form>

                </div>
            </div>
            <!-- End Card -->

        </div>
    </div>

</div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

<script>
    $('#summernote').summernote({
        height: 320,
        placeholder: 'Write your email content here...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline']],
            ['font', ['fontsize', 'color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['insert', ['link']],
            ['view', ['codeview']]
        ]
    });
</script>

@endsection
