<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/KharuWareOS.css">
    <link rel="stylesheet" href="../css/Grids.css">
    <title>Analog Haven</title>
</head>

<body>
    @auth
    <div class="window" centered-window style="width: 53vw;">
        <div class="title-bar">
            <div class="title-bar-text">Edit Post</div>
            <div class="title-bar-controls">
            </div>
        </div>
        <div class="window-body centered-window" style="height: 68vh;">
            <form action="/edit-post/{{ $post->id }}" method="post">
                @csrf
                @method('put')
            <p>Title</p>
                <div><input name="title" type="text" value="{{ $post->title }}" style="width: 50vw;"></div>
            <p>Content</p>
                <div><textarea name="body" style="height: 50vh; width: 50vw; overflow: hidden; resize: none;">{{ $post->body }}</textarea></div>
            <button style="margin-top: 2vh;">Submit</button>
        </form>
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
