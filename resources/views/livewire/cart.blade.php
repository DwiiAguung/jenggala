<div>
    <div class="d-xl-none push">
        <button type="button" class="btn btn-light btn-block" data-toggle="class-toggle" data-target=".js-ecom-div-cart" data-class="d-none">
            <i class="fa fa-fw fa-shopping-cart text-muted mr-1"></i> Keranjang ({{ count($productAtCart) }})
        </button>
    </div>
    <div class="block block-rounded js-ecom-div-cart d-none d-xl-block">
        <div class="block-header block-header-default">
            <h3 class="block-title">
                <i class="fa fa-fw fa-shopping-cart text-muted mr-1"></i> Keranjang ({{ count($productAtCart) }})
            </h3>
        </div>
        <div class="block-content">
            <div class="table-responsive" style="max-height: 40vh">
                <table class="table table-borderless table-hover table-vcenter">
                    <tbody>
                        @if(count($productAtCart) !== 0)
                            <tr>
                                <td></td>
                                <td class="text-center">
                                    <span class="text-muted h5">Gambar</span>
                                </td>
                                <td class="">
                                    <span class="text-muted h5">Nama</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted h5">Harga</span>
                                </td>
                                <td class="text-center">
                                    <span class="text-muted h5">Qty</span>
                                </td>
                            </tr>
                                @foreach ($productAtCart as $index => $value)
                                    <tr>
                                        <td class="text-center">
                                            <button class="text-danger" 
                                                type="button" wire:click="deleteCheckout({{ $index }})">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </td>
                                        <td style="width: 60px;">
                                            <img class="img-fluid" src="{{ !$value['model']['gambar'] ? asset('assets/img/default_katalog.png') : '' }}" alt="">
                                        </td>
                                        <td>
                                            <a class="h5" href="be_pages_ecom_store_product.html">
                                                {{ $value['model']['nama'] }}
                                            </a>
                                            <div class="font-size-sm text-muted">
                                                {{ $value['model']['deskripsi'] }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <div class="font-w600 text-success">
                                                {{ $value['model']['harga'] }}
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <span class="text-muted h5">{{ $value['qty'] }}</span>
                                        </td>
                                    </tr>
                                @endforeach
                                <tr class="bg-success-light">
                                    <td class="text-center" colspan="3">
                                        <span class="h4 font-w600">Total</span>
                                    </td>
                                    <td class="text-center" colspan="2">
                                        <span class="h4 font-w600 text-success">
                                            {{ $totalHarga }}
                                        </span>
                                    </td>
                                </tr>
                            
                        @else
                            <tr>
                                <td colspan="4">
                                    <i>Anda Belum Menambahkan Apapun Kedalam Keranjang</i>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div class="block-content block-content-full bg-body-light text-right">
            @if(count($productAtCart) !== 0)
                <button class="btn btn-sm btn-primary m-1"
                wire:click="$emit('showModalBox', {{ json_encode([$productAtCart, $totalHarga]) }})">
                    <i class="fa fa-check mr-1"></i> Selesaikan Pemesanan
                </button>
                <button class="btn btn-sm btn-primary m-1" type="button" wire:click="deleteAllCheckout">
                    <i class="fa fa-times mr-1"></i> Hapus Semua Keranjang
                </button>
            @endif
        </div>
    </div>
</div>
