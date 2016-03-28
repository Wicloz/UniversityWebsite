{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>Login</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="sid"><span style="color:red;">*</span>Student Number:</label>
                    <input type="text" name="sid" id="sid" value="{$sid}">
                </div>
                <div class="form-row">
                    <label for="password"><span style="color:red;">*</span>Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="hidden" name="action" value="login">
                <input type="hidden" name="token" value="{$token|default:""}">
                <input class="button submit-button" type="submit" value="Log in">
            </form>
        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Register</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="name"><span style="color:red;">*</span>Full Name:</label>
                    <input type="text" name="name" id="name" value="{$name}">
                </div>
                <div class="form-row">
                    <label for="sid"><span style="color:red;">*</span>Student Number:</label>
                    <input type="text" name="sid" id="sid" value="{$sid}">
                </div>
                <div class="form-row">
                    <label for="password"><span style="color:red;">*</span>Desired Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-row">
                    <label for="password_again"><span style="color:red;">*</span>Repeat Desired Password:</label>
                    <input type="password" name="password_again" id="password_again">
                </div>
                <div class="form-row">
                    <label for="email">Email Address:</label>
                    <input type="text" name="email" id="email" value="{$email}">
                </div>
                <div class="form-row">
                    <label for="phone">Mobile/Phone Number:</label>
                    <input type="text" name="phone" id="phone" value="{$phone}">
                </div>
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="token" value="{$token|default:""}">
                <input class="button submit-button" type="submit" value="Register">
            </form>
        </p>
    </div>
{/block}
