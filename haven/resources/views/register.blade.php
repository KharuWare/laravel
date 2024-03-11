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
            <img src="https://kharua.xyz/img/placeholder.png" alt="PLACEHOLDER" style="margin-bottom: 1vh; height: 32.8vh;">
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
                    <div class="title-bar-text">Sign Up!</div>
                    <div class="title-bar-controls"></div>
                </div>
                <div class="window-body centered-window">
                @if ($errors->any())
                    <div style="color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="/register" method="post">
                    @csrf
                    <div class="field-row-stacked" style="width: 10vw">
                        <input name="name" type="text" placeholder="Name">
                        <input name="email" type="text" placeholder="Email">
                        <input name="password" type="password" placeholder="Password">
                        <input name="password_confirmation" type="password" placeholder="Confirm Password">
                        <button style="width: 4vw">Sign Up</button>
                        <p>Already have an account?<br>
                        <a href="/login">Log in!</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
        
    @endauth
</body>

</html>