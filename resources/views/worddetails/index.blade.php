@extends('layouts.app')

@section('title')
   Word- {{ $word_details['word'] }}
@endsection

@section('admin')


<div class="page-content">
    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>
    <div class="word-wrapper">
        <div class="container">

            <!-- TOP SECTION -->
            <div class="row g-4 mb-4">

                <!-- WORD INFO -->
                <div class="col-lg-4 col-md-5">
                    <div class="card word-card h-100">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <div>
                                    <span class="badge bg-warning text-dark mb-2">Word</span>
                                    <h1 class="fw-bold display-6 mb-1">
                                        {{ $word_details['word'] }}
                                    </h1>
                                    <small class="text-muted">Easy spelling</small>
                                    <div class="fw-semibold">
                                        {{ $word_details['easy_spelling'] }}
                                    </div>
                                </div>

                                <button class="btn btn-light">
                                    <i class="ri-volume-up-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- DEFINITION + EXAMPLE -->
                <div class="col-lg-8 col-md-7">
                    <div class="card word-card mb-3">
                        <div class="card-body rounded-4">
                            <h5 class="fw-semibold mb-2">Definition</h5>
                            {{ $word_details['wordmeaning'] }}
                        </div>
                    </div>

                    <div class="card word-card">
                        <div class="card-body rounded-4">
                            <h5 class="fw-semibold mb-2">Example</h5>
                            {{ $word_details['example'] }}
                        </div>
                    </div>
                </div>

            </div>

            <!-- SYNONYMS & ANTONYMS -->
            <div class="row g-4 mb-4">

                <div class="col-lg-6">
                    <div class="card word-card h-100">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Synonyms</h5>
                            @foreach(explode(',', $word_details['synonyms']) as $syn)
                                <span class="badge rounded-pill bg-info bg-opacity-10 text-info border border-info px-3 py-2 fw-bold" 
                                        style="font-size: 1rem; letter-spacing: 0.5px;">
                                    {{ trim($syn) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="card word-card h-100">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-3">Antonyms</h5>
                            @foreach(explode(',', $word_details['antonyms']) as $ant)
                                <span class="badge rounded-pill bg-warning bg-opacity-10 text-dark border border-warning px-3 py-2 fw-bold" 
                                        style="font-size: 1rem; letter-spacing: 0.5px;">
                                    {{ trim($ant) }}
                                </span>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

            <!-- TACTIC -->
            <div class="row">
                <div class="col-12">
                    <div class="card word-card">
                        <div class="card-body">
                            <h5 class="fw-semibold mb-2">Tactic / Memory Tip</h5>
                            {{ $word_details['tactic'] }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>




    {{-- id" => "11"
  "story_id" => "3"
  "word" => "Honest"
  "easy_spelling" => "On-est"
  "wordmeaning" => "Telling the truth"
  "synonyms" => "Truthful, Sincere"
  "antonyms" => "Dishonest"
  "tactic" => "Always tell truth"
  "example" => "He is an honest man. --}}
</div>
<!-- End Page-content -->


@endsection


<style>



</style>



@section('scripts')

<script>
// var card = document.querySelectorAll('.scene-card');
// card.addEventListener( 'click', function() {
//   card.classList.toggle('is-flipped');
// });

document.querySelectorAll('.scene-card').forEach(card => {
    card.addEventListener('click', function () {
        this.classList.toggle('is-flipped');
    });
});
</script>


@endsection
