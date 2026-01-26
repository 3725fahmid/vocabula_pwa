@extends('layouts.app')

@section('title', 'Home Feed')

@section('admin')
<div class="page-content">
    <div class="container" style="max-width:880px">

        {{-- 🔍 Search --}}
        <div class="search-wrapper mb-4 position-relative">
            <i class="ri-search-line search-icon"></i>

            <input id="storySearch"
                   class="form-control form-control-lg rounded-pill ps-5 pe-5 shadow-sm"
                   placeholder="Search stories..."
                   autocomplete="off">

            <button id="clearSearch" class="btn clear-btn d-none">
                <i class="ri-close-line"></i>
            </button>

            <div id="searchResults"
                 class="list-group search-results d-none"></div>
        </div>

        {{-- 📚 Story Feed --}}
        @foreach ($storyData as $story)
            @isset($story['story_id'])
                <x-story-card :item="$story"/>
            @endisset
        @endforeach

        <div class="mt-4">
            {{ $storyData->links() }}
        </div>

    </div>
</div>
@endsection


@section('scripts')
<style>
.search-icon {
    position:absolute; left:18px; top:50%;
    transform:translateY(-50%); color:#6c757d;
}
.clear-btn {
    position:absolute; right:12px; top:50%;
    transform:translateY(-50%);
}
.search-results {
    position:absolute; width:100%; z-index:1050;
    border-radius:1rem; box-shadow:0 8px 20px rgba(0,0,0,.1);
}
.search-results .list-group-item { border:0 }
.search-results .list-group-item:hover { background:#f1f3f4 }
.avatar {
    width:38px; height:38px; border-radius:50%;
    display:flex; align-items:center; justify-content:center;
    background:linear-gradient(45deg,#6a11cb,#2575fc);
    color:#fff; font-weight:700;
}
</style>


<script>
const input   = document.getElementById('storySearch');
const results = document.getElementById('searchResults');
const clear   = document.getElementById('clearSearch');
let controller;

/* 🔎 Search handler */
input.oninput = () => {
    const q = input.value.trim();
    clear.classList.toggle('d-none', !q);

    if (q.length < 2) return hideResults();

    controller?.abort();
    controller = new AbortController();

    fetch(`/stories/search?q=${encodeURIComponent(q)}`, {
        signal: controller.signal
    })
    .then(r => r.json())
    .then(renderResults);
};

/* 🧹 Clear */
clear.onclick = () => {
    input.value = '';
    input.focus();
    hideResults();
};

/* 🖱️ Outside click */
document.onclick = e => {
    if (!e.target.closest('.search-wrapper')) hideResults();
};

/* Helpers */
function hideResults() {
    results.classList.add('d-none');
    results.innerHTML = '';
}

function renderResults(items) {
    results.innerHTML = items.length
        ? items.map(item => {
            // Get first 30 words of item.english
            const shortEnglish = item.english.split(' ').slice(0, 30).join(' ');
            // Add ellipsis if text was longer
            const displayEnglish = item.english.split(' ').length > 30 ? shortEnglish + '...' : shortEnglish;

            return `
                <a class="list-group-item"
                   href="/story/${item.story_id}">
                   <strong>${item.story_id} . ${item.title}</strong>
                   <div class="small text-muted">${displayEnglish}</div>
                </a>
            `;
        }).join('')
        : `<div class="list-group-item text-muted">No results</div>`;

    results.classList.remove('d-none');
}

</script>
@endsection
