<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__text">
                    <h4>Shopping Cart</h4>
                    <div class="breadcrumb__links">
                        <a href="/home">Home</a>
                        <a href="/shop">Shop</a>
                        <span>Shopping Cart</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Shopping Cart Section Begin -->
<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="shopping__cart__table">
                    <table>
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Sale Off</th>
                                <th>Total</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td class="product__cart__item">
                                    <div class="product__cart__item__pic">
                                        <img style="width: 90px" src="{{ showProductImage($product->img_url)}}" alt="">
                                    </div>
                                    <div class="product__cart__item__text">
                                        <h6>{{ $product->product_name }}</h6>
                                        <h5>$<span class="price">{{ $product->price }}</span></h5>
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="quantity">
                                        <!-- <div class="pro-qty-2"> -->
                                            <!-- <input class="product-quantity" type="text"
                                            data-product_id="{{ $product->id }}" 
                                            value="{{ $productData[$product->id] }}"> -->
                                            <input type="number" name="quantity"
                                                class="product-quantity quantity form-control input-number"
                                                value="{{ $productData[$product->id] }}"
                                                min="1"
                                                max="100"
                                                data-product_id="{{ $product->id }}"
                                            >
                                        <!-- </div> -->
                                    </div>
                                </td>
                                <td class="quantity__item">
                                    <div class="sale_off">
                                        <span class="sale-off">
                                            {{ $product->sale_off }}
                                        </span>%
                                    </div>
                                </td>
                                <td class="quantity__item">$
                                    <span class="total"> 
                                        {{ $product->price * $productData[$product->id] * ((100 - $product->sale_off) / 100) }}
                                    </span>
                                </td>
                                <td class="cart__close">
                                    <i data-product_id="{{ $product->id }}" class="fa fa-close"></i>
                                </td>
                            </tr>
                            @endforeach 
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn">
                            <a href="#">Continue Shopping</a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="continue__btn update__btn">
                            <a class="update-cart"  href="{{ route('showcart') }}"><i class="fa fa-spinner"></i> Update cart</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="cart__discount">
                    <h6>Discount codes</h6>
                    <form action="#">
                        <input type="text" placeholder="Coupon code">
                        <button type="submit">Apply</button>
                    </form>
                </div>
                <div class="cart__total">
                    <h6>Cart total</h6>
                    <ul>
                        <li>Subtotal <span>$ {{$subtotal}}</span></li>
                        <li>Delivery <span>$ {{$delivery}}</span></li>
                        <li>Discount <span>$ {{$discount}}</span></li>
                        <li>Total <span>$ {{$total}}</span></li>
                    </ul>
                    <a href="{{ route('order.checkout') }}" class="primary-btn checkout">Proceed to checkout</a>
                </div>
            </div>
        </div>
    </div>

</section>
<!-- Shopping Cart Section End -->