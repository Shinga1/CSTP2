@extends('layouts.main')

<<<<<<< HEAD
<body>
     <div class="contact_us">
        <h2>Contact Us</h2>
        <p>Further Enquires?<br> Send us a message, our team will be in touch as soon as possible!</p>
    </div>
       <div class="content">
        <form>
            <div class="input-group">
            <input type="text" id="name" required>
            <label for="name">Your Name:</label>
        </div>
        <div class="input-group">
            <input type="email" id="email" required>
            <label for="email">Your Email:</label>
        </div>
        <div class="input-group">
            <input type="text" id="subject" required>
            <label for="subject">Subject:</label>
        </div>
        <div class="input-group">
            <textarea id="message" rows="10" required></textarea>
            <label for="message">Your Message:</label>
       </div>
       <button type="submit">SUBMIT</button>
    </form>
    </div>
</body>
=======
<div class="contact_us">
    @section ('content')

    <div class="home-bg">
        <h1>WHO WE ARE</h1>
        <a href="/products">Celessentials</a>
    </div>
</div>
>>>>>>> 4618b5ff53e247e57cd77c3d0d1e6681e1f6e9a2
