<script>
    $('#modal-log-in').on('click', function (event) {
        var output = $('#login-output').hide();
        event.preventDefault();
        var email = $('#login-email').val();
        var password = $('#login-password').val();
        var request = $.ajax({
            type: "POST",
            url: "./core/api/user-auth.php",
            data: {
                email: email,
                password: password
            }
        });
        request.done(function (name) {
            if (name == 'false') {
                output.text('Wrong username or password.');
                output.show();
            } else {
                $('#login-modal').modal('hide');
                $('#log-in').hide();
                $('#sign-up').hide();
                $('#welcome-name').text("Welcome, " + name);
            }
        });
    });

    $('#signup-button').on('click', function (event) {
        event.preventDefault();
        var name = $('#signup-name').val();
        var email = $('#signup-email').val();
        var password = $('#signup-password').val();
        var request = $.ajax({
            type: "POST",
            url: "./core/api/signup.php",
            data: {
                name: name,
                email: email,
                password: password
            }
        });
        request.done(function (name) {
            $('#signup-modal').modal('hide');
            $('#log-in').hide();
            $('#sign-up').hide();
            $('#welcome-name').text("Welcome, " + name);
        });
    });
</script>
<div class="footer">
    <div class="container">
        <p class="text-muted">The source code is <a href="https://github.com/Gonghan/myNotes" target="_blank">here</a>.<br/>Gonghan Wang, wanggonghan@gmail.com</p>
    </div>
</div>
<style>
    html {
        position: relative;
        min-height: 100%;
    }
    body {
        /* Margin bottom by footer height */
        margin-bottom: 60px;
    }
    .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        /* Set the fixed height of the footer here */
        height: 60px;
        background-color: #f5f5f5;
    }
    body > .container {
        padding: 60px 15px 0;
    }
</style>
</body>
</html>