<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/KharuWareOS.css">
    <title>Analog Haven</title>
</head>

<body>
    @auth
    <div style="display: flex; justify-content: center; align-items: center; height: 90vh;">
        <div class="window" centered-window style="width: 16vw;">
            <div class="title-bar">
                <div class="title-bar-text">Already logged in!</div>
                <div class="title-bar-controls"></div>
            </div>
            <div class="window-body centered-window">
            <img src="https://placehold.co/197" alt="PLACEHOLDER" style="margin-bottom: 1vh;">
            <p>Logged in as {{ Auth::user()->name }}</p>
                <div style="display: flex;">
                    <a href="/posts"><button class="btn btn-primary" style="margin-bottom: 1vh;">Continue</button></a>
                    <form action="/logout" method="post" style="margin-left: 10px;">
                        @csrf
                        <button type="submit" class="btn btn-danger">Log Out</button>
                    </form>
                </div>
            </form>
            </div>
        </div>
    </div>


    @else
    <div style="display: flex; justify-content: center; align-items: center; height: 90vh;">
            <div>
                <div class="window" centered-window style="width: 16vw;">
                    <div class="title-bar">
                        <div class="title-bar-text">Log In!</div>
                        <div class="title-bar-controls"></div>
                    </div>
                    <div class="window-body centered-window">
                        <form action="/login" method="post">
                            @csrf
                            <div class="field-row-stacked" style="width: 10vw">
                                <input name="logname" type="text" placeholder="Name">
                                <input name="logpassword" type="password" placeholder="Password">
                                <button style="width: 4vw">Log In</button>
                                <p>Don't have an account?<br>
                                <a href="/register">Sign up!</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    @endauth
</body>

</html>
