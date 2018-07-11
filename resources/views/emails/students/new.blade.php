<!DOCTYPE>
<html>
<head>
    <title>Welcome Email</title>
</head>
 
<body>
<h2>Welcome to Ecopillars' School Portal</h2>
<br/>
Your registered email is {{ $student->user()->email }} , Please click on the below link to activate your email account
<br/>
<a href="{{url('user/verify', $student->user()->verifyUser->token)}}">Verify Email</a>

Your default username is : {{ $student->getUsername() }} <br/>
Your default password is : {{ $student->getDefaultPassword() }} <br/>


Please log in with following credentials above

</body>
 
</html>