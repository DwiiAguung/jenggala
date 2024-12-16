<div>
    <div wire:loading wire:target="openModalBox,closeModalBox">
        <div id="page-loader" style="opacity: .5" class="show"></div>
    </div>
    <div class="modal fade {{ $showModalBox ? 'show' : '' }}" id="modalCart" tabindex="-1" 
        role="dialog" aria-labelledby="modal-block-vcenter" aria-hidden="true"
        style="display: {{ $showModalBox ? 'block' : 'none' }};">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="block block-rounded block-themed block-transparent mb-0">
                    <div class="block-header bg-primary-dark">
                        <h3 class="block-title">Detail Transaksi</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" aria-label="Close"
                            wire:click.prevent="closeModalBox()">
                                <i class="fa fa-fw fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content font-size-sm">
                        {{-- @dump($cart) --}}
                        <div class="table-responsive" style="max-height: 40vh">
                            <form wire:submit.prevent="pesan" method="post">
                                <table class="table table-borderless table-hover table-vcenter">
                                    <tbody>
                                        @if(count($cart) !== 0)
                                            <tr>
                                                <td class="text-center">
                                                    <span class="text-muted">Gambar</span>
                                                </td>
                                                <td class="">
                                                    <span class="text-muted">Nama</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted">Harga</span>
                                                </td>
                                                <td class="text-center">
                                                    <span class="text-muted">Qty</span>
                                                </td>
                                            </tr>
                                            @foreach ($cart as $index => $value)
                                                <tr>
                                                    <td style="width: 60px;">
                                                        <img class="img-fluid" src="{{ !$value['model']['gambar'] ? asset('assets/img/default_katalog.png') : '' }}" alt="">
                                                    </td>
                                                    <td>
                                                        <span class="font-w600">
                                                            {{ $value['model']['nama'] }}
                                                        </span>
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
                                                        <span class="text-muted">{{ $value['qty'] }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach
                                            <tr class="bg-success-light">
                                                <td class="text-center" colspan="2">
                                                    <span class="font-w600">Total</span>
                                                </td>
                                                <td class="text-center" colspan="2">
                                                    <span class="font-w600 text-success"
                                                        wire:model="hargaFix">
                                                        {{ $hargaFix }}
                                                    </span>
                                                    @error('hargaFix') 
                                                        <small class="error text-danger">
                                                            {{ $message }}
                                                        </small> 
                                                    @enderror
                                                </td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="3">
                                                    <i>Anda Belum Memesan Apapun</i>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                                @if(count($errors->get('cart.*')))
                                    @foreach ($errors->get('cart.*') as $error )
                                        @foreach ($error as $err)
                                            <small class="error text-danger">
                                                {{ $err }}
                                            </small>
                                            <br>
                                        @endforeach
                                    @endforeach
                                @endif
                                <table class="table table-borderless table-vcenter">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%">
                                                <label for="nama">Nama</label>
                                                <small class="text-danger"><b>*</b></small>
                                            </td>
                                            <td>
                                                <input type="text" id="nama" 
                                                placeholder="Masukkan Nama Anda" class="form-control" wire:model="nama">
                                                @error('nama') 
                                                    <small class="error text-danger">
                                                        {{ $message }}
                                                    </small> 
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">
                                                <label for="no_meja">Nomor Meja</label>
                                                <small class="text-danger"><b>*</b></small>
                                            </td>
                                            <td>
                                                <input type="text" id="no_meja" class="form-control" wire:model="no_meja"
                                                    placeholder="Masukkan Nomor Meja">
                                                @error('no_meja') 
                                                    <small class="error text-danger">
                                                        {{ $message }}
                                                    </small> 
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">
                                                <label for="voucher">Voucher Diskon</label>
                                            </td>
                                            <td>
                                                @if (count($voucherDiskon) != 0)
                                                    <select class="form-control" id="voucher"
                                                        wire:change="updateTotalHarga($event.target.value)" 
                                                        wire:model="voucherDiskonSelected">
                                                        <option value="">
                                                            --Pilih Voucher--
                                                        </option>
                                                        @foreach ($voucherDiskon as $voucher)
                                                            <option value="{{ $voucher->id }}">
                                                                {{ $voucher->nama }} | Potongan Sebesar {{ $voucher->diskon }} | Minimal Pembelian {{ $voucher->minimal_pembelian_total_harga }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                @else
                                                    <label>
                                                        <i>Untuk Saat Ini Tidak Ada Voucher Diskon</i>
                                                    </label>
                                                @endif
                                                {{-- <input type="hidden" wire:model="cart"> --}}
                                                @error('hargaDiskon') 
                                                    <small class="error text-danger">
                                                        {{ $message }}.
                                                    </small> 
                                                    <br>
                                                @enderror
                                                @error('isCanUseVoucher') 
                                                    <small class="error text-danger">
                                                        {{ $message }}.
                                                    </small> 
                                                    <br>
                                                @enderror
                                                @error('isVoucherAvailable') 
                                                    <small class="error text-danger">
                                                        {{ $message }}.
                                                    </small> 
                                                    <br>
                                                @enderror
                                                 @error('voucherDiskonSelected') 
                                                    <small class="error text-danger">
                                                        {{ $message }}.
                                                    </small> 
                                                    <br>
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">
                                                <label for="nama_pembayar">Nama Pembayar</label>
                                                <small class="text-danger"><b>*</b></small>
                                            </td>
                                            <td>
                                                <input type="text" id="nama_pembayar" class="form-control" wire:model="nama_pembayar"
                                                    placeholder="Masukkan Nama Pembayar">
                                                @error('nama_pembayar') 
                                                    <small class="error text-danger">
                                                        {{ $message }}
                                                    </small> 
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">
                                                <label for="metode">Metode Pembayaran</label>
                                                <small class="text-danger"><b>*</b></small>
                                            </td>
                                            <td>
                                                <select class="form-control" id="metode" 
                                                wire:model="metode_pembayaran_selected">
                                                    <option value="">--Pilih Metode Pembayaran--</option>
                                                    @foreach ($metode_pembayaran as $metode)
                                                        <option value="{{ $metode->id }}">
                                                            {{ $metode->nama }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('metode_pembayaran_selected') 
                                                    <small class="error text-danger">
                                                        {{ $message }}
                                                    </small> 
                                                @enderror
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%">
                                                <label for="keterangan">Keterangan</label>
                                            </td>
                                            <td>
                                                <input type="text" id="keterangan" class="form-control" wire:model="keterangan"
                                                    placeholder="Dari Bank xxx">
                                                @error('keterangan') 
                                                    <small class="error text-danger">
                                                        {{ $message }}
                                                    </small> 
                                                @enderror
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                        </div>
                    </div>
                    <div class="block-content block-content-full text-right border-top">
                        <button type="button" class="btn btn-alt-primary mr-1" 
                        wire:loading.remove wire:target="pesan"
                        wire:click="closeModalBox()"
                        >
                            Tutup
                        </button>
                        <button type="submit" class="btn btn-primary"
                            wire:loading.remove wire:target="pesan">
                            Pesan
                        </button>
                        <button class="btn btn-primary" type="button" disabled
                            wire:loading wire:target="pesan">
                            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                            Loading...
                        </button>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-backdrop fade show"
         id="backdrop"
         style="display: @if($showModalBox === true)
                 block
         @else
                 none
         @endif;"></div>
</div>
