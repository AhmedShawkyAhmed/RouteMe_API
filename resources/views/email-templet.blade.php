<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .code
        {
        font-size: 22px;
        color: white;
        border-radius: 8px;
        padding-top: 12px;
        padding-bottom: 12px;
        padding-left: 30px;
        padding-right: 30px;
        background-color: rgb(0, 70, 139);
        border: 0px solid rgba(255, 255, 255, 0);
        }
    </style>
    <title>Document</title>
</head>
<body>
    <h2 style="color: #00468B;">RouteMe</h2>
    <hr color="#E4E4E4" size="0.5">
    <h4>Hi {{$name}},</h4>
    <h4>We Received a Request to Reset your RouteMe Password.</h4>
    <h4>Enter the Following Password Reset Code:</h4>
    <br>
    <label class="code">{{$code}}</label>
</body>
</html>