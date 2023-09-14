<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>About Us</title>
    <link rel="stylesheet" href={{ asset('/assets/css/style.about.css')}}>
</head>
<body>
    <header>
        <h1>About Us - Rembo FC</h1>
    </header>
    <div class="container">
        <div class="image-container">
            <img src="{{asset('assets/img/playing.jpg')}}"  alt="playing">
        </div>
        <div class="text-container">
            <h2>Welcome to Rembo FC!</h2>
            <p>Rembo FC is a passionate and dedicated football club that strives for excellence on and off the field. Our mission is to promote teamwork, sportsmanship, and a love for the beautiful game.</p>
            <p>With a rich history and a strong lineup of players, we aim to bring the joy of football to our fans and supporters. Our commitment to hard work and perseverance has led us to numerous victories and memorable moments.</p>
            <p>Join us on this exciting journey as we continue to push our limits and achieve new heights in the world of football.</p>
            <a href="{{ route('contact') }}" class="contact-button">Contact Us</a>
        </div>
    </div>
</body>
</html>