@extends('client.layouts.app')

@section('content')
    <section class="flat-title-page inner">
        <div class="overlay"></div>
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading mg-bt-12">
                        <h1 class="heading text-center">Danh mục</h1>
                    </div>
                    <div class="breadcrumbs style2">
                        <ul>
                            <li><a href="index-2.html">Trang chủ</a></li>
                            <li><a href="#">Danh mục</a></li>
                            {{-- <li>Explore 2</li> --}}
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="tf-section sc-explore-2">
        <div class="themesflat-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="seclect-box style3">
                        <div id="artworks" class="dropdown">
                            <a href="#" class="btn-selector nolink">All Artworks</a>
                            <ul>
                                <li><span>Abstraction</span></li>
                                <li class="active"><span>Skecthify</span></li>
                                <li><span>Patternlicious</span></li>
                                <li><span>Virtuland</span></li>
                                <li><span>Papercut</span></li>
                            </ul>
                        </div>
                        <div id="sort-by" class="dropdown style-2">
                            <a href="#" class="btn-selector nolink">Sort by</a>
                            <ul>
                                <li><span>Top rate</span></li>
                                <li class="active"><span>Mid rate</span></li>
                                <li><span>Low rate</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="flat-tabs explore-tab">
                        <ul class="menu-tab">
                            <li class="item-title active">
                                <span class="inner">All</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Art</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Music</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Collectibles</span>
                            </li>
                            <li class="item-title">
                                <span class="inner">Sports</span>
                            </li>
                        </ul>
                        <div class="content-tab mg-t-40">
                            <div class="content-inner">
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-3.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates Yorick's
                                                SalvadorDali"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-4.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-2.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-2.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like"> 100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-7.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Crypto Egg Stamp #5"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-3.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item8.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates
                                                Yorick's...</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-12.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-9.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/image-box-6.jpg" alt="Image"></a>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/image-box-11.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Crypto Egg Stamp #5</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-3.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                            </div>

                            <div class="content-inner">
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-4.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-2.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-2.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item8.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates
                                                Yorick's...</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-12.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-9.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/image-box-6.jpg" alt="Image"></a>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/image-box-11.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Crypto Egg Stamp #5</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-3.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                            </div>

                            <div class="content-inner">
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-3.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates Yorick's
                                                SalvadorDali"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-7.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Crypto Egg Stamp #5"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-3.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item8.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates
                                                Yorick's...</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-12.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-9.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                            </div>

                            <div class="content-inner">
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-4.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-2.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-2.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="activity1.html" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-7.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Crypto Egg Stamp #5"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-3.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item8.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates
                                                Yorick's...</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-12.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-9.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/image-box-6.jpg" alt="Image"></a>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="content-inner">
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-3.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Hamlet Contemplates Yorick's
                                                SalvadorDali"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-2.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"CyberPrimal 042 LAN"</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-4.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/card-item-9.jpg" alt="Image"></a>
                                        <div class="coming-soon">coming soon</div>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Space babe - Night 2/25"</a>
                                        </h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-1.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Price</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                                <div class="sc-card-product explode style2 mg-bt">
                                    <div class="card-media">
                                        <a href="{{ route('client.chitietplayer') }}"><img
                                                src="assets/images/box-item/image-box-11.jpg" alt="Image"></a>
                                        <div class="button-place-bid">
                                            <a href="#" data-toggle="modal" data-target="#popup_bid"
                                                class="sc-button style-place-bid style bag fl-button pri-3"><span>Place
                                                    Bid</span></a>
                                        </div>
                                        <button class="wishlist-button heart"><span class="number-like">
                                                100</span></button>
                                    </div>
                                    <div class="card-title">
                                        <h5><a href="{{ route('client.chitietplayer') }}">"Crypto Egg Stamp #5</a></h5>
                                    </div>
                                    <div class="meta-info">
                                        <div class="author">
                                            <div class="avatar">
                                                <img src="assets/images/avatar/avt-3.jpg" alt="Image">
                                            </div>
                                            <div class="info">
                                                <span>Creator</span>
                                                <h6> <a href="author02.html">SalvadorDali</a> </h6>
                                            </div>
                                        </div>
                                        <div class="tags">bsc</div>
                                    </div>
                                    <div class="card-bottom style-explode">
                                        <div class="price">
                                            <span>Current Bid</span>
                                            <div class="price-details">
                                                <h5> 4.89 ETH</h5>
                                                <span>= $12.246</span>
                                            </div>
                                        </div>
                                        <a href="#" class="view-history reload">View History</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 wrap-inner load-more text-center">
                    <a href="#" class="sc-button loadmore fl-button pri-3"><span>Load More</span></a>
                </div>
            </div>
        </div>
    </div>
@endsection