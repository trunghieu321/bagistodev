{!! view_render_event('bagisto.shop.products.view.choose-option.before', ['product' => $product]) !!}
@if($product['type'] == "configurable")
<div id="available_options">
    <h5>Available Options</h5>
    <div class="form-group">
        <div v-for="(attr, index) in config.attributes"
            v-if="attr.code == 'size'"
            class="product-size mt-10 clearfix">
            <label>
                <span style="color: red">*</span>
                @{{ attr.label }}
            </label>
            <select v-if="attr.code == 'size'">
                <option v-for="(size, key) in attr.options"></option>
            </select>

        </div>

        <div v-for="(attr, index) in config.attributes"
            v-if="attr.code == 'color'"
            class="color mt-10 clearfix">
            <label>
                <span style="color: red">*</span>
                @{{ attr.label }}
            </label>
            <ul v-if="attr.code == 'color'" class="color-list" v-if="attr.code == 'color'">
                <li v-for="(color, key) in attr.options">
                    <a v-on:click="changeOptionProduct" :style="'background-color:' + color.label"
                        :attr-id-product="[color.products]">
                    </a>
                </li>
            </ul>   
        </div>
    </div>
</div>

{!! view_render_event('bagisto.shop.products.view.choose-option.after', ['product' => $product]) !!}
@endif