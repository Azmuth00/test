<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
    <h2>Login</h2>
    <form id="loginForm">
        <div>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit">Login</button>
    </form>
    <div id="message"></div>

    <script>
        $(document).ready(function(){
            $('#loginForm').on('submit', function(event){
                event.preventDefault();

                $.ajax({
                    url: '<?php echo base_url("login/authenticate"); ?>',
                    method: 'POST',
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response){
                        console.log('Response:', response);
                        if(response.status == 'success'){
                            $('#message').html('Login successful');
                        } else {
                            $('#message').html('Invalid username or password');
                        }
                    },
                
                });
            });
        });
    </script>
</body>
</html>
