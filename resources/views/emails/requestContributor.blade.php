<!DOCTYPE html>
<html>

    <head>
        <title>Request Join Contributor</title>

        <!--
 You can put your custom CSS if you wish
    -->

    </head>

    <body>

        <h2>Hi, {{ $contentMail["username"] }}</h2>
        <p>{{ $contentMail["body"] }}</p>

        <p>Code: {{ $contentMail["code"] }}</p>
        <p>Your code will expire in 30 minutes</p>

        <p>If you did not request this, please ignore this email.</p>

        <p>Regards,</p>
        <p>Thanks</p>

    </body>

</html>
