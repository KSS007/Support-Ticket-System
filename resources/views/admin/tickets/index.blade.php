@extends('layouts.app')

@section('content')
<div class="container my-4">
    <div class="card shadow-sm rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="m-0">{{ __('All Support Tickets') }}</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Table -->
            <div class="table-responsive">
                <table id="tickets-table" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Department</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Status</th>
                            <th>Submitted At</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($allTickets as $ticket)
                            <tr>
                                <td>{{ $ticket['id'] }}</td>
                                <td>{{ $ticket['source'] }}</td>
                                <td>{{ $ticket['name'] }}</td>
                                <td>{{ $ticket['email'] }}</td>
                                <td>{{ $ticket['subject'] }}</td>
                                <td>{{ $ticket['status'] }}</td>
                                <td>{{ \Carbon\Carbon::parse($ticket['created_at'])->format('Y-m-d H:i') }}</td>
                                <td>
                                    <a href="{{ route('admin.ticket.view', ['type' => $ticket['source'], 'id' => $ticket['id']]) }}" class="btn btn-sm card-header bg-primary text-white">View</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#tickets-table').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false
        });
    });
</script>
@endpush

@endsection
