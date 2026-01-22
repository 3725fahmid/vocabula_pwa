@extends('layouts.app')

@section('title', 'Quiz')

@section('admin')

<div class="page-content">
    <div class="container">

    <!-- Back Button -->
    <a href="javascript:history.back()" class="btn btn-dark fw-semibold text-decoration-none mb-2">
        ← Back
    </a>

    <div class="row">

        {{-- OPTIONS CARD --}}
        <div class="col-12 col-lg-6 h-100 mb-3">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-white fw-bold">
                    Choose correct Options
                </div>
                <div class="card-body">
                    <div class="row g-2 options-area">

                        @foreach($words as $opt)
                            <div class="col-12 col-sm-6">
                                <div class="option-card drag-item" data-id="{{ $opt['id'] }}">
                                    {{ $opt['wordmeaning'] }}
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

        {{-- QUESTIONS CARD --}}
        <div class="col-12 col-lg-6 mb-3">
            <div class="card shadow-sm rounded-4">
                <div class="card-header bg-white fw-bold">
                    Questions
                </div>
                <div class="card-body">

                    @foreach($words as $i => $item)
                        <div class="question-card mb-3">
                            <div class="fw-semibold mb-1">
                                {{ $i + 1 }}. {{ $item['word'] }}
                            </div>
                            <div class="answer-box border border-secondary rounded p-2" 
                                 data-id="{{ $item['id'] }}" 
                                 data-index="{{ $i }}">
                                Drop answer here
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>

        {{-- ACTION BUTTONS --}}
        <div class="col-12 d-flex gap-2 mt-3">
            <button class="btn btn-primary px-4 check-answer w-100">Submit</button>
            <button class="btn btn-outline-secondary px-4 reset-btn d-none">Reset</button>
        </div>

        <div class="col-12 score-card mt-3 fw-bold"></div>

    </div>
    </div>
</div>

@endsection

@section('scripts')

{{-- jQuery --}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

{{-- jQuery UI --}}
<script src="https://code.jquery.com/ui/1.13.3/jquery-ui.min.js"></script>
<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.3/themes/base/jquery-ui.css">

{{-- Touch support --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui-touch-punch/0.2.3/jquery.ui.touch-punch.min.js"></script>

{{-- Inline Styles --}}
<style>
.answer-box {
    min-height: 60px;
    border: 2px dashed #dee2e6;
    border-radius: 12px;
    padding: 10px;
    display: flex;
    align-items: center;
    color: #6c757d;
    transition: all .3s ease;
}

.option-card {
    background: #ffffff;
    border-radius: 12px;
    padding: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,.08);
    cursor: grab;
    text-align: center;
}

.answer-box.correct {
    background: #d4edda;
    border-color: #28a745;
    color: #155724;
}

.answer-box.wrong {
    background: #f8d7da;
    border-color: #dc3545;
    color: #721c24;
}

.correct-answer-text {
    font-size: .85rem;
    margin-top: 6px;
    color: #198754;
    font-weight: 500;
}
</style>

{{-- Drag & Drop + ID-based Check --}}
<script>

function shuffleOptions() {
    const $optionsContainer = $(".options-area");
    const $options = $optionsContainer.children(".col-12");
    for (let i = $options.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        $optionsContainer.append($options.eq(j));
    }
}

$(document).ready(function () {
    shuffleOptions();   // Shuffle on page load
});



$(function () {

    // Pass word pairs with IDs to JS
    const wordPairs = [
        @foreach($words as $item)
            {
                id: {{ $item['id'] }},
                word: "{{ addslashes($item['word']) }}",
                meaning: "{{ addslashes($item['wordmeaning']) }}"
            }@if(!$loop->last),@endif
        @endforeach
    ];

    // Enable draggable & droppable
    function enableDragDrop() {
        $(".drag-item").draggable({
            revert: "invalid",
            cursor: "move",
            helper: "clone"
        });

        $(".answer-box").droppable({
            accept: ".drag-item",
            tolerance: "pointer",
            drop: function (event, ui) {
                const $item = ui.draggable;      // original dragged element
                $(this).empty().append($item);   // move it to answer box
                $item.css({ position: "relative", top: "auto", left: "auto" });
            }
        });
    }

    enableDragDrop();

    // Check answers
    $(".check-answer").on("click", function () {
        let score = 0;

        $(".answer-box").each(function () {
            const userId = $(this).find(".drag-item").data("id"); // dragged word ID
            const correctId = $(this).data("id");                 // question ID

            $(this).removeClass("correct wrong")
                   .find(".correct-answer-text").remove();

            if (userId == correctId) {
                score++;
                $(this).addClass("correct");
            } else {
                // show correct answer text
                const correct = wordPairs.find(w => w.id == correctId);
                $(this).addClass("wrong")
                       .append(`<div class="correct-answer-text">✔ Correct Answer: ${correct.meaning}</div>`);
            }
        });

        $(".score-card").text(`Score: ${score} / ${wordPairs.length}`);
        $(".check-answer").addClass("d-none");
        $(".reset-btn").removeClass("d-none");
    });

    // Reset
    $(".reset-btn").on("click", function () {
        $(".answer-box").each(function() {
            const $item = $(this).find(".drag-item");
            if ($item.length) {
                $(".options-area").append($item); // move back to options
            }
            $(this).empty().removeClass("correct wrong")
                .find(".correct-answer-text").remove();
        });

        shuffleOptions(); // reshuffle options on reset
        $(".check-answer").removeClass("d-none");
        $(this).addClass("d-none");
    });



});
</script>

@endsection
