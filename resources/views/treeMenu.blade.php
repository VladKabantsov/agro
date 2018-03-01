<div class="col-xs-2">
    <div class="content">
    <ul class="menu nav">
        @foreach($categories as $category)
            <li class="nav-item li-item btn">{{ $category->cat_name }}
                <ul class="subcategories nav" id="list">
                    @foreach($subCategories as $subCategory)
                        @if($subCategory->category_id==$category->id)
                            <li class="nav-item li-item btn" >{{ $subCategory->subcategories_name }}
                                <ul class="products-name nav">
                                    @foreach($listOfGoods as $good)
                                        @if($good->subcategories_name==$subCategory->subcategories_name)
                                            <li class="nav-item li-item">
                                                <a href="#" class="btn">{{ $good->g_name }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
    </div>
</div>