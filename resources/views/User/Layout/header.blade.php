<nav>
        <h1><a href="{{url('/')}}"><img src="favicon.ico" alt="Logo" width="35px"> E-commerce</a></h1>
        <form class="hsearch" action="{{url('/products')}}" method="get">
            <input type="text" name="search" placeholder="Search Here" value="{{$search ?? ""}}">
            <button><i class="fa-solid fa-magnifying-glass"></i></button>
        </form>
        <ul>
            <li><a class="@stack('home')" href="{{url('/')}}" >Home</a></li>
            <li><a class="@stack('products')" href="{{url('/products')}}" >Products</a></li>
            @if(session()->has('user_id'))
            <li class="dropdown">
                <a class="dropbtn @stack('login')" onclick="myFunction()"><i class="fa-solid fa-user"></i> Profile</a>
                <div id="myDropdown" class="dropdown-content">
                  <a href="{{url('/profile')}}">Profile</a>
                  <a href="{{url('/setting')}}">Setting</a>
                  <a style="color: red" href="{{url('logout')}}">Logout</a>
                </div>
            </li>
            @else
            <li><a class="@stack('login')" href="{{url('/login')}}" >Login</a></li>  
            @endif
        </ul>
</nav>

<script> 

    // DROPDOWN
    
    /* When the user clicks on the button,toggle between hiding and showing the dropdown content */
    function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
    }

    // Close the dropdown menu if the user clicks outside of it
    window.onclick = function(event) {
        if (!event.target.matches('.dropbtn')) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
            }
        }
    } 
</script>