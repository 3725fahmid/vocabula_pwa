<div class="glass-card h-100 p-3 text-center export-card">

    <h6 class="fw-bold mb-2 text-dark">
        {{ $item['word'] }}
    </h6>

    <p class="small mb-0 text-dark-50">
        {{ $item['wordmeaning'] }}
    </p>

    <button
        class="btn btn-sm btn-outline-primary jpg-btn mt-2"
        onclick="downloadSingleCard(this)">
        ⬇ Download
    </button>

</div>