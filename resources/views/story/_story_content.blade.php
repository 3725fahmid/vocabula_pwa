<div class="card border-0 shadow-sm rounded-4 mb-4 p-4" id="story_{{ $story['story_id'] }}">

    <!-- Story Title -->
    <h3 class="fw-bold mb-3">{{ $story['title'] ?? 'Untitled Story' }}</h3>

    <!-- Language Toggle -->
    <div class="mb-3">
        <button id="btnEnglish" class="btn btn-dark btn-sm me-2">English</button>
        <button id="btnBangla" class="btn btn-secondary btn-sm">Bangla</button>
    </div>

    <!-- English Story -->
    <div id="englishStory" class="">
        <p>{{ $story['english'] ?? 'No English version available.' }}</p>
    </div>

    <!-- Bangla Story -->
    <div id="banglaStory" class="d-none">
        <p>{{ $story['bangla'] ?? 'No Bangla version available.' }}</p>
    </div>

</div>
