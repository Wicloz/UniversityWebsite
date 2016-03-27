{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>Login</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="sid">Student Number:</label>
                    <input type="text" name="sid" id="sid" value="{$sid}">
                </div>
                <div class="form-row">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <input type="hidden" name="action" value="login">
                <input type="hidden" name="token" value="{$token|default:""}">
                <input class="button submit-button" type="submit" value="Login">
            </form>
        </p>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Register</h2>
        <p>
            <form action="" method="POST">
                <div class="form-row">
                    <label for="name">Full Name:</label>
                    <input type="text" name="name" id="name" value="{$name}">
                </div>
                <div class="form-row">
                    <label for="sid">Student Number:</label>
                    <input type="text" name="sid" id="sid" value="{$sid}">
                </div>
                <div class="form-row">
                    <label for="password">Desired Password:</label>
                    <input type="password" name="password" id="password">
                </div>
                <div class="form-row">
                    <label for="password_again">Repeat Desired Password:</label>
                    <input type="password" name="password_again" id="password_again">
                </div>
                <input type="hidden" name="action" value="register">
                <input type="hidden" name="token" value="{$token|default:""}">
                <input class="button submit-button" type="submit" value="Register">
            </form>
        </p>
    </div>
{/block}
