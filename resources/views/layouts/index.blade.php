@extends('layouts.app')

@section('title', 'Home Feed')

@section('admin')
<div class="page-content">
    
    
    <div class="container" style="max-width: 880px;">
        <div class="position-relative mb-4">
            <input type="text"
                id="storySearch"
                class="form-control form-control-lg rounded-pill ps-5 shadow-sm"
                placeholder="Search stories..."
                autocomplete="off">
    
            <i class="ri-search-line position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
    
            <div id="searchResults"
                class="list-group position-absolute w-100 mt-2 shadow d-none"
                style="z-index: 1000; max-height: 300px; overflow-y: auto;">
            </div>
        </div>
        
        @foreach ($storyData as $item)
            @if(isset($item['story_id']))
            <div class="card border rounded-3 shadow mb-3">
                
                <div class="card-header border pt-3 px-3 d-flex align-items-center">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center text-white fw-bold" style="width: 40px; height: 40px; background: linear-gradient(45deg, #6a11cb 0%, #2575fc 100%);">
                        {{ $item['story_id'] }}
                    </div>
                    <div class="ms-2">
                        <h6 class="mb-0 fw-bold text-dark">{{ $item['title'] }}</h6>
                        {{-- <small class="text-muted">Classic • <i class="bi bi-globe-americas"></i></small> --}}
                    </div>
                </div>

                <div class="card-body px-3 pt-2">
                    <p class="card-text text-dark fw-bold mb-2" style="font-size: 1.1rem; line-height: 1.5;">
                        {{ Str::limit($item['english'] ?? '', 200) }}
                        @if(strlen($item['english']) > 200)
                            <a href="{{ Route('story.show',$item['story_id'])}}" class="text-secondary fw-bold text-decoration-none">...See More</a>
                        @endif
                    </p>

                    <p class="card-text text-muted">
                        {{ Str::limit($item['bangla'] ?? '', 100) }}
                    </p>

                    <div class="d-flex">
                        <a href="{{ Route('story.show',$item['story_id'])}}" class="btn btn-primary flex-grow-1 border-0 fw-bold py-2">
                            <i class="ri-eye-line me-2"></i>View Story
                        </a>
                        <button class="btn btn-light flex-grow-1 border-0 fw-bold text-secondary bg-transparent py-2">
                            <i class="ri-share-forward-line me-2"></i>Share
                        </button>
                    </div>
                </div>

            </div>
            @endif
        @endforeach

    </div>
        <div class="mt-4">
            {{ $storyData->links() }}
        </div>
</div>
@endsection

@section('scripts')
<script>
const searchInput = document.getElementById('storySearch');
const resultsBox = document.getElementById('searchResults');

let controller = null;

searchInput.addEventListener('input', function () {
    const query = this.value.trim();

    if (query.length < 2) {
        resultsBox.classList.add('d-none');
        resultsBox.innerHTML = '';
        return;
    }

    // cancel previous request
    if (controller) controller.abort();
    controller = new AbortController();

    fetch(`/stories/search?q=${encodeURIComponent(query)}`, {
        signal: controller.signal
    })
    .then(res => res.json())
    .then(data => {
        resultsBox.innerHTML = '';

        if (!data.length) {
            resultsBox.innerHTML = `
                <div class="list-group-item text-muted">
                    No stories found
                </div>`;
        } else {
            data.forEach(item => {
                resultsBox.innerHTML += `
                    <a href="/story/${item.story_id}"
                       class="list-group-item list-group-item-action">
                        <strong>${item.title}</strong><br>
                        <small class="text-muted">Story #${item.story_id}</small>
                    </a>`;
            });
        }

        resultsBox.classList.remove('d-none');
    });
});

// Hide results when clicking outside
document.addEventListener('click', e => {
    if (!e.target.closest('#storySearch')) {
        resultsBox.classList.add('d-none');
    }
});
</script>


@endsection