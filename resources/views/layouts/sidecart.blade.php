@if(Session::has('webcart'))
<div class="sideslider" id="sideslider" >
    <div class="sideslider-tab">

        <div style="text-align:center;">
            @if(Session::has('webcart'))
            <?php $totcart=Webzera\Laracart\Cart::totalCart(); ?>
            <span class="badge badge-danger">{{$totcart}} </span>
            <span class="badge badge-danger"><?php if($totcart) { ?>{{ Session::get('webcart')->totalQty }}<?php } ?></span>
        @endif
        </div>
        <div style="text-align:center;">Rs. {{ number_format($totcart=Webzera\Laracart\Cart::gettotalPrice()),2,'.','' }}</div>    
    </div>
    <div href="#">
        <div id="sideslider-smartbutton">
            <div id="sideslider-text">
                <span class="header">Cart List</span>
                <span class="line"><p>Morbi ultrices ante vel enim dignissim, id malesuada augue bibendum. In viverra consectetur mauris, eu malesuada ante scelerisque at. Praesent tincidunt mi at neque aliquam aliquam. Donec nunc orci, molestie eget dui in, hendrerit egestas mi. Quisque ornare diam sed sollicitudin pretium. Proin eu nunc tempor, venenatis sapien eget, rhoncus sapien. In imperdiet risus pharetra nisi pellentesque interdum. Quisque vitae arcu lacus. Nunc tincidunt a lorem a tristique. Nullam a augue commodo felis placerat fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p></span>
                <a href="{{ route('cart::index') }}" class="line">View Cart</a>
            </div>
            <div class="sideclear"></div>
        </div>
    </div>
    <div class="sideslider-close sideslider-close_en"></div>
</div>
@endif