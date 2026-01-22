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

    <!-- English Story -->
    <div class="card border-0 shadow-sm rounded-4 mb-4">
        <div class="card-body px-4 px-md-5 py-4">

            <div class="mb-3">
                <span class="badge bg-primary-subtle text-primary fw-semibold">
                    Story #{{ $story['story_id'] }}
                </span>
            </div>

            <h4 class="fw-bold fs-3 mb-4">
                English Version
            </h4>

            <div class="fs-5 lh-lg text-dark">
                @foreach(explode("\n\n", $story['english'] ?? '') as $paragraph)
                    <p class="mb-4">
                        {{ $paragraph }}
                    </p>
                @endforeach
            </div>

        </div>
    </div>

    <!-- Bangla Story -->
    <div class="card border-0 shadow-sm rounded-4 mb-5">
        <div class="card-body px-4 px-md-5 py-4">

            <h4 class="fw-bold fs-3 mb-4">
                বাংলা সংস্করণ
            </h4>

            <div class="fs-5 lh-lg text-muted">
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
    document.querySelectorAll('.scene-card').forEach(card => {
        card.addEventListener('click', function (e) {

            // Prevent flip when clicking button or link
            if (e.target.closest('a, button')) return;

            this.classList.toggle('is-flipped');
        });
    });
</script>
@endsection
