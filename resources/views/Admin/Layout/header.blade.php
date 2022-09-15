<nav>
    <a class="@stack('home')" href="{{url('/admin')}}"><img src="favicon.ico" alt="Logo"></a>
    <h1>Dashboard</h1>
</nav>
<header>
        <ul>
            <a class="@stack('home') first" href="{{url('/admin')}}" title="Home"><i class="fa-solid fa-house"></i></a>
            <a class="@stack('account')" href="{{url('/admin-account')}}" title="Account"><i class="fas fa-user-alt"></i></a>
            <a class="@stack('products')" href="{{url('/admin-products')}}" title="Account"><i class="fa-solid fa-cloud-arrow-up"></i></a>
            <a class="@stack('shop')" href="{{url('/admin-shop')}}" title="Shop"><i class="fa-solid fa-cart-shopping"></i></a>
            <a class="@stack('contact')" href="{{url('/admin-contact')}}" title="Contact"><i class="fas fa-file-contract"></i></a>
            <a class="@stack('setting')" href="{{url('/admin-setting')}}" title="Setting"><i class="fa-solid fa-gear"></i></a>
            <a style="color: red" href="{{url('/logout')}}" title="Logout"><i class="fa-solid fa-right-from-bracket"></i></a>
        </ul>
</header>