<div v-for="(attr, index) in product.config.attributes" 
    v-if="attr.code == 'size'"
    class="product-size mb-20 clearfix">
    <label>@{{ attr.label }}</label>
    <select v-if="attr.code == 'size'">
        <option v-for="(size, key) in attr.options">
            
        </option>
    </select>

</div>

<div v-for="(attr, index) in product.config.attributes" 
    v-if="attr.code == 'color'"
    class="color mb-20 clearfix">
    <label>@{{ attr.label }}</label>
    <ul v-if="attr.code == 'color'" class="color-list" v-if="attr.code == 'color'">
        <li v-for="(color, key) in attr.options">
            <a :class="[(key == 0) ? 'active' : '']" 
                href="#">
                @{{color.label}}
            </a>
        </li>
    </ul>   
</div>
