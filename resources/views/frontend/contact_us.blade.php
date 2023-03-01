@extends('layouts.main')

<body>
        <div class="home">
            <div class="bg-effect">
                <div class="stars"></div>
                </div>
            </div>
        </div>

        <div class="contactUs-bg">
            <h1>&nbsp &nbsp Contact Us</h1>
            <br></br>
            <br></br>
            <br></br>
            <br></br>
            <p>&nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Fill this form out to send us any questions or inquiries. 
                <br> 
                &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Our team would be happy to answer your questions and get back to you.</p>
        </div>
        <div class="content">
        <form>
            <div class="input-group">
            <label for="name">Your Name:</label>
            <input type="text" id="name" required>
        </div>
        <div class="input-group">
            <label for="email">Your Email:</label>
            <input type="email" id="email" required>
        </div>
        <div class="input-group">
            <label for="subject">Subject:</label>
            <input type="text" id="subject" required>
        </div>
        <div class="input-group">
            <label for="message">Your Message:</label>
            <textarea style="color: whiteSmoke;" id="message" rows="10"cols="170" required></textarea>
       </div>
       <br></br>
       <button type="submit" style="background-color: whiteSmoke; color: black;">SUBMIT</button>
    </form>
    </div>
</body>
