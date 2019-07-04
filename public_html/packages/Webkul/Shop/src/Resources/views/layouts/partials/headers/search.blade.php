<div class="categorie-search-box">
    <form role="search" action="{{ route('shop.search.index') }}" method="GET">
        <div class="form-group">
            <select class="bootstrap-select" name="poscats">
                @if(!empty($categories))
                    <option value="0">All categories</option>
                    @foreach($categories as $keyCate => $valCate)
                        @if($valCate->parent_id == 1)
                            <option value="{{$valCate['id']}}">{{$valCate['name']}}</option>
                        @endif
                    @endforeach
                @endif
            </select>
        </div>
        <input type="text" name="term" placeholder="{{ __('shop::app.headers.search') }}">
        <button><i class="lnr lnr-magnifier"></i></button>
    </form>
</div>
