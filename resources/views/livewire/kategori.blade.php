<div class="d-flex justify-content-center">
    <button type="button" class="btn btn-outline-secondary btn-sm mr-1 mb-3"
        wire:click="$emitUp('filterKategori', '')">
            <i class="fa fa-1x fa-filter mr-1"></i>
            Semua
        </button>
    @foreach ($kategoriAll as $kategori)
        <button type="button" class="btn btn-outline-secondary btn-sm mr-1 mb-3"
        wire:click="$emitUp('filterKategori', {{ $kategori->id }})">
            <i class="{{ $kategori->icon }} mr-1"></i>
            {{ $kategori->nama }}
        </button>
    @endforeach
</div>
