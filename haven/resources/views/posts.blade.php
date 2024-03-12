<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/KharuWareOS.css">
    <link rel="stylesheet" href="../css/Grid.css">
    <style>
        .layout-grid-2 {
            display: flex; /* Use flexbox */
            flex-wrap: wrap; /* Wrap items onto multiple lines if needed */
        }

        .layout-grid-2 .window {
            width: 14vw;
            height: 28vh;
            margin: 0.9%;
            margin-top: 0%; /* Add margin for spacing between posts */
        }
    </style>
    <title>Analog Haven</title>
</head>

<body>
    @auth
    <div class="layout-grid">
    <div class="layout-grid-1">
        <div class="window" centered-window style="width: 16vw;">
            <div class="title-bar">
                <div class="title-bar-text">KharuWare OS</div>
                <div class="title-bar-controls"></div>
            </div>
            <div class="window-body centered-window" style="height: 83.5vh;">
            <form action="/create-post" method="post">
                <fieldset>
                    <legend>Create a Post</legend>
                    @csrf
                    <div class="field-row-stacked" style="width: 12.8vw">
                        <input name="title" type="text" placeholder="Title">
                        <div style="display: flex; align-items: center;">
                            <button style="width: 8vw; margin-right: 5px;">Add Image</button>
                            <select name="category" style="width: 6vw;">
                                <option value="" disabled selected>Category</option>
                                <option value="Technology">Technology</option>
                                <option value="Gaming">Gaming</option>
                                <option value="Music">Music</option>
                                <option value="Art">Art</option>
                                <option value="Off-Topic">Off-Topic</option>
                            </select>
                        </div>
                        <textarea name="body" placeholder="Body Content..." style="height: 20vh; width: 12.8vw; resize: none;"></textarea>
                        <button style="width: 4vw">Submit</button>
                    </div>
                </fieldset>
            </form>
            <fieldset>
                <legend>Your Posts</legend>
                <div class="sunken-panel" style="height: 20vh; width: 12.8vw;">
                    <table class="interactive">
                        <thead>
                            <tr>
                                <th style="width: 11vw; max-width: 11vw;">Name</th>
                                <th style="width: 2vw; max-width: 2vw;">Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                            @if ($post->user_id == auth()->id())
                            <tr>
                                <td style="max-width: 7vw; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                                    {{ $post->title }}
                                </td>
                                <td>
                                    <a href="/post-edit/{{ $post->id }}" class="button">Edit</a>
                                </td>
                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </fieldset>
            <fieldset>
                <legend>Navigation (W.I.P)</legend>
                <ul class="tree-view" style="height: 11vh">
                    <li><a href="/profile" style="color:crimson">Profile</a></li>
                    <li><a href="/posts" style="color:crimson">Posts</a></li>
                    <li>Under Construction</li>
                </ul>
            </fieldset>
        </div>
    </div>
</div>

                    <div class="layout-grid-2">
                    @foreach ($posts as $post)
                        <div class="window centered-window">
                            <div class="title-bar {{ \App\Http\Controllers\PostController::getCategoryClass($post->category) }}">
                                <div class="title-bar-text" style="font-size: 1em;">{{ $post->user->name }}</div>
                                <div class="title-bar-controls">
                                </div>
                            </div>
                            <div class="window-body centered-window">
                                <p style="word-wrap: break-word; font-size: 1em; max-height: 1em; overflow: hidden;">{{ $post->title }}</p>
                                <p style="word-wrap: break-word; line-height: 1em; max-height: 8em; overflow: hidden;">{{ $post->body }}</p>
                                <a href="/post/{{ $post->id }}" class="button">Read More</a>
                            </div>
                        </div>
                    @endforeach       
                </div>
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
