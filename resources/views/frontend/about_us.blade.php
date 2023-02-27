@extends('layouts.main')

@section ('content')

<div class="about_us">

    <div class="aboutUs-bg">
         <h1>&nbsp &nbsp &nbsp WHO WE ARE</h1>
         <br> </br>
         
         <style>
         .image 
         {
            border:4px solid #FFD700; 
            padding:15px;
            height: 500px;
            width: 500px;
            border-radius: 25%;
        }
         </style>
         
         <section class = "aboutUs-sbs">
            <p class = "aboutUs-flexBox">Our Story
                As fellow second year computer science students, many of us like using celebrity products. 
                Many of us use Dr.Dre's Beats headphones, and also various celebrity perfumes. Even though 
                we enjoy using these products, we found that it is very hard to find a single website that 
                sells all the celebrity related products that we use. We would have to go to one website 
                to buy headphones and another website to buy perfumes and another website to buy books. 
                The shopping experience ends up being draining which is why we founded Celessentials.
                <br></br>
                For all the celebrity fantics out there.
                <br></br>
                The one stop for all your celebrity needs.
            </p>

         <img 
         class="image"
         src="/assets/images/ourStory.jpg"
         alt="Our story">

        </section>

        <section class = "aboutUs-sbs">
        <img 
         class="image"
         src="/assets/images/missionImage.png"
         alt="Our mission statement">

        <p class = "aboutUs-flexBox">Our Mission</p>
        <br> </br>

        </section>

         <section class="aboutUs-about" id="about">
                <div class="about-text">
                    <h2>The Site For Celebrities 💫</h2>
                    <p>Celessentials is the stop for all your celebity related needs. Whether you want to jazz up your life
                        with
                        tech or relax with a book. We have it all. From books to electronics, clothes to shoes and finally
                        beauty to
                        put it all together.</p>
                    <a href="{{ url('/contact_us') }}" class="button">Contact us</a>
                </div>
            </section>
</div>
