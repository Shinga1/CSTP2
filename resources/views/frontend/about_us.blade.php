@extends('layouts.main')

@section ('content')

<div class="about_us">

    <div class="aboutUs-bg">
         <h1>WHO WE ARE</h1>
         <br> </br>
         
         <style>
         .image {
            border:4px solid #1b6b6f; 
            padding:15px;
            align: "right";
        }
         </style>

         <img 
         class="image"
         src="/assets/images/3DBusinessCard.jpg" height="250" width="250"
         alt="Our mission statement">

         <section class="aboutUs-about" id="about">
                <div class="about-text">
                    <h2>The Site For Celebrities 💫</h2>
                    <p>Celessentials is the stop for all your celebity related needs. Whether you want to jazz up your life
                        with
                        tech or relax with a book. We have it all. From books to electronics, clothes to shoes and finally
                        beauty to
                        put it all together.</p>
                    <a href="{{ url('/about_us') }}" class="button">Find Out More</a>
                </div>
            </section>
</div>
