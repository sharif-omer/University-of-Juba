@include('dashboard.header')
{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}
<div class="container">
    <h2>تقديم حل للمهمة: {{ $assignment->title }}</h2>
    <form action="{{ route('submissions.store', $assignment) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>الإجابة على الأسئلة:</label>
            <textarea name="answers" class="form-control" rows="10" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">إرسال الحل</button>
    </form>
</div>
{{-- @endsection --}}