<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>尊敬的{{$user->user_name}},感谢您注册我们的微博，请登录您的注册邮箱 ，并在24小时内 <a href="{{url('active?uid='.$user->user_id.'&key='.$user->token)}}">激活</a>您的登录账号，账号只有激活后才能登录。</p>

</body>
</html>