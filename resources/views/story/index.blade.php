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
    <div class="card border-0 shadow-sm rounded-4 mb-4 filter-card">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center g-3">

                <!-- Text -->
                <div class="col-lg-6">
                    <h6 class="mb-1 fw-semibold text-dark">
                        Filter Stories
                    </h6>
                    <small class="text-muted">
                        Choose your preferred story type
                    </small>
                </div>

                <!-- Filter -->
                <div class="col-lg-6">
                    <form action="" method="GET" class="d-flex gap-2">
                        
                        <select id="categoryFilter" class="form-select rounded px-4">
                                @foreach($categories as $cat)
                                    <option value="{{ $cat }}">
                                        {{ $cat === $category ? 'selected' : '' }}
                                        {{ ucfirst($cat) }}
                                    </option>
                                @endforeach
                        </select>

                        {{-- <button type="submit"
                                class="btn btn-dark rounded px-4 fw-semibold">
                            Filter
                        </button> --}}
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
                <!-- GRID WORD LIST -->
                <div class="card border-0 shadow-sm rounded-4 bg-gradient-words-area">
                    <div class="card-body p-4">
                        <a href="#word_list" class="text-dark" data-bs-toggle="collapse"
                                        aria-expanded="false"
                                        aria-controls="collapseOne">
                            <div class="card-header" id="headingOne">
                                <h6 class="m-0">
                                    📘 Word List
                                    <i class="mdi mdi-minus float-end accor-plus-icon"></i>
                                </h6>
                            </div>
                        </a>

                        <div id="word_list" class="collapse"
                                aria-labelledby="headingOne" data-bs-parent="#accordion">
                            <div class="card-body">
                                <div class="row g-3">
                                    @foreach($words as $story)
                                        <div class="col-1 col-md-2 col-lg-4 mb-3 d-flex">

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
        
        <div class="row g-3">
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

    // owlCarousel functionality 

    $(document).ready(function() {
        var owl = $('.owl-carousel');
              owl.owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                responsive: {
                  0: {
                    items: 1,
                    nav: false,
                  },
                  600: {
                    items: 2,
                    nav: false
                  },
                  1000: {
                    items: 3,
                    nav: false,
                    margin: 20
                  },
                  1400: {
                    items: 4,
                    nav: false,
                    margin: 20
                  }
                }
              });
              let isScrolling = false;

                owl.on('wheel DOMMouseScroll', '.owl-stage', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    if (isScrolling) return;
                    isScrolling = true;

                    let oe = e.originalEvent;
                    let delta = oe.deltaY || -oe.detail;

                    if (delta > 0) {
                        owl.trigger('next.owl.carousel');
                    } else {
                        owl.trigger('prev.owl.carousel');
                    }

                    setTimeout(() => {
                        isScrolling = false;
                    }, 100); // match carousel speed
                });


            });

    // Bangla english toogle button 
    function bindLanguageToggle() {
        document.querySelectorAll('.btn-group').forEach(group => {
            const btnEnglish = group.querySelector('#btnEnglish');
            const btnBangla  = group.querySelector('#btnBangla');
            const card = group.closest('.card');
            const en = card.querySelector('#englishStory');
            const bn = card.querySelector('#banglaStory');

            const activeLang = card.dataset.activeLang || 'en';
            if (activeLang === 'en') {
                en.classList.remove('d-none');
                bn.classList.add('d-none');
                btnEnglish.classList.add('btn-dark');
                btnBangla.classList.remove('btn-dark');
            } else {
                bn.classList.remove('d-none');
                en.classList.add('d-none');
                btnBangla.classList.add('btn-dark');
                btnEnglish.classList.remove('btn-dark');
            }

            btnEnglish.onclick = () => {
                en.classList.remove('d-none');
                bn.classList.add('d-none');
                btnEnglish.classList.add('btn-dark');
                btnBangla.classList.remove('btn-dark');
                card.dataset.activeLang = 'en';
            };

            btnBangla.onclick = () => {
                bn.classList.remove('d-none');
                en.classList.add('d-none');
                btnBangla.classList.add('btn-dark');
                btnEnglish.classList.remove('btn-dark');
                card.dataset.activeLang = 'bn';
            };
        });
    }

    // Flip cards (unchanged)
    document.querySelectorAll('.scene-card').forEach(card => {
        card.addEventListener('click', function (e) {
            if (e.target.closest('a, button')) return;
            this.classList.toggle('is-flipped');
        });
    });

    // word details collapse btn
    document.querySelectorAll('.custom-collapse-icon').forEach(btn => {
        btn.addEventListener('click', function () {
            const icon = this.querySelector('i');
            icon.classList.toggle('ri-add-line');
            icon.classList.toggle('ri-subtract-line');
        });
    });

    
    
</script>
@endsection