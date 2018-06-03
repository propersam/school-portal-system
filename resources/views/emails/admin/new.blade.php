<!DOCTYPE>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Welcome to Ecopillars' School Portal {{ $admin->getName() }}</h2>
<br/>
Your registered email-id is {{ $admin->getEmail() }} , Please click on the below link to activate your email account
<br/>
<a href="{{url('user/verify', $admin->user->verifyUser->token)}}">Verify Email</a>





</body>
 
</html>