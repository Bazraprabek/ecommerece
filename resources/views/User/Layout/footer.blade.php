<footer>
    <h1 class="px-2">Contact Us</h1>
    <div class="footer_top">
        <div class="contact_form">
            <form action="{{url('/')}}" method="POST">
                @csrf
                <input type="text" placeholder="Fullname" name="fullname">
                <input type="email" placeholder="Email" name="email">
                <textarea name="msg" id="msg" placeholder="Message" cols="30" rows="8"></textarea>
                <button>Submit</button>
            </form>
        </div>
        <div class="contact_info">
            <h2>Social Media</h2>
            <a href="tel:9861289596"><i class="fas fa-mobile"></i> 9861289596</a>
            <a href="mailto:bazraprabek@gmail.com"><i class="fa-solid fa-envelope"></i> bazraprabek@gmail.com</a>
            <a href="mailto:bazraprabek@gmail.com"><i class="fa-brands fa-facebook"></i> Facebook</a>
            <a href="mailto:bazraprabek@gmail.com"><i class="fa-brands fa-linkedin"></i> LinkedIn</a>
            <h2>Links</h2>
            <a href="{{url('/')}}">Home</a>
            <a href="{{url('/products')}}">Products</a>
        </div>
    </div>
    <div class="footer_bottom">
        <h3>Copyright &copy; 2022, Englishcha</h3>
    </div>
</footer>