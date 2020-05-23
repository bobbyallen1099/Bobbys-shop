<header class="header">
    <div class="container">
        <div class="header__wrapper">
            <a href="#" class="header__brand">Bobby's shop</a>
            <div class="header__links">
                <a href="{{ route('pages.home') }}" class="header__link"><i class="far fa-home fa-fw"></i> Home</a>
                <a href="{{ route('pages.products') }}" class="header__link"><i class="far fa-store-alt fa-fw"></i> Shop items</a>
                <a href="#" class="header__link icon"><i class="far fa-user-alt fa-fw"></i></a>
                <a href="{{ route('pages.basket') }}" class="header__link icon"><i class="far fa-shopping-basket fa-fw"></i><div class="header__cart-number">1</div></a>
            </div>
        </div>
    </div>
</header>