@extends('layouts.app')

@section('title', 'Quiz')

@section('admin')

<div class="page-content">

    <!-- HEADER -->
    {{-- <div class="text-center mb-5">
        <h3 class="fw-bold mb-1 text-dark">
            Quiz For Stories
        </h3>
        <p class="text-muted mb-0">
            Choose a story and start Quiz
        </p>
    </div> --}}

    <a href="javascript:history.back()" class="btn btn-dark mb-3">
        ← Back
    </a>


    <div class="my-5">
        <h3 class="fw-bold mb-1 text-dark">
            Quiz For All Stories
        </h3>
        <p class="text-muted mb-0">
            Start Quiz for All over Vocabulary.
        </p>
    </div>

        <div class="row">
            <div class="col-12">
                <div class="card mode-card h-100 rounded-4 border-0 cursor-pointer btn" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">
                    <div class="card-body p-4">

                        <h5 class="fw-bold mt-3 mb-2">
                            Quiz test
                        </h5>

                        <p class="mb-1 text-warning">
                            This Test is for all over the vocabulary that you learned until now. If you complete you all learning you can try this, Before you try this you should finish Quiz for single stories. 
                        </p>

                        <p class="text-muted small mb-0">
                            Answer one question at a time, step by step.
                        </p>

                    </div>
                </div>
             {{-- <div class="my-4 text-center">
                <!-- Small modal -->
                <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal" data-bs-target=".bs-example-modal-center">Center modal</button>
            </div> --}}

            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Quiz Test</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-12 col-lg-6">
                                    <a href="{{ route('mcq') }}"
                                        class="text-decoration-none">
                                        <div class="card mode-card h-100 rounded-4 border-0">
                                            <div class="card-body p-4">

                                                <div class="mode-icon bg-warning bg-opacity-10 text-warning">
                                                    ✍️
                                                </div>

                                                <h5 class="fw-bold mt-3 mb-2">
                                                    Quiz test
                                                </h5>

                                                <p class="mb-1 text-warning">
                                                    This Test is for all over the vocabulary that you learned until now. If you complete you all learning you can try this, Before you try this you should finish Quiz for single stories. 
                                                </p>

                                                <p class="text-muted small mb-0">
                                                    Answer one question at a time, step by step.
                                                </p>

                                            </div>
                                        </div>

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

                {{-- <a href="{{ route('mcq') }}"
                    class="text-decoration-none">
                

                    <div class="card mode-card h-100 rounded-4 border-0">
                        <div class="card-body p-4">

                            <div class="mode-icon bg-warning bg-opacity-10 text-warning">
                                ✍️
                            </div>

                            <h5 class="fw-bold mt-3 mb-2">
                                Quiz test
                            </h5>

                            <p class="mb-1 text-warning">
                                This Test is for all over the vocabulary that you learned until now. If you complete you all learning you can try this, Before you try this you should finish Quiz for single stories. 
                            </p>

                            <p class="text-muted small mb-0">
                                Answer one question at a time, step by step.
                            </p>

                        </div>
                    </div>

                </a> --}}
            </div>
        </div>

    <div class="my-5">
        <h3 class="fw-bold mb-1 text-dark">
            Quiz For Single Stories
        </h3>
        <p class="text-muted mb-0">
            Choose a story and start Quiz
        </p>
    </div>

        <div class="row g-4">
    
            @foreach ($storyData as $item)
                @if(isset($item['story_id']))

                <div class="col-12 col-md-6 col-lg-4">
                    <a href="{{ route('quiz.show', $item['story_id']) }}"
                        class="text-decoration-none">
                    

                        <div class="card mode-card h-100 rounded-4 border-0">
                            <div class="card-body p-4">

                                <div class="mode-icon bg-warning bg-opacity-10 text-warning">
                                    ✍️  
                                </div>

                                <h5 class="fw-bold mt-3 mb-2">
                                     Quiz for story {{ $item['story_id'] }}
                                </h5>

                                <span class="bg-light bg-opacity-4 rounded-3 p-2 font-lg my-2 d-inline-block text-dark">
                                    {{ Str::limit($item['english'] ?? '',100) }}
                                </span>

                                <p class="text-muted small mb-0">
                                    Improve vocabulary and comprehension
                                </p>

                            </div>
                        </div>

                    </a>
                </div>
    
                {{-- <div class="col-12 col-sm-6 col-md-4 col-xl-3">
    
                    <a href="{{ route('quiz.show', $item['story_id']) }}"
                       class="text-decoration-none">
    
                        <div class="card h-100 border-3 rounded-4 edu-card">
    
                            <div class="card-body p-4 d-flex flex-column">
    
                                <!-- TOP BADGE -->
                                <div class="d-flex justify-content-between align-items-center mb-3">
                                    <span class="edu-badge">
                                        Story {{ $item['story_id'] }}
                                    </span>
    
                                    <span class="edu-dot"></span>
                                </div>
    
                                <!-- TITLE -->
                                <h6 class="fw-bold text-dark mb-1">
                                    Reading Practice
                                </h6>
    
                                <!-- SUBTEXT -->
                                <p class="text-muted small mb-0">
                                    Improve vocabulary and comprehension
                                </p>
    
                                <!-- FOOTER -->
                                <div class="mt-auto pt-4">
                                    <span class="edu-link">
                                        Start Learning →
                                    </span>
                                </div>
    
                            </div>
    
                        </div>
    
                    </a>
    
                </div> --}}
    
                @endif
            @endforeach
    
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