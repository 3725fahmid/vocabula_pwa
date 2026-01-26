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