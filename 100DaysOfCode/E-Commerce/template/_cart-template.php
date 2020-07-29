<!-- Shopping Site Section -->
<section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h5>Shopping Cart <i class="fas fa-shopping-cart"></i></h5>

            <!-- Shooping Cart Items -->
            <div class="row">
                <div class="col-sm-9">
                    <!-- Cart Item -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="./assets/images/pad5.PNG" height="120px" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5>Item Name</h5>
                            <small>by Owner</small>
                            <!-- Product Rating -->
                            <div class="d-flex">
                                <div class="rating text-warning">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="" class="px-2">21,000 ratings</a>
                            </div>
                            <!-- End Of Product Rating -->
                            <!-- Product Qty -->
                            <div class="qty d-flex pt-2">
                                <div class="d-flex">
                                    <button data-id="product1" class="qty-up border bg-light p-1"><i class="fas fa-angle-up"></i></button>
                                    <input data-id="product1" type="text" name="" class="qty_input border px-2 bg-light w-100" disabled value="1" placeholder="1">
                                    <button data-id="product1" class="qty-down border bg-light p-1"><i class="fas fa-angle-down"></i></button>
                                </div>
                                <button type="submit" class="btn text-danger px-3 border-right">Delete</button>
                                <button type="submit" class="btn text-danger">Save for later</button>
                            </div>
                            <!-- End Of Product Qty -->
                        </div>
                        <div class="col-sm-2 text-right">
                            <div class="text-danger">
                                $ <span class="product_price">152</span>
                            </div>
                        </div>
                    </div>
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-2">
                            <img src="./assets/images/pad5.PNG" height="120px" alt="" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5>Item Name</h5>
                            <small>by Owner</small>
                            <!-- Product Rating -->
                            <div class="d-flex">
                                <div class="rating text-warning">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="" class="px-2">21,000 ratings</a>
                            </div>
                            <!-- End Of Product Rating -->
                            <!-- Product Qty -->
                            <div class="qty d-flex pt-2">
                                <div class="d-flex">
                                    <button data-id="product2" class="qty-up border bg-light p-1"><i class="fas fa-angle-up"></i></button>
                                    <input data-id="product2" type="text" name="" class="qty_input border px-2 bg-light w-100" disabled value="1" placeholder="1">
                                    <button data-id="product2" class="qty-down border bg-light p-1"><i class="fas fa-angle-down"></i></button>
                                </div>
                                <button type="submit" class="btn text-danger px-3 border-right">Delete</button>
                                <button type="submit" class="btn text-danger">Save for later</button>
                            </div>
                            <!-- End Of Product Qty -->
                        </div>
                        <div class="col-sm-2 text-right">
                            <div class="text-danger">
                                $ <span class="product_price">152</span>
                            </div>
                        </div>
                    </div>
                    <!-- End Of Cart Item -->
                </div>
                <div class="col-sm-3">
                    <!-- Sub total -->
                    <div class="sub-total border text-center mt-2">
                        <h6 class="text-success py-3"><i class="fas fa-check"></i>Your Order Is Eligible For Delivery</h6>
                        <div class="border-top py-4">
                            <h5>Subtotal (2 items): <span class="text-danger">$ <span class="text-danger" id="deal-price">152.00</span></span></h5>
                            <button type="submit" class="btn btn-warning mt-3">Proceed to Buy</button>
                        </div>
                    </div>
                    <!-- End Of Sub total -->
                </div>
            </div>
            <!-- End Of Shooping Cart Items -->
        </div>
    </section>
<!-- End Of Shopping Site Section -->