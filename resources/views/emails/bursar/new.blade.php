<!DOCTYPE>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Welcome to Ecopillars' School Portal {{ $bursar->getName() }}</h2>
<br/>
Your registered email-id is {{ $bursar->getEmail() }} , Please click on the below link to activate your email account
<br/>
<a href="{{url('user/verify', $bursar->user->verifyUser->token)}}">Verify Email</a>

Your registered username is : {{ $bursar->getUsername() }} <br/>
Your registered password is : {{ $bursar->getDefaultPassword() }} <br/>

You will be asked to change your password when you log in with the above credentials please do reset this to any username and password of your choice.


</body>
 
</html>