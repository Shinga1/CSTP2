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
            margin-left: 100px;
            margin-right: 100px;
        }
        </style>

        <div class="home">
            <div class="bg-effect">
                <div class="stars"></div>
                </div>
            </div>
        </div>

        <section class = "aboutUs-sbs">
            <p class = "aboutUs-flexBox">
                Our Story
                <br></br>
                As fellow second year computer science students, many of us like using celebrity products. 
                Many of us use Dr.Dre's Beats headphones, and also various celebrity perfumes. Even though 
                we enjoy using these products, we found that it is very hard to find a single website that 
                sells all the celebrity related products that we use. We would have to go to one website 
                to buy headphones and another website to buy perfumes and another website to buy books. 
                The shopping experience ends up being draining which is why we founded Celessentials.
                <br></br>
                The one stop for all your celebrity needs for all the celebrity fantics out there.
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

            <p class = "aboutUs-flexBox">
                <br></br>
                Our Mission
                <br></br>
                "At Celessentials, our mission is to provide our customers with the opportunity to own a piece 
                of their favorite celebrity's history. We are dedicated to curating a collection of authentic and 
                unique items that have been owned, worn, or signed by some of the world's most iconic celebrities. 
                Our goal is to deliver a one-of-a-kind shopping experience that connects fans with their idols, 
                while providing excellent customer service and ensuring the authenticity and quality of every product we sell."
            </p>
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
                    <br></br>
                </div>
        </section>
    </div>
</div>
