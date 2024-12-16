<div wire:poll>
    <!-- Quick Overview -->
    <div class="row">
        <div class="col-6 col-lg-4">
            <a class="block block-rounded block-link-shadow text-center" 
                href="{{ route('pengelola.pesanan') }}">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-primary">{{ $pendingOrders }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Transaksi Tertunda
                    </p>
                </div>
            </a>
        </div>
        <div class="col-6 col-lg-4">
            <div class="block block-rounded block-link-shadow text-center">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-dark">{{ $ordersToday }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Transaksi Hari Ini
                    </p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="block block-rounded block-link-shadow text-center">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-dark">Rp. {{ $earningToday }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Pendapatan Hari Ini
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Quick Overview -->

    <!-- Top Products and Latest Orders -->
    <div class="row">
        <div class="col-12">
            <!-- Latest Orders -->
            <div class="block block-rounded">
                <div class="block-header block-header-default">
                    <h3 class="block-title">Transaksi Terbaru</h3>
                </div>
                <div class="block-content">
                    <div class="table-responsive">
                        <table class="table table-borderless table-striped table-vcenter font-size-sm">
                            <tbody>
                                @forelse ($latestOrder as $order)
                                    <tr>
                                        <td class="font-w600 text-center" style="width: 100px;">
                                            <a href="#">{{ $order->id }}</a>
                                        </td>
                                        <td class="font-w600 text-center">
                                            <a href="#">
                                                {{ $order->pesanan->nama }}
                                            </a>
                                        </td>
                                        <td class="font-w600 text-center">
                                            <a href="#">
                                                {{ $order->created_at }}
                                            </a>
                                        </td>
                                        <td class="font-w600 text-right">
                                            Rp.{{ $order->total_harga }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4">Tidak ada pesanan</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Latest Orders -->
        </div>
    </div>
    <!-- END Top Products and Latest Orders -->
</div>
