<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - Support Tickets</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    @auth
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">  
            <a class="navbar-brand" href="{{ route('admin.tickets') }}">Admin Panel</a>
            <div class="ml-auto">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-light">Logout</button>
                    </form> 
            </div>
        </div>
    </nav>
 @endauth

    <main class="container">
        @yield('content')
    </main>

    @stack('scripts')
</body>
</html>
