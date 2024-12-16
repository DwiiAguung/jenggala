<div wire:poll>
    <!-- Quick Overview -->
    <div class="row">
        <div class="col-6 col-lg-4">
            <div class="block block-rounded block-link-shadow text-center">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-primary">
                        {{ $pesananTertunda }}
                    </div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Tertunda
                    </p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="block block-rounded block-link-shadow text-center">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-primary">{{ $pesananProses }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Sedang Proses
                    </p>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4">
            <div class="block block-rounded block-link-shadow text-center">
                <div class="block-content block-content-full">
                    <div class="font-size-h2 text-primary">{{ $pesananBerhasil }}</div>
                </div>
                <div class="block-content py-2 bg-body-light">
                    <p class="font-w600 font-size-sm text-muted mb-0">
                        Selesai
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- END Quick Overview -->

    <!-- All Orders -->
    <div class="block block-rounded">
        <div class="block-header block-header-default">
            <h3 class="block-title">Semua Pesanan</h3>
        </div>
        <div class="block-content">
            <!-- Search Form -->
            <div class="form-group">
                <div class="input-group">
                    <input type="text" class="form-control form-control-alt"
                        placeholder="Cari Pesanan.." wire:model="search">
                    <div class="input-group-append">
                        <span class="input-group-text bg-body border-0">
                            <i class="fa fa-search"></i>
                        </span>
                    </div>
                </div>
            </div>
            <!-- END Search Form -->

            <!-- All Orders Table -->
            <div class="table-responsive">
                <table class="table table-borderless table-striped table-vcenter">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 100px;">ID</th>
                            <th>Waktu Pemesanan</th>
                            <th>Status</th>
                            <th>Pelanggan</th>
                            <th>No Meja</th>
                            <th class="text-center">Products</th>
                            <th class="text-right">Qty</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($pesanan as $pesanann)
                            <tr>
                                <td class="text-center font-size-sm">
                                    <strong>{{ $pesanann->id }}</strong>
                                </td>
                                <td class="text-center font-size-sm">
                                    <strong>{{ $pesanann->created_at }}</strong>
                                </td>
                                <td>
                                    @if($pesanann->status_pesanan_id === 2)
                                        <span class="badge badge-success">
                                            {{ $pesanann->status_pesanan->status }}
                                        </span>
                                    @elseif ($pesanann->status_pesanan_id === 1)
                                        <span class="badge badge-info">
                                            {{ $pesanann->status_pesanan->status }}
                                        </span>
                                    @else
                                        <span class="badge badge-warning">
                                            {{ $pesanann->status_pesanan->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="font-size-sm">
                                    {{-- Arahkan ke route transaksi berdasarkan id pesanan --}}
                                    <a class="font-w600" href="#">
                                        {{ $pesanann->pesanan->nama }}
                                    </a>
                                </td>
                                <td>
                                    <strong>
                                        {{ $pesanann->pesanan->no_meja }}
                                    </strong>
                                </td>
                                <td class="text-center font-size-sm">
                                    {{-- Arahkan ke route product --}}
                                    <a class="font-w600" href="#">
                                        {{ $pesanann->katalog->nama }}
                                    </a>
                                </td>
                                <td class="text-right font-size-sm">
                                    <strong>
                                        {{ $pesanann->qty }}
                                    </strong>
                                </td>
                                <td class="text-center">
                                    @if($pesanann->status_pesanan_id === 1)
                                        <button class="btn btn-sm btn-alt-secondary"
                                            data-toggle="tooltip" title="Proses"
                                            wire:click="setPesananProses({{ $pesanann->id }})"
                                        >
                                            <i class="fa fa-hourglass-half"></i>
                                        </button>
                                        <button class="btn btn-sm btn-alt-info" 
                                            data-toggle="tooltip" title="Selesai"
                                            wire:click="setPesananBerhasil({{ $pesanann->id }})"
                                        >
                                            <i class="fa fa-check-square"></i>
                                        </button>
                                    @elseif($pesanann->status_pesanan_id === 2)
                                        <button class="btn btn-sm btn-alt-info" 
                                            data-toggle="tooltip" title="Selesai"
                                            wire:click="setPesananBerhasil({{ $pesanann->id }})"
                                        >
                                            <i class="fa fa-check-square"></i>
                                        </button>
                                    @elseif($pesanann->status_pesanan_id === 3)
                                        <span class="badge badge-secondary">
                                            <i>Tidak ada aksi</i>
                                        </span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <i>Tidak ada pesanan</i>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                {{ $pesanan->links() }}
            </div>
            <!-- END All Orders Table -->
        </div>
    </div>
    <!-- END All Orders -->
</div>
