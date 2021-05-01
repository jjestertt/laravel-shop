@extends('layout.main')

@section('title', $category->title)

@section('custom_css')
    <link rel="stylesheet" type="text/css" href="/styles/categories.css">
    <link rel="stylesheet" type="text/css" href="/styles/categories_responsive.css">
@endsection

@section('content')
    <div class="home">
        <div class="home_container">
            <div class="home_background" style="background-image:url('/images/{{$category->img}}')"></div>
            <div class="home_content_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_content">
                                <div class="home_title">{{$category->title}}<span>.</span></div>
                                <div class="home_text"><p>{{$category->description}}</p></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">

                    <!-- Product Sorting -->
                    <div
                        class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{$category->products->count()}}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
                                <ul class="item_sorting">
                                    <li>
                                        <span class="sorting_text">Sort by</span>
                                        <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                        <ul>
                                            <li class="product_sorting_btn" data-order='default'><span>Default</span>
                                            </li>
                                            <li class="product_sorting_btn" data-order='price-low-high'><span>Price Low-High</span>
                                            </li>
                                            <li class="product_sorting_btn" data-order='price-high-low'><span>Price High-Low</span>
                                            </li>
                                            <li class="product_sorting_btn" data-order='name-a-z'><span>Name A-Z</span>
                                            </li>
                                            <li class="product_sorting_btn" data-order='name-z-a'><span>Name Z-A</span>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">

                    <div class="product_grid">

                    @foreach($products as $product)

                        @php
                            $image = 'no_image.jpeg';
                            if(count($product->images) > 0){
                                $image = $product->images[0]['img'];
                            };
                        @endphp

                        <!-- Product -->
                            <div class="product">
                                <div class="product_image">
                                    <a href="{{route('showProduct', ['category', $product->id])}}">
                                        <img src="images/{{$image}}" alt="">
                                    </a>
                                </div>
                                <div class="product_extra product_new">

                                    <a href="{{route('showCategory', $product->categories['alias'])}}">
                                        {{$product->categories['title']}}
                                    </a>
                                </div>
                                <div class="product_content">
                                    <div class="product_title">
                                        <a href="{{route('showProduct', ['category', $product->id])}}">
                                            {{$product->title}}
                                        </a>
                                    </div>

                                    @if($product->new_price)
                                        <div class="product_price old_price">${{$product['price']}}</div>
                                        <div class="product_price new_price">${{$product['new_price']}}</div>
                                    @else
                                        <div class="product_price">${{$product['price']}}</div>
                                    @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                    <div class="product_pagination">
                        <ul>
                            <li class="active"><a href="#">01.</a></li>
                            <li><a href="#">02.</a></li>
                            <li><a href="#">03.</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Icon Boxes -->

    <div class="icon_boxes">
        <div class="container">
            <div class="row icon_box_row">

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                        <div class="icon_box_title">Free Shipping Worldwide</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                        <div class="icon_box_title">Free Returns</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                nec molestie.</p>
                        </div>
                    </div>
                </div>

                <!-- Icon Box -->
                <div class="col-lg-4 icon_box_col">
                    <div class="icon_box">
                        <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                        <div class="icon_box_title">24h Fast Support</div>
                        <div class="icon_box_text">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                nec molestie.</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- Newsletter -->

    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_border"></div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <div class="newsletter_content text-center">
                        <div class="newsletter_title">Subscribe to our newsletter</div>
                        <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                                a ultricies metus. Sed nec molestie eros</p></div>
                        <div class="newsletter_form_container">
                            <form action="#" id="newsletter_form" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required">
                                <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('custom_js')
    {{--    скрипт обеспечивает ленивую загрузку изображений--}}
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    {{--скрипт отвечает за сортировку и правильное отображение сетки--}}
    <script>
        const productSortingBtn = document.querySelectorAll('.product_sorting_btn');
        const productGrid = document.querySelector('.product_grid');
        const sortingText = document.querySelector('.sorting_text');

        const sortBy = async (btn, ) => {
            const response = await fetch("{{route('showCategory', $category->alias)}}", {
                method: 'POST',
                headers: {
                    //Обязательные заголовки!!!!
                    "Content-Type": "application/json",
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                //Обязательно указывать метод который преобразует обьект в строку!!!
                body: JSON.stringify({
                    orderBy: btn.dataset.order,
                }),
            });
            //С сервера к нам приходит разметка
            const view = await response.text();
            //Рендерим ее без перезагрузки
            productGrid.innerHTML = view;
            //И меняем текст в инпуте сортировки
            sortingText.innerText = btn.innerText


            //И поменяем адрессную строку
            const positionParamertr = location.pathname.indexOf('?');
            const url = location.pathname.substring(positionParamertr, location.pathname.length);
            let newUrl = url + '?orderBy=' + btn.dataset.order;
            window.history.pushState({}, '', newUrl);

            // сброс настроек сетки чтобы ничего не ломалось
            let iso = new Isotope(productGrid, 'destroy');
            //С помощью плагина ждем пока загрузятся все изображения, и строи сетку
            imagesLoaded(productGrid, function (instance) {
                iso = new Isotope(productGrid, {
                        itemSelector: '.product',
                        layoutMode: 'fitRows',
                        fitRows:
                            {
                                gutter: 30
                            },
                    }
                );
            });
        }
        //отлавливаем клик по кнопке
        productSortingBtn.forEach(btn => {
            btn.addEventListener('click', () => {
                sortBy(btn)
            });
        });


    </script>

@endsection
