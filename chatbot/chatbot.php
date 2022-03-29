<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chatbot</title>
    <link rel="stylesheet" href="style.css">
    <script src="http://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="wrapper">
        <div class="title">ChatBOt</div>
        <div class="form">
            <div class="bot-inbox inbox">
                <div class="icon">
                    <i class="fas fa-user"></i>
                </div>
                <div class="msg-header">
                    <p>Bonjour , comment puis je vous aider ?</p>
                </div>
            </div>
          
        </div>
        <div class="typing-field"> 
            <div class="input-data">
                <input id ="data" type="text" placeholder="Votre question..">
                <button id="send-btn">Envoyer</button>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function()
        {
            $("#send-btn").on("click", function()
            {
                $value = $('#data').val();
                $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>'+ $value + '</p></div></div>';
                $(".form").append($msg);
                $("#data").val('');


                // ajax code 
                $.ajax({
                    url: 'message.php',
                    type: 'POST',
                    data: 'text='+$value,
                    success: function(result){
                        
                    }

                })
            });
        });
    </script>
</body>
</html>