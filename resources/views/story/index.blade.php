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
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body py-2">
        </div>
    </div>

    <!-- Story Card With Language Toggle -->
        <div class="card border-0 shadow-sm rounded-4 mb-5">
            <div class="card-body px-4 px-md-5 py-4">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <span class="text-dark fw-bold">
                        {{ $story['story_id'] }}: {{ $story['title'] }}
                    </span>

                    <!-- Toggle Buttons -->
                    <div class="btn-group btn-group-md" role="group">
                        <button class="btn btn-primary" id="btnEnglish">
                            English
                        </button>
                        <button class="btn btn-outline-primary" id="btnBangla">
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
        </div>

        <div class="card border-0 shadow-sm rounded-4">
            <div class="card-body px-4 py-4">

                <h5 class="fw-bold mb-4">
                    Vocabulary from this story
                </h5>

                <div class="row g-3">
                    <div class="col-12">
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


<script>

    $(document).ready(function() {
              $('.owl-carousel').owlCarousel({
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
              })
            })


    const btnEnglish = document.getElementById('btnEnglish');
    const btnBangla  = document.getElementById('btnBangla');

    const englishStory = document.getElementById('englishStory');
    const banglaStory  = document.getElementById('banglaStory');

    btnEnglish.addEventListener('click', () => {
        englishStory.classList.remove('d-none');
        banglaStory.classList.add('d-none');

        btnEnglish.classList.add('btn-primary');
        btnEnglish.classList.remove('btn-outline-primary');

        btnBangla.classList.add('btn-outline-primary');
        btnBangla.classList.remove('btn-primary');
    });

    btnBangla.addEventListener('click', () => {
        banglaStory.classList.remove('d-none');
        englishStory.classList.add('d-none');

        btnBangla.classList.add('btn-primary');
        btnBangla.classList.remove('btn-outline-primary');

        btnEnglish.classList.add('btn-outline-primary');
        btnEnglish.classList.remove('btn-primary');
    });

    // Flip cards (unchanged)
    document.querySelectorAll('.scene-card').forEach(card => {
        card.addEventListener('click', function (e) {
            if (e.target.closest('a, button')) return;
            this.classList.toggle('is-flipped');
        });
    });

    document.querySelectorAll('.custom-collapse-icon').forEach(btn => {
        btn.addEventListener('click', function () {
            const icon = this.querySelector('i');
            icon.classList.toggle('ri-add-line');
            icon.classList.toggle('ri-subtract-line');
        });
    });
    
</script>
@endsection