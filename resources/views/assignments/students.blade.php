@include('dashboard.header')

{{-- <h2>مهامي</h2>

@foreach($assignments as $assignment)
    <h3>{{ $assignment->title }}</h3>
    <p>{{ $assignment->description }}</p>
    <p>الموعد النهائي: {{ $assignment->deadline }}</p>

    @if(!$assignment->pivot->answer)
        <form action="{{ route('assignments.submit', $assignment->id) }}" method="POST">
            @csrf
            <textarea name="answer" required></textarea>
            <button type="submit">إرسال الحل</button>
        </form>
    @else
        <p>الحل: {{ $assignment->pivot->answer }}</p>
        <p>الدرجة: {{ $assignment->pivot->grade ?? 'لم يتم التصحيح بعد' }}</p>
    @endif
@endforeach


@include('dashboard.footer') --}}


{{-- <div class="container">
    <h2>تعيين الطلاب للمهمة: {{ $assignment->title }}</h2>
    <form action="{{ route('assignments.assign-students', $assignment) }}" method="POST">
        @csrf
        <div class="form-group">
            <label>اختر الطلاب:</label>
            @foreach($students as $student)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="students[]" 
                           value="{{ $student->id }}" 
                           {{ in_array($student->id, $assignedStudents) ? 'checked' : '' }}>
                    <label class="form-check-label">{{ $student->name }}</label>
                </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-primary">حفظ التغييرات</button>
    </form>
</div> --}}
