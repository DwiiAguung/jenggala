<div>
    @if (session()->has('pesananAdded'))
        <div class="alert alert-success alert-dismissable" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <p class="mb-0">{{ session('pesananAdded') }}</p>
        </div>
    @endif
    <div id="page-loader" style="opacity: .5" class="show" wire:loading></div>
    @livewire('kategori')
    <div class="row row-deck">
        @foreach ($listProduk as $produk)
            <div class="col-md-6 col-xl-4">
                <div class="block block-rounded">
                    <div class="options-container">
                        <img class="img-fluid options-item" 
                            src="{{ 
                                !$produk->gambar ? 
                                asset('assets/img/2.png') : 
                                asset('storage/produk/' . $produk->gambar)
                            }}" 
                            alt=""
                        >
                        <div class="options-overlay bg-black-75">
                            <div class="options-overlay-content">
                                <a class="btn btn-sm btn-light" href="#">
                                    Detail
                                </a>
                                @if(!$produk->stok == 0)
                                    <button class="btn btn-sm btn-light" 
                                        type="button" wire:click="addToCart({{ $produk->id }})"
                                    >
                                        <i class="fa fa-plus text-success mr-1"></i> Add to cart
                                    </button>
                                @endif
                                <div class="text-warning mt-3">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-alt"></i>
                                    <span class="text-white">(35)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="block-content">
                        <div class="mb-2">
                            <div class="h4 font-w600 text-success float-right ml-1">
                                Rp. {{ $produk->harga }}
                            </div>
                            <a class="h4" href="be_pages_ecom_store_product.html">
                                {{ $produk->nama }}
                            </a>
                        </div>
                    <p class="font-size-sm text-muted">
                        @if($produk->stok == 0)
                            <i class="text-danger">Stok Habis</i>
                        @else
                            <i>Tersisa {{ $produk->stok }} stok</i>
                        @endif
                    </p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
