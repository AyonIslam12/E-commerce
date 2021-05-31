<header class="clearfix">
    <div class="header-top-area bb hidden-xs">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-12">
@include('website.ecommerce.partials.headerLanguage')
                </div>
                <div class="col-xl-9 col-lg-9 col-md-9 col-12">
 @include('website.ecommerce.partials.headerLinks')
                </div>
            </div>
        </div>
    </div>
    <div class="header-middle-area ptb-25">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-12 col-12">
 @include('website.ecommerce.partials.headerLogo')
                </div>
                <div class="col-xl-9 col-lg-9 d-none d-lg-block">
                    <div class="home3-mainmenu mainmenu mt-12 home3-hover dropdown text-right">
@include('website.ecommerce.partials.headerNav')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header-bottom home3-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 d-none d-lg-block">
@include('website.ecommerce.partials.headerSidebar')
                </div>

                <div class="col-xl-7 col-lg-6 col-md-8 col-12">
@include('website.ecommerce.partials.headerSearch')
                </div>
                <div class="col-xl-2 col-lg-2 col-md-4 col-12">
 @include('website.ecommerce.partials.headerCard')
                </div>
            </div>
        </div>
    </div>
    <div class="mobail-menu-area home3-bg">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-md-6 d-block d-lg-none">
                    <div class="mobail-menu-active">
@include('website.ecommerce.partials.headerNav')
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
