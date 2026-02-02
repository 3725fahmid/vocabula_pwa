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

        <div class="word-photo-card mb-3">
            <div class="img-avatar">
                <svg viewBox="0 0 100 100">
                <path 
                    d="m38.977 59.074c0 2.75-4.125 2.75-4.125 0s4.125-2.75 4.125 0"></path>
                <path d="m60.477 59.074c0 2.75-4.125 2.75-4.125 0s4.125-2.75 4.125 0"></path>
                <path d="m48.203 69.309c1.7344 0 3.1484-1.4141 3.1484-3.1484 0-0.27734-0.22266-0.5-0.5-0.5-0.27734 0-0.5 0.22266-0.5 0.5 0 1.1836-0.96484 2.1484-2.1484 2.1484s-2.1484-0.96484-2.1484-2.1484c0-0.27734-0.22266-0.5-0.5-0.5-0.27734 0-0.5 0.22266-0.5 0.5 0 1.7344 1.4141 3.1484 3.1484 3.1484z"></path>
                <path d="m35.492 24.371c0.42187-0.35156 0.48047-0.98438 0.125-1.4062-0.35156-0.42188-0.98438-0.48438-1.4062-0.125-5.1602 4.3047-16.422 17.078-9.5312 42.562 0.21484 0.79688 0.85547 1.4062 1.6641 1.582 0.15625 0.035156 0.31641 0.050781 0.47266 0.050781 0.62891 0 1.2344-0.27344 1.6445-0.76562 0.82812-0.98828 2.0039-1.5391 2.793-1.8203 0.56641 1.6055 1.4766 3.3594 2.9727 4.9414 2.2852 2.4219 5.4336 3.9453 9.3867 4.5547-3.6055 4.5-3.8047 10.219-3.8086 10.484-0.011719 0.55078 0.42187 1.0078 0.97656 1.0234h0.023438c0.53906 0 0.98437-0.42969 1-0.97266 0-0.054688 0.17187-4.8711 2.9805-8.7773 0.63281 1.2852 1.7266 2.5 3.4141 2.5 1.7109 0 2.7578-1.2695 3.3398-2.6172 2.8867 3.9258 3.0586 8.8359 3.0586 8.8906 0.015625 0.54297 0.46094 0.97266 1 0.97266h0.023438c0.55078-0.015625 0.98828-0.47266 0.97656-1.0234-0.007812-0.26953-0.20703-6.0938-3.9141-10.613 7.0781-1.3086 10.406-5.4219 11.969-8.9766 1.0508 0.98828 2.75 2.1992 4.793 2.1992 0.078126 0 0.15625 0 0.23828-0.003906 0.47266-0.023438 1.5781-0.074219 3.4219-4.4219 1.1172-2.6406 2.1406-6.0117 2.8711-9.4922 4.8281-22.945-4.7852-30.457-9.1445-32.621-12.316-6.1172-22.195-3.6055-28.312-0.42188-0.48828 0.25391-0.67969 0.85938-0.42578 1.3477s0.85938 0.67969 1.3477 0.42578c5.7031-2.9688 14.934-5.3047 26.5 0.4375 7.1875 3.5703 9 11.586 9.2539 17.684 0.49609 11.93-4.2617 23.91-5.7344 25.062h-0.015626c-1.832 0-3.4102-1.5742-4.0352-2.2852 0.28906-0.99609 0.44531-1.8672 0.52734-2.5117 0.62891 0.16797 1.2812 0.27344 1.9727 0.27344 0.55469 0 1-0.44922 1-1 0-0.55078-0.44531-1-1-1-7.3203 0-10.703-13.941-10.734-14.082-0.097656-0.40625-0.4375-0.71094-0.85156-0.76172-0.43359-0.050781-0.82031 0.16406-1.0117 0.53906-1.8984 3.7188-1.4297 6.7539-0.67969 8.668-6.2383-2.2852-8.9766-8.6914-9.0078-8.7617-0.17969-0.43359-0.62891-0.68359-1.1016-0.60156-0.46094 0.082032-0.80469 0.47266-0.82422 0.94141-0.14062 3.3359 0.67188 5.75 1.5 7.3164-8.3125-2.4297-10.105-11.457-10.184-11.875-0.097656-0.51562-0.57422-0.86328-1.0898-0.8125-0.51953 0.054687-0.90625 0.50391-0.89062 1.0234 0.41406 13.465-1.8516 17.766-3.2383 19.133-0.66406 0.65625-1.1992 0.67188-1.2383 0.67188-0.53906-0.050781-1.0156 0.31641-1.0938 0.85156-0.078125 0.54688 0.29688 1.0547 0.84375 1.1328 0.03125 0.003906 0.11328 0.015625 0.23828 0.015625 0.36719 0 1.1016-0.09375 1.9414-0.66406 0.050781 0.38672 0.125 0.81641 0.21875 1.2656-1.0273 0.35156-2.6211 1.0781-3.7812 2.4648-0.015625 0.019532-0.054687 0.066406-0.15625 0.046875-0.039062-0.007812-0.13281-0.039062-0.16406-0.15234-2.1875-8.1094-5.7148-28.309 8.8867-40.496zm12.711 51.828c-1.0039 0-1.5898-1.207-1.8672-2.0117 0.48047 0.023438 0.95703 0.050781 1.4531 0.050781 0.74219 0 1.4453-0.035156 2.1289-0.082031-0.24219 0.83594-0.76172 2.043-1.7148 2.043zm-13.148-30.664c1.9531 3.6211 5.6367 7.9102 12.305 8.6992 0.43359 0.046875 0.83984-0.18359 1.0234-0.57422 0.18359-0.39062 0.089844-0.85938-0.22656-1.1523-0.074219-0.070312-1.2734-1.2227-1.9688-3.6367 2 2.6094 5.3359 5.6836 10.305 6.5664 0.42187 0.070312 0.83594-0.125 1.0469-0.49219 0.21094-0.36719 0.16406-0.82812-0.11719-1.1484-0.023437-0.027344-1.9414-2.2969-1.2891-5.8906 1.2227 3.5508 3.7461 9.2227 7.8945 11.551-0.03125 0.55859-0.14844 1.668-0.55078 3.0156-0.085937 0.13672-0.125 0.28516-0.13672 0.44531-1.3008 3.8906-5.0039 9.3281-15.547 9.3281-5.375 0-9.4414-1.418-12.086-4.2109-3.5664-3.7656-3.332-8.8477-3.332-8.8984v-0.011719c1.5898-2.7227 2.5-7.3203 2.6797-13.59z"></path>
            </svg>
            </div>
            <div class="word-photo-card-text">
                <div class="portada">
                
                </div>
                <div class="title-total">   
                <div class="title">Ant Collector</div>
                <h2>Morgan Sweeney</h2>
            
            <div class="desc">Morgan has collected ants since they were six years old and now has many dozen ants but none in their pants.</div>
            <div class="actions">
                <button><i class="far fa-heart"></i></button>
                <button><i class="far fa-envelope"></i></button>
                <button><i class="fas fa-user-friends"></i></button>
            </div></div>
            
            </div>
            
            
            
            </div>

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
                                        <div class="col-6 col-md-4 col-lg-2 mb-3">

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