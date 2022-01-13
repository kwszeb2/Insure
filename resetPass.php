<?php
    session_start();
    require_once('config.php');

?>
    
<head>
    <title>Vehicle Registeration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="CSS/style.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
 <div class="col-sm-9">
    <div class="well">
        <h2 style="text-align: center;">PASSWORD RESET</h2>
    </div>
    <div class="well">
        <form action="server.php" method="POST">
        <div class="row">
                <div class="col-sm-6">
                    <div class="formLabel">
                        <label for="Email">Enter Email Address</label>
                    </div>
                    <input type="text" name="Email" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="formLabel">
                        <label for="user-pass">Create A Password</label>
                    </div>
                    <input type="text" name="user-pass" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="formLabel">
                        <label for="user-passConfirm">Retype Password</label>
                    </div>
                    <input type="text" name="user-passConfirm" required>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <button type="submit" name="resetPass" class="btn btn-primary btn-lg">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>