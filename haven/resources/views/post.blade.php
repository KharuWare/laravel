<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/KharuWareOS.css">
    <title>Analog Haven</title>
</head>

<body>
    @auth
    <div class="window" centered-window>
        <div class="title-bar">
            <div class="title-bar-text" style="font-size: 1em;">{{ $post->created_at }}</div>
            <div class="title-bar-controls">
            </div>
        </div>
            <div class="window-body centered-window">
            <a href="/users/{{ $post->user->id }}">
                <p style="word-wrap: break-word; font-size: 1em; max-height: 1em; overflow: hidden;">{{ $post->user->name }}</p>
            </a>
                <p style="word-wrap: break-word; font-size: 1em; max-height: 1em; overflow: hidden;">{{ $post->title }}</p>
                <p style="word-wrap: break-word; line-height: 1em; max-height: 8em; overflow: hidden;">{{ $post->body }}</p>
                <a href="/edit-post/{{ $post->id }}" class="button">Edit / Delete</a>         
            </div>
    </div>
    
    @else
    <div style="display: flex; justify-content: center; align-items: center; height: 90vh;">
    <div class="window" style="margin: 32px; width: 250px">
    <div class="title-bar">
        <div class="title-bar-text">
        Not Logged In!
        </div>

        <div class="title-bar-controls">
        <a href="/404"><button aria-label="Close"></button></a>
        </div>
    </div>
    <div class="window-body">
        <p>Please make an account to view the website!</p>
        <section class="field-row" style="justify-content: flex-end">
        <a href="/register"><button>Create Account</button></a>
        </section>
    </div>
    </div>
    </div>
    @endauth
</body>
</html>
