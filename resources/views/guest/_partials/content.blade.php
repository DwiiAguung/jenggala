<div class="row push">
    <div id="page-loader" style="opacity: .5" class="show"></div>
    <div class="col-xl-4 order-xl-1">
        <!-- Shopping Cart -->
        @livewire('cart')
        <!-- END Shopping Cart -->
    </div>
    <div class="col-xl-8 order-xl-0">
        @livewire('product');
    </div>
    @livewire('checkout')
</div>