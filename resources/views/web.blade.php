<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon.png">
    <link rel="icon" type="image/png" href="img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Pizza Task</title>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no" name="viewport">
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="{{ asset('css/style.css', env('REDIRECT_HTTPS')) }}" rel="stylesheet">
</head>
<body class="sidebar-collapse">
<nav class="navbar navbar-color-on-scroll fixed-top navbar-expand-lg navbar-transparent" color-on-scroll="100">
    <div class="container">
        <div class="navbar-translate">
            <div class="navbar-brand">Pizza Task</div>
            <button class="navbar-toggler navbar-toggler-main" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation" data-target="#sectionsNav">
                <span class="sr-only">Toggle navigation</span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="sectionsNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="#pizza" class="nav-link"><strong>Pizza</strong></a>
                </li>
                <li class="nav-item">
                    <a href="#combo" class="nav-link"><strong>Combo</strong></a>
                </li>
                <li class="nav-item">
                    <a href="#desserts" class="nav-link"><strong>Desserts</strong></a>
                </li>
                <li class="nav-item">
                    <a href="#drinks" class="nav-link"><strong>Drinks</strong></a>
                </li>
                <li class="nav-item">
                    <a href="#promotions" class="nav-link"><strong>Promotions</strong></a>
                </li>
                <li class="button-container dropdown nav-item mr-lg-2">
                    <button id="history_orders_btn" class="btn btn-info btn-round btn-block" data-toggle="modal" data-target="#history_modal">
                        <i class="material-icons">history</i> Orders history
                    </button>
                </li>
                <li class="button-container nav-item iframe-extern">
                    <button id="basket" class="btn btn-rose btn-round btn-block" data-toggle="modal" data-target="#basket_modal">
                        <i class="material-icons">shopping_cart</i> Basket
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="page-header header-filter header-small" data-parallax="true" style="background-image: url(img/header.jpeg);">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ml-auto mr-auto text-left">
                <h1 class="title">Choose what you like!</h1>
            </div>
        </div>
    </div>
</div>
<div class="main main-raised">
    <div id="pizza" class="container">
        <div class="section">
            <h2 class="title text-left">Pizza</h2>
            <div id="pizza_items" class="row justify-content-center"></div>
        </div>
    </div>
    <div id="combo" class="container">
        <h2 class="title text-left">Combo</h2>
        <div id="combo_items" class="row justify-content-center"></div>
    </div>
    <div id="desserts" class="container">
        <h2 class="title text-left">Desserts</h2>
        <div id="desserts_items" class="row justify-content-center"></div>
    </div>
    <div id="drinks" class="container">
        <h2 class="title text-left">Drinks</h2>
        <div id="drinks_items" class="row justify-content-center"></div>
    </div>
    <div id="promotions" class="container">
        <div class="row">
            <div class="col-md-12 ml-auto mr-auto">
                <h2 class="title">Promotions</h2>
                <div id="promotion_items" class="card card-plain card-blog"></div>
            </div>
        </div>
        <div class="section"></div>
    </div>
</div>
<div class="modal fade" id="basket_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div id="tab1" class="modal-content modal-lg nav-tab">
            <div class="modal-header">
                <h3 class="card-title">Shopping Cart</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-shopping">
                        <thead>
                        <tr>
                            <th>Product</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">Quantity</th>
                            <th class="text-right">Amount</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link basket-clear">Clear</button>
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
        <div id="tab2" class="modal-content modal-lg nav-tab d-none">
            <div class="modal-header">
                <h3 class="card-title">Order confirmation</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">clear</i>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 text-center ml-auto mr-auto">
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">phone</i>
                                            </span>
                                </div>
                                <input id="phone" type="number" required="true" number="true" class="form-control" placeholder="Phone *">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">face</i>
                                            </span>
                                </div>
                                <input id="name" type="text" required="true" aria-required="true" aria-invalid="false" class="form-control" placeholder="Name *">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                            <span class="input-group-text">
                                              <i class="material-icons">info</i>
                                            </span>
                                </div>
                                <textarea id="address" class="form-control" required="true" id="exampleFormControlTextarea1" rows="3" placeholder="Address *"></textarea>
                            </div>
                        </div>
                        <div class="category form-category">* Required fields</div>
                        <br>
                        <div class="row">
                            <button type="button" class="btn btn-warning btn-round btn-tab ml-auto mr-auto">Back to items!</button>
                            <button type="button" class="btn btn-info btn-round ml-auto mr-auto apply-order">Apply order!</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link basket-clear">Clear</button>
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="history_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div id="history-tab1" class="modal-content modal-lg nav-tab">
            <div class="modal-header">
                <h3 class="card-title mr-auto ml-auto">View history</h3>
            </div>
            <div class="modal-body history-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<footer class="footer footer-big">
    <div class="container">
        <nav>
            <ul>
                <li>
                    <a href="#pizza"><strong>Pizza</strong></a>
                </li>
                <li>
                    <a href="#combo"><strong>Combo</strong></a>
                </li>
                <li>
                    <a href="#desserts"><strong>Desserts</strong></a>
                </li>
                <li>
                    <a href="#drinks"><strong>Drinks</strong></a>
                </li>
                <li>
                    <a href="#promotions"><strong>Promotions</strong></a>
                </li>
            </ul>
        </nav>
        <div class="copyright pull-center">
            Pizza Task from
            <a href="https://rostov.hh.ru/resume/dfe19007ff0286c9bb0039ed1f326f526b6d65" target="_blank">Dmitry Shpachenko</a>
        </div>
    </div>
</footer>
<!--   Core JS Files   -->
<script src="{{ asset('js/script.js', env('REDIRECT_HTTPS')) }}" type="text/javascript"></script>
</body>
</html>
