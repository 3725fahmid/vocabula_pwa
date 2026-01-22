<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 | Page Not Found</title>
<!-- Bootstrap 5 CDN -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
    body {
        background-color: #f8f9fa;
        font-family: system-ui, -apple-system, "Segoe UI", Roboto, Arial, sans-serif;
    }

    .error-code {
        font-size: 8rem;
        font-weight: 800;
        color: #dc3545;
    }

    .error-image {
        max-width: 300px;
        opacity: 0.65;
    }
</style>
</head>
<body>

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center text-center">

<!-- ERROR CODE -->
<div class="error-code mb-3">404</div>

<!-- TITLE -->
<h2 class="fw-bold mb-3">Oops! Page Not Found</h2>

<!-- MESSAGE -->
<p class="text-muted mb-4">
    The page you are looking for does not exist.<br>
    It may have been moved, deleted, or the URL is incorrect.
</p>

<!-- ACTION BUTTONS -->
<div class="d-flex gap-3 justify-content-center flex-wrap mb-4">
    <a href="{{ url('/') }}" class="btn btn-primary btn-lg px-4">
        Go Home
    </a>

    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-lg px-4">
        Go Back
    </a>
</div>

</div>

</body>
</html>
