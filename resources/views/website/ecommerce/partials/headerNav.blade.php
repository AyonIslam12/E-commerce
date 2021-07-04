<nav>
    <ul>
        <li class="{{ request()->is('/')? 'active2' : '' }}">
             <a href="{{ route('website_home') }}">Home </a>
        </li>
        <li class="{{ request()->is('products')? 'active2' : '' }}">
             <a href="{{ route('website_products') }}">Products </a>
        </li>
        <li class="{{ request()->is('cart')? 'active2' : '' }}">
             <a href="{{ route('website_cart') }}">Cart </a>
        </li>
        <li class="{{ request()->is('checkout')? 'active2' : '' }}">
             <a href="{{ route('website_checkout') }}">Checkout </a>
        </li>
        <li class="{{ request()->is('your-wishlist')? 'active2' : '' }}">
             <a href="{{ route('website_wishlist') }}">Wishlist </a>
        </li>
        <li class="{{ request()->is('contact-us')? 'active2' : '' }}">
            <a class="menu-contact" href="{{ route('website_contact') }}">contact us</a>
        </li>
    </ul>
</nav>
