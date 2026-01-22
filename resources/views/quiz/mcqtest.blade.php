@extends('layouts.app')

@section('title', 'MCQ Quiz')

@section('admin')

<div class="page-content">

    <!-- HEADER -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">Quick Quiz</h3>
        <p class="text-muted">Choose the correct meaning for each word</p>
    </div>

    <!-- TIMER -->
    <div class="text-center mb-4">
        <span class="badge bg-warning fs-5 px-4 py-2 rounded-pill">
            Time Left: <span id="timer">30:00</span>
        </span>
    </div>

    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>

    @php
        // Shuffle all questions
        // $shuffledWords = $words->shuffle();
        $shuffledWords = $words->shuffle()->take(100);
    @endphp

    @foreach($shuffledWords as $index => $item)
    {{-- 
        Data safety check:
        Do not render this question if `word` is missing or empty,
        otherwise users will see a blank question title.
    --}}
    @continue(empty(trim($item['word'])))

        @php
            // 1. Take 3 WRONG answers (excluding correct one)
            $options = $words->pluck('wordmeaning')
                            ->filter(fn($m) => trim($m) !== '')
                            ->where(fn($m) => $m !== $item['wordmeaning'])
                            ->shuffle()
                            ->take(3)
                            ->values();

            // 2. Add the CORRECT answer
            $options->push($item['wordmeaning']);

            // 3. Final shuffle
            $options = $options->shuffle()->values();
        @endphp


        <!-- QUESTION -->
        <div class="card border-0 shadow-sm rounded-4 mb-4 question-card"
             data-correct="{{ $item['wordmeaning'] }}">

            <div class="card-body p-4">

                <!-- WORD -->
                <div class="d-flex align-items-center mb-3">
                    <span class="badge bg-primary bg-opacity-10 text-primary me-3 px-3 py-2">
                        {{ $index + 1 }}
                    </span>
                    <h5 class="mb-0 fw-semibold">{{ $item['word'] }}</h5>
                </div>

                <!-- OPTIONS -->
                <div class="row g-3 options">
                    @foreach($options as $opt)
                        <div class="col-12 col-md-6">
                            <label class="option w-100">
                                <input type="radio"
                                       name="q{{ $index }}"
                                       value="{{ $opt }}"
                                       class="d-none">

                                <div class="option-box rounded-3 p-3 h-100">
                                    {{ $opt }}
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>

                <!-- FEEDBACK -->
                <div class="feedback mt-3 fw-semibold small"></div>

            </div>
        </div>

    @endforeach

    <!-- SUBMIT -->
    <div class="text-center mt-4">
        <button class="btn btn-primary px-5 py-2 rounded-pill submit-btn">
            Check Answers
        </button>

        <div class="score mt-3"></div>
    </div>

</div>

@endsection

@section('scripts')

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<style>
.option-box {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    cursor: pointer;
    transition: all .2s ease;
    font-size: .95rem;
    border: 1px solid #fff;
}

.option-box:hover {
    border: 1px solid #2e3;
    background: rgb(190, 247, 195);
}

.option input:checked + .option-box {
    background-color: #e7f3ff;
    border-color: #1877f2;
    color: #025c1a; 
    box-shadow: 0 4px 12px rgba(24, 119, 242, 0.1);
}

.option-box.correct {
    background: #e6f4ea !important;
    border-color: #198754 !important;
    color: #0f5132;
}

.option-box.wrong {
    background: #fbeaea !important;
    border-color: #dc3545 !important;
    color: #842029;
}

.feedback {
    min-height: 20px;
}

.feedback.correct {
    color: #198754;
}

.feedback.wrong {
    color: #dc3545;
}
</style>

<script>
$(function () {

    // TIMER
    let timeLeft = 50 * 60; // 50 minutes in seconds

    function formatTime(seconds) {
        const m = Math.floor(seconds / 60).toString().padStart(2, '0');
        const s = (seconds % 60).toString().padStart(2, '0');
        return `${m}:${s}`;
    }

    const timerEl = $("#timer");

    const timerInterval = setInterval(() => {
        timeLeft--;
        timerEl.text(formatTime(timeLeft));

        if (timeLeft <= 0) {
            clearInterval(timerInterval);
            alert("Time's up! Submitting your answers...");
            $(".submit-btn").click(); // Auto-submit
        }
    }, 1000);

    // QUIZ SUBMISSION
    $(".submit-btn").on("click", function () {

        let score = 0;
        let total = $(".question-card").length;

        $(".question-card").each(function () {

            const correctAnswer = $(this).data("correct");
            const selectedInput = $(this).find("input:checked");
            const feedback = $(this).find(".feedback");

            feedback.removeClass("correct wrong");

            // Remove previous colors
            $(this).find(".option-box").removeClass("correct wrong");

            // Highlight correct option
            $(this).find("input").each(function () {
                if ($(this).val() === correctAnswer) {
                    $(this).next(".option-box").addClass("correct");
                }
            });

            if (selectedInput.length === 0) {
                feedback.addClass("wrong").text("⚠ No answer selected");
                return;
            }

            if (selectedInput.val() === correctAnswer) {
                score++;
                feedback.addClass("correct").text("✔ Correct answer");
            } else {
                selectedInput.next(".option-box").addClass("wrong");
                feedback.addClass("wrong").text("✘ Wrong answer");
            }

        });

        $(".score").html(`
            <span class="badge bg-success fs-6 px-4 py-2 rounded-pill">
                Score: ${score} / ${total}
            </span>
        `);

        $(this).prop("disabled", true);
        $("input[type=radio]").prop("disabled", true);

        // Stop timer if user manually submits
        clearInterval(timerInterval);
    });

});
</script>

@endsection
