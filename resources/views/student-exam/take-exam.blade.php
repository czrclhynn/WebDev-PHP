@extends('common.main')
@section('title', 'Take Exam')
@section('content')

<div class="container py-4" style="font-family: sans-serif;">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h3>{{ $exam->title }}</h3>
        <div id="timer" class="fw-bold fs-5 text-danger"></div>
    </div>

    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach
    @endif

    <form method="POST" action="{{ route('studentExam.submit', $exam->id) }}" id="examForm">
        @csrf

        @foreach($questions as $index => $question)
            <div class="card mb-3">
                <div class="card-body">
                    <p class="fw-bold">{{ $index + 1 }}. {{ $question->question_text }}</p>

                    @foreach($question->choices as $choice)
                        <div class="form-check">
                            <input
                                class="form-check-input"
                                type="radio"
                                name="answers[{{ $question->id }}]"
                                id="choice{{ $choice->id }}"
                                value="{{ $choice->id }}"
                                required
                            >
                            <label class="form-check-label" for="choice{{ $choice->id }}">
                                {{ $choice->choice_text }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach

        <button type="submit" class="btn btn-primary w-100">Submit Exam</button>
    </form>
</div>

<script>
    // 9. Ask for confirmation before the exam is actually submitted
    document.getElementById('examForm').addEventListener('submit', function (e) {
        if (!confirm('Are you sure you want to submit your exam? You cannot make changes after this.')) {
            e.preventDefault();
        }
    });

    // Simple countdown timer based on the exam's duration_minutes.
    // Auto-submits the form once time runs out.
    let secondsLeft = {{ $exam->duration_minutes }} * 60;
    const timerEl = document.getElementById('timer');

    const countdown = setInterval(function () {
        let minutes = Math.floor(secondsLeft / 60);
        let seconds = secondsLeft % 60;
        timerEl.textContent = 'Time Left: ' + minutes + 'm ' + (seconds < 10 ? '0' : '') + seconds + 's';

        if (secondsLeft <= 0) {
            clearInterval(countdown);
            alert('Time is up! Your exam will now be submitted.');
            document.getElementById('examForm').submit();
        }

        secondsLeft--;
    }, 1000);
</script>
@endsection
