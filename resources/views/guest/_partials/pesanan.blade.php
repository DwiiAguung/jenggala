<div class="row justify-content-center">
    <div class="col-md-8">
        <form action="be_pages_ecom_store_checkout.html" method="POST" onsubmit="return false;">
            <!-- Shopping Cart -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Pesanan</h3>
                </div>
                <div class="block-content block-content-full">
                    @if(count($pesanan) !== 0)
                        @php
                            $index = 1;
                        @endphp
                        @foreach ($pesanan as $pesanan)
                            <div class="block block-rounded block-themed" id="pesanan{{ $pesanan->id }}">
                                <div class="block-header bg-info">
                                    <h3 class="block-title">Pesanan {{ $index }}</h3>
                                    <div class="block-options">
                                        <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle">
                                            <i class="si si-size-fullscreen"></i>
                                        </button>

                                        <button type="button" class="btn-block-option" 
                                        data-toggle="block-option" 
                                        data-action="content_toggle"
                                        {{-- onload="@if(!$loop->first)
                                                One.block('content_hide', '#pesanan{{ $pesanan->id }}');
                                            @endif" --}}
                                        >
                                            <i class="si si-arrow-up"></i>
                                        </button>
                                    </div>
                                </div>
                                <div class="block-content">
                                    <div class="table-responsive" id="table-pesanan">
                                        <table class="table table-borderless table-hover table-vcenter">
                                            <tbody>
                                                <tr>
                                                    <td class="text-center">
                                                        <span class="text-muted h5">Gambar</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="text-muted h5">Nama</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="text-muted h5">
                                                            Status
                                                        </span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="text-muted h5">Harga</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="text-muted h5">Qty</span>
                                                    </td>
                                                    <td class="text-center">
                                                        <span class="text-muted h5">
                                                            Jumlah Harga
                                                        </span>
                                                    </td>
                                                </tr>
                                                @foreach ($pesanan->katalog as $katalog)
                                                    <tr>
                                                        <td style="width: 60px;">
                                                            <img class="img-fluid" src="{{ !$katalog->gambar ? asset('assets/img/default_katalog.png') : '' }}" alt="">
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="text-muted h5">
                                                                {{ $katalog->nama }}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            @if (
                                                                $katalog->pivot->status_pesanan->status == 'Pesanan Tertunda'
                                                            )
                                                                <span class="badge badge-info">
                                                                    {{ 
                                                                        $katalog->pivot->status_pesanan->status 
                                                                    }}
                                                                </span>
                                                            @elseif (
                                                                $katalog->pivot->status_pesanan->status == 'Pesanan Sedang Proses'
                                                            )
                                                                <span class="badge badge-warning">
                                                                    {{ 
                                                                        $katalog->pivot->status_pesanan->status 
                                                                    }}
                                                                </span>
                                                            @elseif (
                                                                $katalog->pivot->status_pesanan->status == 'Pesanan Selesai'
                                                            )
                                                                <span class="badge badge-success">
                                                                    {{ 
                                                                        $katalog->pivot->status_pesanan->status 
                                                                    }}
                                                                </span>
                                                            @endif
                                                        </td>
                                                        <td class="text-center">
                                                            <div class="font-w600 text-success">
                                                                {{ $katalog->harga }}
                                                            </div>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="text-muted h5">
                                                                {{ $katalog->pivot->qty }}
                                                            </span>
                                                        </td>
                                                        <td class="text-center">
                                                            <span class="text-muted h5">
                                                                {{ $katalog->jumlah_harga() }}
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr class="bg-success-light">
                                                    <td class="text-center" colspan="4">
                                                        <span class="h5 font-w600">
                                                            Total Harga Pesanan
                                                        </span>
                                                    </td>
                                                    <td class="text-center" colspan="3">
                                                        <span class="h5 font-w600 text-success">
                                                            {{ $pesanan->katalog->sum('jumlahHarga') }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-success-light">
                                                    <td class="text-center" colspan="4">
                                                        <span class="h5 font-w600">
                                                            Voucher Diskon
                                                        </span>
                                                    </td>
                                                    <td class="text-center" colspan="3">
                                                        <span class="h5 font-w600 text-success">
                                                            {{ @$pesanan->tagihan->diskon->diskon }}
                                                        </span>
                                                    </td>
                                                </tr>
                                                <tr class="bg-success-light">
                                                    <td class="text-center" colspan="4">
                                                        <span class="h5 font-w600">
                                                            Dibayar
                                                        </span>
                                                    </td>
                                                    <td class="text-center" colspan="3">
                                                        <span class="h5 font-w600 text-success">
                                                            {{ @$pesanan->tagihan->total_harga }}
                                                        </span>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            @php
                                $index++
                            @endphp
                        @endforeach
                    @else
                        <h4 class="text-center">
                            <i>Tidak ada pesanan</i>
                        </h4>
                    @endif
                </div>
            </div>
            <!-- END Shopping Cart -->
        </form>
    </div>
</div>