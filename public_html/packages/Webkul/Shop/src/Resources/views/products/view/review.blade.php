{!! view_render_event('bagisto.shop.products.view.review.before', ['product' => $product]) !!}
<div id="review" class="tab-pane fade">
    <!-- Reviews Start -->
    <div class="review border-default universal-padding">
        <div class="group-title">
            <h2>customer review</h2>
        </div>
        <h4 class="review-mini-title">Truemart</h4>
        <ul class="review-list">
            <!-- Single Review List Start -->
            <li>
                <span>Quality</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <label>Truemart</label>
            </li>
            <!-- Single Review List End -->
            <!-- Single Review List Start -->
            <li>
                <span>price</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <label>Review by <a href="https://themeforest.net/user/hastech">Truemart</a></label>
            </li>
            <!-- Single Review List End -->
            <!-- Single Review List Start -->
            <li>
                <span>value</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <label>Posted on 7/20/18</label>
            </li>
            <!-- Single Review List End -->
        </ul>
    </div>
    <!-- Reviews End -->
    <!-- Reviews Start -->
    <div class="review border-default universal-padding mt-30">
        <h2 class="review-title mb-30">You're reviewing: <br><span>Faded Short Sleeves T-shirt</span></h2>
        <p class="review-mini-title">your rating</p>
        <ul class="review-list">
            <!-- Single Review List Start -->
            <li>
                <span>Quality</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </li>
            <!-- Single Review List End -->
            <!-- Single Review List Start -->
            <li>
                <span>price</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </li>
            <!-- Single Review List End -->
            <!-- Single Review List Start -->
            <li>
                <span>value</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-o"></i>
            </li>
            <!-- Single Review List End -->
        </ul>
        <!-- Reviews Field Start -->
        <div class="riview-field mt-40">
            <form autocomplete="off" action="#">
                <div class="form-group">
                    <label class="req" for="sure-name">Nickname</label>
                    <input type="text" class="form-control" id="sure-name" required="required">
                </div>
                <div class="form-group">
                    <label class="req" for="subject">Summary</label>
                    <input type="text" class="form-control" id="subject" required="required">
                </div>
                <div class="form-group">
                    <label class="req" for="comments">Review</label>
                    <textarea class="form-control" rows="5" id="comments" required="required"></textarea>
                </div>
                <button type="submit" class="customer-btn">Submit Review</button>
            </form>
        </div>
        <!-- Reviews Field Start -->
    </div>
    <!-- Reviews End -->
</div>

{!! view_render_event('bagisto.shop.products.view.review.after', ['product' => $product]) !!}