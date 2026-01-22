@extends('layouts.app')

@section('title', 'Practice Mode')

@section('admin')

<div class="page-content">

    <!-- PAGE HEADER -->
    <div class="text-center mb-5">
        <h3 class="fw-bold mb-2">Practice Mode</h3>
        <p class="text-muted mb-0">
            Choose how you want to practice today
        </p>
    </div>

    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>

    <div class="row g-4">

        <!-- DRAG & DROP QUIZ -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('quiz.meaning_builder', $id) }}"
               class="text-decoration-none">

                <div class="card mode-card h-100 rounded-4 border-0">
                    <div class="card-body p-4">

                        <div class="mode-icon bg-primary bg-opacity-10 text-primary">
                            🧩
                        </div>

                        <h5 class="fw-bold mt-3 mb-2">
                            Drag & Drop Quiz
                        </h5>

                        <p class="text-muted small mb-0">
                            Match words with meanings by dragging answers.
                        </p>

                    </div>
                </div>

            </a>
        </div>

        <!-- MULTIPLE CHOICE -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="{{ route('quiz.quiz_builder',$id) }}"
               class="text-decoration-none">

                <div class="card mode-card h-100 rounded-4 border-0">
                    <div class="card-body p-4">

                        <div class="mode-icon bg-success bg-opacity-10 text-success">
                            ✅
                        </div>

                        <h5 class="fw-bold mt-3 mb-2">
                            Multiple Choice
                        </h5>

                        <p class="text-muted small mb-0">
                            Select the correct answer from given options.
                        </p>

                    </div>
                </div>

            </a>
        </div>

        <!-- LINE BY LINE -->
        <div class="col-12 col-md-6 col-lg-4">
            <a href="#"
                class="text-decoration-none">
            

                <div class="card mode-card h-100 rounded-4 border-0">
                    <div class="card-body p-4">

                        <div class="mode-icon bg-warning bg-opacity-10 text-warning">
                            ✍️
                        </div>

                        <h5 class="fw-bold mt-3 mb-2">
                            Line to Line Quiz
                        </h5>

                        <p class="text-muted small mb-0">
                            Answer one question at a time, step by step.
                        </p>

                    </div>
                </div>

            </a>
        </div>

    </div>

</div>

@endsection


@section('scripts')
<style>
.mode-card {
    box-shadow: 0 10px 30px rgba(0,0,0,.06);
    transition: all .25s ease;
}

.mode-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 20px 45px rgba(0,0,0,.12);
}

.mode-icon {
    width: 54px;
    height: 54px;
    border-radius: 14px;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.6rem;
}
</style>
@endsection
