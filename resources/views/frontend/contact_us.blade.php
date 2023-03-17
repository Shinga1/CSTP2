@extends('layouts.main')


@if (session()->has('msgSent'))
    <div class="alert alert-success">
        {{ session()->get('msgSent') }}
    </div>
@endif

<body>
    <section class="contact">
        <div class="contact_us">
            <h1>Contact Us</h1>
            <p>Further Enquires?<br> Send us a message, our team will be in touch as soon as possible!</p>
        </div>
        <div class="content">
            <form action="/contact_us" method="POST">
                @csrf
                <div class="input-group">
                    <input type="text" id="name" name="name" required>
                    <label for="name">Your Name:</label>
                </div>
                <div class="input-group">
                    <input type="email" id="email" name="email" required>
                    <label for="email">Your Email:</label>
                </div>
                <div class="input-group">
                    <input type="text" id="subject" name="subject" required>
                    <label for="subject">Subject:</label>
                </div>
                <div class="input-group">
                    <textarea id="message" rows="10" name="message" required></textarea>
                    <label for="message">Your Message:</label>
                </div>
                <button type="submit">SEND</button>
            </form>
        </div>
    </section>
</body>
