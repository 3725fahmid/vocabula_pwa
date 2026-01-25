@extends('layouts.app')

@section('title', 'MCQ Quiz')

@section('admin')

<div class="page-content container">

    <!-- HEADER -->
    <div class="text-center mb-4">
        <h3 class="fw-bold">Moc Quiz Test</h3>
        <p class="text-muted">Choose the correct meaning for each word</p>
    </div>

    <!-- BACK -->
    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>

    <!-- NUMBER OF QUESTIONS FILTER -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body text-center">
            <span class="fw-semibold me-2">Number of Questions:</span>
            <div class="btn-group filter-btns">
                <button class="btn btn-outline-primary active" data-count="all">All</button>
                <button class="btn btn-outline-primary" data-count="10">10</button>
                <button class="btn btn-outline-primary" data-count="25">25</button>
                <button class="btn btn-outline-primary" data-count="50">50</button>
                <button class="btn btn-outline-primary" data-count="100">100</button>
            </div>
        </div>
    </div>

    <!-- FIRST LETTER FILTER -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body text-center">
            <span class="fw-semibold me-2">Filter by First Letter:</span>
            <div class="btn-group letter-filter" role="group">
                @foreach(range('A','Z') as $letter)
                    <button class="btn btn-outline-secondary" data-letter="{{ $letter }}">{{ $letter }}</button>
                @endforeach
                <button class="btn btn-outline-secondary active" data-letter="all">All</button>
            </div>
        </div>
    </div>

    @php
        $shuffledWords = $words->shuffle()->take(100);
    @endphp

    <!-- QUESTIONS -->
    @foreach($shuffledWords as $index => $item)
        @continue(empty(trim($item['word'])))

        @php
            $options = $words->pluck('wordmeaning')
                ->filter(fn($m) => trim($m) !== '')
                ->where(fn($m) => $m !== $item['wordmeaning'])
                ->shuffle()
                ->take(3)
                ->values();

            $options->push($item['wordmeaning']);
            $options = $options->shuffle()->values();
        @endphp

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
                <div class="row g-3">
                    @foreach($options as $opt)
                        <div class="col-12 col-md-6">
                            <label class="option w-100">
                                <input type="radio" name="q{{ $index }}" value="{{ $opt }}" class="d-none">
                                <div class="option-box rounded-3 p-3 h-100">
                                    {{ $opt }}
                                </div>
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="feedback mt-3 fw-semibold small"></div>

            </div>
        </div>

    @endforeach

    <!-- SUBMIT -->
    <div class="text-center mt-4">
        <button class="btn btn-primary px-5 py-2 rounded-pill submit-btn">
            Check Answers
        </button>
    </div>

</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/libs/sweetalert2/sweeralert2.min.js') }}"></script>

<style>
.option-box {
    background: #f8f9fa;
    border: 2px solid #e9ecef;
    cursor: pointer;
    transition: all .2s ease;
    font-size: .95rem;
}
.option-box:hover { background: #d1f7d6; border-color: #2ecc71; }
.option input:checked + .option-box { background: #e7f3ff; border-color: #1877f2; }
.option-box.correct { background: #e6f4ea !important; border-color: #198754 !important; }
.option-box.wrong { background: #fbeaea !important; border-color: #dc3545 !important; }
.feedback.correct { color: #198754; }
.feedback.wrong { color: #dc3545; }
</style>

<script>
$(function () {

    let activeLetter = "all";

    function filterQuestions() {
        const countBtn = $(".filter-btns button.active").data("count");
        const questions = $(".question-card");

        let visible = questions;

        // LETTER FILTER
        if (activeLetter !== "all") {
            visible = questions.filter(function() {
                const word = $(this).find("h5").text().trim();
                return word.charAt(0).toUpperCase() === activeLetter;
            });
        }

        // SHOW/HIDE QUESTIONS
        questions.hide();
        visible.show();

        // NUMBER-OF-QUESTIONS LIMIT
        if (countBtn !== "all") {
            visible.slice(countBtn).hide();
            visible = visible.slice(0, countBtn);
        }

        // ENABLE SUBMIT & INPUTS
        $(".submit-btn").prop("disabled", false);
        visible.find("input[type=radio]").prop("disabled", false);

        // CLEAR PREVIOUS SELECTIONS & FEEDBACK
        visible.find("input[type=radio]").prop("checked", false);
        visible.find(".option-box").removeClass("correct wrong");
        visible.find(".feedback").text("").removeClass("correct wrong");
    }

    // NUMBER OF QUESTIONS FILTER CLICK
    $(".filter-btns button").click(function () {
        $(".filter-btns button").removeClass("active");
        $(this).addClass("active");
        filterQuestions();
    });

    // LETTER FILTER CLICK
    $(".letter-filter button").click(function () {
        const letter = $(this).data("letter");

        if ($(this).hasClass("active")) {
            // Toggle off → reset to 'all'
            activeLetter = "all";
            $(".letter-filter button").removeClass("active");
            $(".letter-filter button[data-letter='all']").addClass("active");
        } else {
            activeLetter = letter;
            $(".letter-filter button").removeClass("active");
            $(this).addClass("active");
        }

        filterQuestions();
    });


    // SUBMIT
    $(".submit-btn").click(function () {

        let score = 0;
        let total = $(".question-card:visible").length;

        $(".question-card:visible").each(function() {
            let correct = $(this).data("correct");
            let selected = $(this).find("input:checked");
            let feedback = $(this).find(".feedback");

            feedback.removeClass("correct wrong");
            $(this).find(".option-box").removeClass("correct wrong");

            $(this).find("input").each(function() {
                if ($(this).val() === correct) {
                    $(this).next().addClass("correct");
                }
            });

            if (!selected.length) {
                feedback.addClass("wrong").text("⚠ No answer selected");
                return;
            }

            if (selected.val() === correct) {
                score++;
                feedback.addClass("correct").text("✔ Correct");
            } else {
                selected.next().addClass("wrong");
                feedback.addClass("wrong").text("✘ Wrong");
            }
        });

        let percent = Math.round((score / total) * 100);
        let title, text, icon;

        if (percent >= 80) {
            title = "🏆 Excellent!";
            text = "Best performance! Amazing work.";
            icon = "success";
        } else if (percent >= 70) {
            title = "👍 Good Job!";
            text = "Well done! Keep going.";
            icon = "success";
        } else if (percent >= 60) {
            title = "🙂 Medium";
            text = "You can improve with practice.";
            icon = "info";
        } else {
            title = "💪 Keep It Up!";
            text = "Not bad. Practice more!";
            icon = "warning";
        }

        Swal.fire({
            title: title,
            html: `<b>Score:</b> ${score}/${total}<br><b>Percentage:</b> ${percent}%`,
            icon: icon,
            confirmButtonColor: "#0d6efd"
        });

        $("input[type=radio]").prop("disabled", true);
        $(this).prop("disabled", true);

    });

});
</script>

@endsection
