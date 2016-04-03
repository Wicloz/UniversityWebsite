{extends file="../main.tpl"}
{block name=content_center}
    <div class="paragraph-center col-sm-12">
        <h2>User Information:</h2>
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
                <label for="email">Email Address:</label>
                <input type="text" name="email" id="email" value="{$email}">
            </div>
            <div class="form-row">
                <label for="phone">Mobile/Phone Number:</label>
                <input type="text" name="phone" id="phone" value="{$phone}">
            </div>
            <input type="hidden" name="action" value="update_info">
            <input type="hidden" name="token" value="{$token|default:""}">
            <input class="button submit-button" type="submit" value="Update">
        </form>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Change Password:</h2>
        <form action="" method="POST">
            <div class="form-row">
                <label for="password">Current Password:</label>
                <input type="password" name="password_current" id="password">
            </div>
            <div class="form-row">
                <label for="password">Desired Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div class="form-row">
                <label for="password_again">Repeat Desired Password:</label>
                <input type="password" name="password_again" id="password_again">
            </div>
            <input type="hidden" name="action" value="update_pass">
            <input type="hidden" name="token" value="{$token|default:""}">
            <input class="button submit-button" type="submit" value="Update">
        </form>
    </div>
    <div class="paragraph-center col-sm-12">
        <h2>Logout</h2>
        <form action="" method="POST">
            <input type="hidden" name="action" value="logout">
            <input type="hidden" name="token" value="{$token|default:""}">
            <input class="button submit-button" type="submit" value="Log out">
        </form>
    </div>
{/block}
