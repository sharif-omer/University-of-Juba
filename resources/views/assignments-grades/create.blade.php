@include('dashboard.header')

<div class="container">
    <h2>تصحيح مهمة الطالب: {{ $submission->student->name }}</h2>
    <div class="card mb-3">
        <div class="card-body">
            <h5>إجابات الطالب:</h5>
            <p>{{ $submission->answers }}</p>
        </div>
    </div>
    
    <form action="{{ route('grades.store', $submission) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="grade">الدرجة (من 100)</label>
            <input type="number" name="grade" class="form-control" min="0" max="100" required>
        </div>
        <div class="form-group">
            <label for="feedback">ملاحظات</label>
            <textarea name="feedback" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">حفظ التصحيح</button>
    </form>
</div>
