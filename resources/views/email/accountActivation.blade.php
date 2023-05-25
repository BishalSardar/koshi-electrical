<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style type="text/css">
        * {
            margin: 0 auto;
            padding: 0;
            box-sizing: border-box;
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            color: #8094AE;
        }

        .main {
            background-color: #f6f6f6;
        }

        .content1 {
            padding: 3.5em 0 2em 0;
        }

        .content1 h1 {
            font-size: 27px;
            margin-bottom: 0.5em;
            color: #2B3748;
        }

        .content1 p {
            line-height: 20px;
            font-size: 15px;

        }

        .content2 {
            background: white;
            padding: 3em 2em;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 1px 4px;
        }

        .content2 h2 {
            font-size: 17px;
            padding-top: 1em;
            color: #1EE0AC;
        }

        .content2 .greeting {
            margin: 2em 0;
        }

        .content2 .greeting span {
            font-weight: bold;
        }

        .content2 .msg1,
        .content2 .msg2 {
            margin: 1em 0;
            font-size: 15px;
            line-height: 25px;
        }

        .content3 {
            width: 70%;
            margin: 0 auto;
        }

        .content3 p {
            font-size: 11px;
            margin-top: 3em;
            line-height: 21px;
            padding-bottom: 3em;
        }

        @media only screen and (min-width: 800px) {
            .container {
                width: 80%;
            }
        }

        @media only screen and (min-width: 1200px) {
            .container {
                width: 50%;
            }
        }
    </style>
</head>

<body>
    <div class="main">

        <div class="container">
            <div class="content1">
                <h1>Koshi Electrical Shop</h1>
            </div>
            <div class="content2">
                <h2>Account Successfully Activated</h2>
                <p class="greeting">Hi <span>{{ $mailData['name'] }}</span> ,</p>
                <p class="msg1">Your account with us has been activated</p>
                <p class="msg2">Your starting salary will be Rs. {{ $mailData['salary'] }}
                </p>
            </div>
            <div class="content3">
                <p>
                    Thank for being part of Koshi Electrical Family.
                </p>
            </div>
        </div>

    </div>
</body>

</html>
