@extends('layouts.app')

@section('title', 'Home Feed')

@section('admin')
<div class="page-content d-flex align-items-center justify-content-center">
    <div class="" style="max-width:880px">

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
        <div id="storyFeed">
            @foreach ($storyData as $story)
                @isset($story['story_id'])
                    <x-story-card :item="$story"/>
                @endisset
            @endforeach
        </div>

        {{-- Pagination (hidden but used for infinite scroll) --}}
        <div id="paginationLinks" class="d-none">
            {{ $storyData->links() }}
        </div>

        {{-- Loader --}}
        <div id="scrollLoader" class="text-center my-4 d-none">
            <div class="spinner-border"></div>
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
/* ================= SEARCH ================= */
const input   = document.getElementById('storySearch');
const results = document.getElementById('searchResults');
const clear   = document.getElementById('clearSearch');
let controller;

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

clear.onclick = () => {
    input.value = '';
    input.focus();
    hideResults();
};

document.onclick = e => {
    if (!e.target.closest('.search-wrapper')) hideResults();
};

function hideResults() {
    results.classList.add('d-none');
    results.innerHTML = '';
}

function renderResults(items) {
    results.innerHTML = items.length
        ? items.map(item => {
            const shortEnglish = item.english.split(' ').slice(0, 30).join(' ');
            const displayEnglish = item.english.split(' ').length > 30
                ? shortEnglish + '...'
                : shortEnglish;

            return `
                <a class="list-group-item"
                   href="/story/${item.story_id}">
                   <strong>${item.story_id}. ${item.title}</strong>
                   <div class="small text-muted">${displayEnglish}</div>
                </a>
            `;
        }).join('')
        : `<div class="list-group-item text-muted">No results</div>`;

    results.classList.remove('d-none');
}

/* ================= INFINITE SCROLL ================= */
let page = 1;
let loading = false;
let lastPage = {{ $storyData->lastPage() }};

window.addEventListener('scroll', () => {
    if (loading || page >= lastPage) return;

    if (window.innerHeight + window.scrollY >= document.body.offsetHeight - 200) {
        loadMoreStories();
    }
});

function loadMoreStories() {
    loading = true;
    page++;

    document.getElementById('scrollLoader').classList.remove('d-none');

    fetch(`?page=${page}`, {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(res => res.text())
    .then(html => {
        const temp = document.createElement('div');
        temp.innerHTML = html;

        const newStories = temp.querySelectorAll('#storyFeed > *');

        newStories.forEach(story => {
            document.getElementById('storyFeed').appendChild(story);
        });
    })
    .finally(() => {
        loading = false;
        document.getElementById('scrollLoader').classList.add('d-none');
    });
}
</script>
@endsection
