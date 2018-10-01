<!DOCTYPE html>
<html>
    <head>
        <title>Login - TA5</title>
        <style>
            body {
                margin: 0;
                background-color: #efefef;
            }

            input {
                outline: 0;
            }
            /* ===================================================================== */
            input[type='submit'] {
                border: 0;
                border-radius: 5px;
                padding: 2% 5%;
                color: white;
                cursor: pointer;
                margin: 2% 0;
                background-color: darkgreen;
                transition: 0.5s;
                box-shadow: 0 0 10px black;
            }

            input[type='reset'] {
                border: 0;
                border-radius: 5px;
                padding: 2% 5%;
                color: white;
                cursor: pointer;
                margin: 2% 0;
                background-color: darkred;
                box-shadow: 0 0 10px black;
            }

            input[type='submit']:hover {
                background-color: green;
                transition: 0.5s;
            }

            input[type='reset']:hover {
                background-color: red;
                transition: 0.5s;
            }
            /* ===================================================================== */
            .login {
                float: left;
                width: 25%;
                margin: 10% 38%;
                border-radius: 10px;
                box-shadow: 0 0 20px black;
                background-color: #fff;
            }

            .login > #title {
                float: left;
                background-color: darkred;
                width: 100%;
                text-align: center;
                color: white;
                border-radius: 10px 10px 0 0;
            }

            .login > form {
                float: left;
                width: 94%;
                padding: 2% 3%;
                text-align: center;
            }

            .login input[type='text'], .login input[type='password'] {
                width: 96%;
                padding: 1% 2%;
                margin: 1% 0 2% 0;
                text-align: center;
                border: 0;
                border-bottom: 1px solid black
            }
        </style>
    </head>
    <body>
        <div class="login">
            <div id="title">
                <h3>Login - TA5</h3>
            </div>
            <form method="post" action="proseslogin.php">
                Username <input type="text" name="username">
                Password <input type="password" name="password">
                <input type="submit" name="login" value="Login"> <input type="reset" value="Reset">
            </form>
        </div>
    </body>
</html>
