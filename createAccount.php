<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <link rel="stylesheet" href="accountStyle.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script type="text/javascript" src="accountJS.js"></script>
    </head>
    <body>
        <form class="formCF" name="createAccountForm" action="" method="">
            <div class="textBox">
                <input class="inputBox" type="text" name="username" id="username" required>
                <label class="inputBoxLabel"> Username </label> 
            </div>
            <div class="textBox">
                <input class="inputBox" type="email" name="email" id="email" required>
                <label class="inputBoxLabel"> Email Address</label> 
            </div>
            <div class="textBox">
                <input class="inputBox" type="tel" pattern="[0-9]{4}-[0-9]{3}-[0-9]{4}" name="contactNum" id="contact" required>
                <label class="inputBoxLabel"> Contact No. <small>(0912-345-6789)</small> </label>
            </div>
            <div class="textBox">
                <input class="inputBox" type="password" name="password" id="password" required>
                <label class="inputBoxLabel"> Password </label> 
            </div>
            <div class="textBox">
                <input class="inputBox" type="password" name="conPassword" id="conPassword" required>
                <label class="inputBoxLabel"> Confirm Password </label> 
            </div>
            <div class="textBox">
                <input type="button" onclick="validate()" name="createAccount" class="submitBtn" value="Create Account">
            </div>
        </form>
        
        
    </body>
</html>
