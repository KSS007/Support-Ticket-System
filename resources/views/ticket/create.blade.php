<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Support Ticket</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
    body {
        background: linear-gradient(135deg, #e0f7fa, #f8f9fa);
        background-image: url('https://www.transparenttextures.com/patterns/cubes.png'); /* subtle texture pattern */
        background-repeat: repeat;
        background-size: contain;
        min-height: 100vh;
    }

    .card {
        border: none;
        box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.1);
        background-color: rgba(255, 255, 255, 0.95); /* slightly translucent card */
        backdrop-filter: blur(10px); /* frosted glass effect */
        border-radius: 1rem;
    }

    .form-floating label i {
        margin-right: 0.5rem;
        color: #6c757d;
    }
    </style>
</head>
<body>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card p-4">
                <h2 class="text-center mb-4"><i class="bi bi-headset"></i> Submit a Support Ticket</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('ticket.submit') }}" novalidate>
                    @csrf

                    <!-- Name -->
                    <div class="form-floating mb-3">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                               placeholder="Your Name" value="{{ old('name') }}" required>
                        <label for="name"><i class="bi bi-person-fill"></i> Name</label>
                        <div class="invalid-feedback">
                            @error('name') {{ $message }} @else Please enter your name. @enderror
                        </div>
                    </div>

                    <!-- Email -->
                    <div class="form-floating mb-3">
                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror"
                               placeholder="name@example.com" value="{{ old('email') }}" required>
                        <label for="email"><i class="bi bi-envelope-fill"></i> Email</label>
                        <div class="invalid-feedback">
                            @error('email') {{ $message }} @else Please enter a valid email. @enderror
                        </div>
                    </div>

                    <!-- Subject -->
                    <div class="form-floating mb-3">
                        <input type="text" name="subject" id="subject" class="form-control @error('subject') is-invalid @enderror"
                               placeholder="Subject" value="{{ old('subject') }}" required>
                        <label for="subject"><i class="bi bi-chat-left-dots-fill"></i> Subject</label>
                        <div class="invalid-feedback">
                            @error('subject') {{ $message }} @else Please enter a subject. @enderror
                        </div>
                    </div>

                    <!-- Message -->
                    <div class="form-floating mb-3">
                        <textarea name="message" id="message" class="form-control @error('message') is-invalid @enderror"
                                  placeholder="Leave your message here" style="height: 150px;" required>{{ old('message') }}</textarea>
                        <label for="message"><i class="bi bi-pencil-square"></i> Message</label>
                        <div class="invalid-feedback">
                            @error('message') {{ $message }} @else Please enter your message. @enderror
                        </div>
                    </div>

                    <!-- Ticket Type -->
                    <div class="form-floating mb-4">
                        <select name="type" id="type" class="form-select @error('type') is-invalid @enderror" required>
                            <option value="" disabled selected>Select Type</option>
                            <option value="Technical Issues" {{ old('type') == 'Technical Issues' ? 'selected' : '' }}>Technical Issues</option>
                            <option value="Account & Billing" {{ old('type') == 'Account & Billing' ? 'selected' : '' }}>Account & Billing</option>
                            <option value="Product & Service" {{ old('type') == 'Product & Service' ? 'selected' : '' }}>Product & Service</option>
                            <option value="General Inquiry" {{ old('type') == 'General Inquiry' ? 'selected' : '' }}>General Inquiry</option>
                            <option value="Feedback & Suggestions" {{ old('type') == 'Feedback & Suggestions' ? 'selected' : '' }}>Feedback & Suggestions</option>
                        </select>
                        <label for="type"><i class="bi bi-tags-fill"></i> Ticket Type</label>
                        <div class="invalid-feedback">
                            @error('type') {{ $message }} @else Please select a ticket type. @enderror
                        </div>
                    </div>

                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">
                            <i class="bi bi-send-fill"></i> Submit Ticket
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<!-- JS Validation -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");

        form.addEventListener("submit", function (event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add("was-validated");
        });
    });
</script>

<!-- Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
