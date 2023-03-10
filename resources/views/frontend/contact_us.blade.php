@extends('layouts.main')

<body>
    <section class="contact">
    <div class="contact_us">
       <h1>Contact Us</h1>
       <p>Further Enquires?<br> Send us a message, our team will be in touch as soon as possible!</p>
   </div>
      <div class="content">
       <form action="" method="GET">
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
      <button type="submit">SEND</button>
    </form>
   </div>
</section>
</body>