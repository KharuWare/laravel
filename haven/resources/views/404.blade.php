<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/error.css">
    <title>Analog Haven</title>
</head>

<body>
    @auth

    <div class='error'>
<div class="msg">
    <p class='highlight'>Error 404</p>
</div>
</div>

<div class='container'>
<div class="msg">
    <p>* User tried to bypass the system.</p>
    <br>
    <p>* Wait a second...</p>
    <p>* How did you even get here?</p>
    <p>* You're already logged in.</p>
    <p>* You shouldn't even get the chance to get here.</p>
    <p>* Press "Alt" + "←" to go back to the last viewed page.</p>
    <br>
    <p class="continue">-><a href="/profile" class="btn"> Or click here to go to your profile.</a> <-</p>
</div>
</div>

@else

<div class='error'>
<div class="msg">
    <p class='highlight'>Error 404</p>
</div>
</div>

<div class='container'>
<div class="msg">
<p>* User tried to bypass the system.</p>
    <br>
    <p>* Why couldn't you just make a account?</p>
    <p>* You could've easily avoided this error.</p>
    <p>* But you chose to click unnecessary buttons.</p>
    <p>* Press "Alt" + "←" to get a second chance.</p>
    <br>
    <p class="continue">-><a href="/register" class="btn"> Or click here to create an account.</a> <-</p>
</div>
</div>

@endauth
</body>

</html>
