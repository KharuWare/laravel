<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/KharuWareOS.css">
    <link rel="stylesheet" href="../css/Grid.css">
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
            <fieldset>
                    <legend>Profile Navigation</legend>
                    <ul class="tree-view" style="height: 11vh">
                    <li><a href="/profile" style="color:crimson">Profile</a></li>
                        <li><a href="/profile-edit" style="color:crimson">Edit Profile</a></li>
                        <li>Under Construction</li>
                    </ul>
                </fieldset>
                <fieldset>
                        <legend>Your Friends</legend>
                        <ul class="tree-view" style="height: 11vh">
                            <li><span class="status-circle online"></span><a href="/profile" style="color:darkviolet">Online Friend</a></li>
                            <li><span class="status-circle offline"></span><a href="/profile" style="color:darkviolet">Offline Friend</a></li>
                        </ul>
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
                        <div class="window centered-window">
                            <div class="title-bar">
                                <div class="title-bar-text" style="font-size: 1em;">Hello {{ Auth::user()->name }}!</div>
                                <div class="title-bar-controls">
                                </div>
                            </div>
                            <div class="window-body centered-window">
                                
                            </div>
                        </div>      
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
