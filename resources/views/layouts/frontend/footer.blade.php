<footer class="footer">
    <div class="footer-container">
        <div class="footer-row">


            <div class="footer-col">
                <h3>newsletter</h3>
                <p class="text2"> To receive updates, exclusive deals, and more, please provide your email address and
                    subscribe.
                </p>
                <form class="form" action="/layouts/main" method="post">
                    @csrf
                    <input class="input" type="email" name="email" required="required">
                    <button type="submit">Subsribe Now</button>
                </form>
            </div>

            <div class="footer-col">
                <h2>more information</h2>
                <ul>
                    <li><a href="{{ asset('/about_us') }}">About Us</a></li>
                    <li><a href="{{ asset('/privacy_policy') }}">Privacy Policy</a></li>
                    <li><a href="{{ asset('/terms_and_conditions') }}">Terms and Conditions</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h2>need support?</h2>
                <ul>
                    <li><a href="{{ asset('/contact_us') }}">Contact Us</a></li>
                    <li><a href="{{ asset('/faqs') }}">FAQs</a></li>
                    <li><a href="{{ asset('/refund_and_return_policy') }}">Refund and Return Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
