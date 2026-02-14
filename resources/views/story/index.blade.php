@extends('layouts.app')

@section('title', 'Story')

@section('cssLinks')
<link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/owl.carousel.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/libs/owlcarousel/owl.theme.default.min.css') }}">
@endsection

@section('admin')

<div class="page-content">

    <!-- Top Navigation -->
    <a href="{{ route('home') }}" class="btn btn-dark fw-semibold text-decoration-none mb-2">
        ← Back to Home
    </a>
    <div class="card bg-transparent border-2 shadow-md rounded-4 mb-4 filter-card">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center g-3">

                <!-- Text -->
                <div class="col-lg-6">
                    <h6 class="mb-1 fw-semibold">
                        Filter Stories
                    </h6>
                    <small class="text-muted">
                        Choose your preferred story type
                    </small>
                </div>

                <!-- Filter -->
                <div class="col-lg-6">
                    <form method="GET">
                        <div class="input-group shadow-sm rounded-4 overflow-hidden">
                            <span class="input-group-text bg-info border-0 px-3">
                                <i class="fas fa-filter text-white"></i>
                            </span>

                            <select 
                                id="categoryFilter"
                                class="form-select border-0 px-4"
                            >
                                @foreach($categories as $cat)
                                    <option 
                                        value="{{ $cat }}"
                                        {{ $cat === $category ? 'selected' : '' }}
                                    >
                                        {{ ucfirst($cat) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </form>
                </div>



            </div>
        </div>
    </div>


    <div id="storyContent">
       @include('story._story_content', [
            'story' => $story,
            'language' => $language
        ])
    </div>

    <!-- Story Card With Language Toggle -->
        {{-- <div class="card border-0 shadow-sm rounded-4 mb-5">
            <div class="card-body px-4 px-md-5 py-4">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="text-dark fw-bold">
                        {{ $story['story_id'] }}: {{ $story['title'] }}
                    </span>

                    <!-- Toggle Buttons -->
                    <div class="btn-group btn-group-md" role="group">
                        <button class="btn btn-dark" id="btnEnglish">
                            English
                        </button>
                        <button class="btn btn-outline-dark" id="btnBangla">
                            বাংলা
                        </button>
                    </div>
                </div>

                <!-- ENGLISH VERSION -->
                <div id="englishStory" class="story-content fs-5 lh-lg text-dark">
                    @foreach(explode("\n\n", $story['english'] ?? '') as $paragraph)
                        <p class="mb-4">
                            {{ $paragraph }}
                        </p>
                    @endforeach
                </div>

                <!-- BANGLA VERSION -->
                <div id="banglaStory" class="story-content fs-5 lh-lg text-muted d-none">
                    @foreach(explode("\n\n", $story['bangla'] ?? '') as $paragraph)
                        <p class="mb-4">
                            {{ $paragraph }}
                        </p>
                    @endforeach
                </div>

            </div>
        </div> --}}

        

        <!-- Vocabulary list Section -->
        <div class="row g-3">
            <div class="col-12">
                <!-- MODERN WORD LIST -->
                <div class="card border-0 shadow-sm rounded-4 bg-gradient-words-area">

                    <!-- Header -->
                    <div class="card-header bg-transparent border-0 p-3">
                        <button class="btn w-100 custom-collapse-icon text-start fw-bold fs-4 d-flex justify-content-between align-items-center"
                                data-bs-toggle="collapse"
                                data-bs-target="#word_list"
                                aria-expanded="false"
                                aria-controls="word_list">

                            <span>Word List</span>
                            <i class="ri ri-add-line d-block"></i>
                        </button>
                    </div>

                    <!-- Collapse Content -->
                    <div id="word_list" class="collapse">
                        <div class="card-body pt-0">

                            <!-- Bootstrap scroll container -->
                            <div class="overflow-auto pe-2" style="max-height: 420px;">
                                <div class="row g-3">
                                    @foreach($words as $story)
                                        <div class="col-12 col-md-6 col-lg-4 mb-3 d-flex">
                                            <x-vucabulary-card :item="$story"/>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <!-- Vocabulary carousel Section -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-4 bg-gradient-owl-carousel">
                    <div class="card-body px-4 py-4">
        
                        <h5 class="fw-bold mb-4">
                            Vocabulary from this story
                        </h5>
                        <div class="owl-carousel owl-theme">
                            @foreach($words as $item)
                            <div class="item">
                                <!-- YOUR FLIP CARD (UNCHANGED) -->
                                <div class="scene scene--card">
                                    <div class="scene-card"
                                            data-bs-toggle="tooltip"
                                            data-bs-placement="top"
                                            title="Click card to flip">
    
                                        <div class="card__face card__face--front">
                                            {{ $item['word'] }}
                                        </div>
    
                                        <div class="card__face card__face--back">
                                            {{ $item['wordmeaning'] }}
                                        </div>
    
                                    </div>
                                </div>
                                {{-- <div class="accordion" id="accordionExample">
                                    <div class="accordion-item">
                                        <h2 class="accordion-header">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panel{{ $item['id'] }}" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                            See more
                                        </button>
                                        </h2>
                                        <div id="panel{{ $item['id'] }}" class="accordion-collapse collapse">
                                        <div class="accordion-body">
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="fw-semibold mb-3">Synonyms</h5>
                                                    @foreach(explode(',', $item['synonyms']) as $syn)
                                                        <span class="badge rounded-pill bg-info bg-opacity-10 text-info border border-info px-3 py-2 mb-1 fw-bold" 
                                                                style="font-size: 1rem; letter-spacing: 0.5px;">
                                                            {{ trim($syn) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="fw-semibold mb-3">Antonyms</h5>
                                                    @foreach(explode(',', $item['antonyms']) as $syn)
                                                        <span class="badge rounded-pill bg-info bg-opacity-10 text-info border border-info px-3 py-2 mb-1 fw-bold" 
                                                                style="font-size: 1rem; letter-spacing: 0.5px;">
                                                            {{ trim($syn) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
    
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="fw-semibold mb-2">Tactic / Memory Tip</h5>
                                                    {{ $item['tactic'] }}
                                                </div>
                                            </div>
    
                                            <div class="card">
                                                <div class="card-body rounded-4">
                                                    <h5 class="fw-semibold mb-2">Example</h5>
                                                    {{ $item['example'] }}
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div> --}}
    
                                <p class="w-100">
                                    <a class="btn btn-dark custom-collapse-icon w-100 d-flex justify-content-between" data-bs-toggle="collapse" href="#collapse{{ $item['id'] }}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                        <span class="d-block">See more</span>
                                        <i class="ri ri-add-line d-block"></i>
                                    </a>
                                </p>
                                <div class="collapse" id="collapse{{ $item['id'] }}">
                                    <div class="card">
                                                <div class="card-body">
                                                    <h5 class="fw-semibold mb-3">Synonyms</h5>
                                                    @foreach(explode(',', $item['synonyms']) as $syn)
                                                        <span class="badge rounded-pill bg-info bg-opacity-10 text-info border border-info px-3 py-2 mb-1 fw-bold" 
                                                                style="font-size: 1rem; letter-spacing: 0.5px;">
                                                            {{ trim($syn) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="fw-semibold mb-3">Antonyms</h5>
                                                    @foreach(explode(',', $item['antonyms']) as $syn)
                                                        <span class="badge rounded-pill bg-info bg-opacity-10 text-info border border-info px-3 py-2 mb-1 fw-bold" 
                                                                style="font-size: 1rem; letter-spacing: 0.5px;">
                                                            {{ trim($syn) }}
                                                        </span>
                                                    @endforeach
                                                </div>
                                            </div>
    
                                            <div class="card">
                                                <div class="card-body">
                                                    <h5 class="fw-semibold mb-2">Tactic / Memory Tip</h5>
                                                    {{ $item['tactic'] }}
                                                </div>
                                            </div>
    
                                            <div class="card">
                                                <div class="card-body rounded-4">
                                                    <h5 class="fw-semibold mb-2">Example</h5>
                                                    {{ $item['example'] }}
                                                </div>
                                            </div>
                                </div>
    
    
    
                            </div> 
                            @endforeach                   
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quiz test  -->
            <div class="col-12">
                    <a href="{{ route('quiz.show', $story['story_id']) }}"
                        class="text-decoration-none w-100">
                    
                        <button class="btn btn-lg w-100 btn-dark">Start Quiz</button>

                    </a>
                </div>
        </div>
        



        {{-- "id" => "6"
      "story_id" => "2"
      "word" => "Wisdom"
      "easy_spelling" => "Wiz-dum"
      "wordmeaning" => "Ability to make good decisions"
      "synonyms" => "Knowledge, Insight"
      "antonyms" => "Ignorance"
      "tactic" => "Think of elders"
      "example" => "Wisdom comes with age." --}}

    <!-- Vocabulary Section -->
    {{-- <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body px-4 py-4">

            <h5 class="fw-bold mb-4">
                Vocabulary from this story
            </h5>

            <div class="row g-3">

                @foreach($words as $item)
                    <div class="col-12 col-md-6 col-lg-4 col-xxl-3">

                        <!-- YOUR FLIP CARD (UNCHANGED) -->
                        <div class="scene scene--card">
                            <div class="scene-card"
                                    data-bs-toggle="tooltip"
                                    data-bs-placement="top"
                                    title="Click card to flip">

                                <div class="card__face card__face--front">
                                    {{ $item['word'] }}
                                </div>

                                <div class="card__face card__face--back">
                                    {{ $item['wordmeaning'] }}
                                </div>

                            </div>
                        </div>

                        <a href="{{ Route('story.worddata', $item['id']) }}"
                            class="btn btn-sm btn-outline-primary w-100 mt-2">
                            Details about {{ $item['word'] }}
                        </a>

                    </div>
                @endforeach

            </div>

        </div>
    </div> --}}

</div>

@endsection


@section('scripts')


<script src="{{ asset('assets/libs/owlcarousel/jquery.min.js') }}"></script>
<script src="{{ asset('assets/libs/owlcarousel/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/libs/html2canvas/html2canvas.min.js') }}"></script>


<script>
/* ===============================
   WORD DICTIONARY (FROM LARAVEL)
================================ */
const wordDictionary = @json(
    collect($words)->mapWithKeys(function ($item) {
        return [strtolower($item['word']) => $item['wordmeaning']];
    })
);

/* ===============================
   APPLY WORD HIGHLIGHTING
   (Reusable for AJAX)
================================ */
function applyWordHighlighting() {
    const paragraphs = document.querySelectorAll('.selectable-text');
    const wordsInDB = Object.keys(wordDictionary);

    paragraphs.forEach(p => {

        // Prevent double-highlighting
        if (p.dataset.highlighted === 'true') return;

        let html = p.innerHTML;

        wordsInDB.forEach(word => {
            const regex = new RegExp(`\\b(${word})\\b`, 'gi');

            html = html.replace(regex, match => {
                return `<span class="highlight-word" data-word="${match.toLowerCase()}">${match}</span>`;
            });
        });

        p.innerHTML = html;
        p.dataset.highlighted = 'true';
    });
}

/* ===============================
   INITIAL LOAD
================================ */
document.addEventListener('DOMContentLoaded', function () {
    bindLanguageToggle();
    applyWordHighlighting();
});

/* ===============================
   WORD CLICK POPUP
   (Event Delegation – AJAX Safe)
================================ */
document.addEventListener('click', function (e) {

    if (!e.target.classList.contains('highlight-word')) return;

    const word = e.target.dataset.word;
    const meaning = wordDictionary[word];
    if (!meaning) return;

    const popup = document.getElementById('wordPopup');
    const rect = e.target.getBoundingClientRect();

    document.getElementById('popupWord').innerText = word;
    document.getElementById('popupMeaning').innerText = meaning;

    const top = window.scrollY + rect.top - popup.offsetHeight - 10;
    const left = window.scrollX + rect.left + (rect.width / 2);

    popup.style.top = `${top}px`;
    popup.style.left = `${left}px`;
    popup.style.transform = 'translateX(-50%)';

    popup.classList.remove('d-none');
});

/* ===============================
   CLOSE POPUP ON OUTSIDE CLICK
================================ */
document.addEventListener('click', function (e) {
    const popup = document.getElementById('wordPopup');

    if (
        popup.classList.contains('d-none') ||
        e.target.classList.contains('highlight-word')
    ) return;

    popup.classList.add('d-none');
});

/* ===============================
   OPTIONAL TOAST VERSION
================================ */
function showWordMeaning(word, meaning) {
    document.getElementById('toastWord').innerText = word;
    document.getElementById('toastMeaning').innerText = meaning;

    const toast = new bootstrap.Toast(
        document.getElementById('wordToast'),
        { delay: 4000 }
    );

    toast.show();
}

/* ===============================
   CATEGORY FILTER (AJAX)
================================ */
document.getElementById('categoryFilter').addEventListener('change', function () {

    const lang = document.getElementById('btnBangla')
        .classList.contains('btn-dark') ? 'bn' : 'en';

    const url = `{{ url()->current() }}?category=${this.value}&lang=${lang}`;

    fetch(url, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        document.getElementById('storyContent').innerHTML = html;

        bindLanguageToggle();
        applyWordHighlighting(); // 🔥 REQUIRED AFTER AJAX
    });
});
</script>


<script>

   

    

    
    
</script>
@endsection