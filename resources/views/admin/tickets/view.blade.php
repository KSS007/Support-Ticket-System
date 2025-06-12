@extends('layouts.app')

@section('content')
<div class="container my-4">
    <h3 class="mb-4 text-center">{{ __('Ticket Details') }}</h3>

    <div class="card shadow-sm rounded-lg mb-4">
        <div class="card-header bg-primary text-white">
            <strong>{{ $ticket->subject }}</strong>
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ $ticket->name }}</p>
            <p><strong>Email:</strong> {{ $ticket->email }}</p>
            <p><strong>Type:</strong> {{ $ticket->type }}</p>
            <p><strong>Status:</strong> {{ $ticket->status }}</p>
            <p><strong>Message:</strong><br>{{ nl2br(e($ticket->message)) }}</p>
        </div>
    </div>

    <div class="card shadow-sm rounded-lg mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="m-0">{{ __('Add Note') }}</h5>
        </div>
        <div class="card-body">
            <form id="note-form" method="POST" action="{{ route('admin.ticket.note', ['type' => $type, 'id' => $ticket->id]) }}">
                @csrf
                <input type="hidden" name="note" id="note">

                <!-- Quill Editor -->
                <div id="quill-editor" class="border p-3 rounded" style="height: 200px; background-color: #f8f9fa;">{!! $ticket->note !!}</div>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-primary px-4 py-2">Mark as Noted</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<!-- Quill Styles and Script -->
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
<script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>

<!-- Quill Editor Setup -->
<script>
    var quill = new Quill('#quill-editor', {
        theme: 'snow',
        placeholder: 'Type your note here...',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered' }, { 'list': 'bullet' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image'],
                ['clean']
            ]
        }
    });

    // On form submit, set hidden input value
    document.querySelector('#note-form').addEventListener('submit', function () {
        document.querySelector('#note').value = quill.root.innerHTML;
    });
</script>
@endpush

@endsection
