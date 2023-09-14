<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href={{ asset('/assets/css/style.contact.css')}}>
</head>
<body>
    {{-- <img src="{{ asset('assets/img/girls.jpg') }}" class="img-background" alt="Background Image"> --}}
    <div class="container">
        <header>
            <h1>Contact Us</h1>
            <p>Feel free to reach out to us for any inquiries or assistance . We're here to help!</p>
            <a href="{{ route('welcome') }}"class="home-button" id="">Home</a>

            
            
        </header>
        <div class="content">
            <div class="content-form">
                <form action="https://formspree.io/f/xpzgrnrr" method="POST">
                    <div class="form">
                        <div class="right">
                            <div class="contact-form">
                                <input type="text" required>
                                <span>Full Name</span>
                            </div>
                            <div class="contact-form">
                                <input type="email" required>
                                <span>Email </span>
                            </div>
                            
                            <div class="contact-form">
                                <textarea name="text"></textarea>
                                <span>
                                    Type your Message....</span>
                            </div>
                            <div class="contact-form">
                                <input type="submit" name="submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="icons">
            <section>
                
                <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                <h2>Address</h2>
                <p>
                    123 Jogo Road, Cityville, 12345 <br>
                    Nairobi <br>
                    Kenya
                </p>
            </section>
            <section>
                <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                <h2>Phone</h2>
                <p>123-456-78901548</p>
            </section>
            <section>
                <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                <h2>Email</h2>
                <p>rembo@gmail.com</p>
            </section>
        </div>
        <div class="media">
            <li><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-instagram fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-whatsapp fa-2x" aria-hidden="true"></i></li>
            <li><i class="fa fa-twitter-square fa-2x" aria-hidden="true"></i></li>
        </div>
    </div>
</body>
</html>
