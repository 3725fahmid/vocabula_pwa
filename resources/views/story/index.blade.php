@extends('layouts.app')

@section('title', 'Story')

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
                    <span class="badge bg-primary-subtle text-primary fw-semibold">
                        Story #{{ $story['story_id'] }}
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

    <!-- Vocabulary Section -->
    <div class="card border-0 shadow-sm rounded-4">
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
    </div>

</div>

@endsection


@section('scripts')
<script>
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
</script>
@endsection
