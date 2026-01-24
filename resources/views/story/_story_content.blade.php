<div class="card border-0 shadow-sm rounded-4 mb-5" 
            data-active-lang="{{ $language ?? 'en' }}">
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
        </div>