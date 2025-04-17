@include('dashboard.header')

<div class="container">
    <h2>تصحيح إجابة الطالب</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5>إجابة الطالب:</h5>
            <pre>{{ $submission->answer }}</pre>
        </div>
    </div>

    <form method="POST" action="{{ route('gradings.store', $submission) }}">
        @csrf
        
        <div class="mb-3">
            <label for="grade" class="form-label">الدرجة (من 100)</label>
            <input type="number" class="form-control" id="grade" name="grade" 
                   min="0" max="100" required>
        </div>
        
        <div class="mb-3">
            <label for="feedback" class="form-label">ملاحظات التصحيح</label>
            <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">حفظ التصحيح</button>
    </form>
</div>
