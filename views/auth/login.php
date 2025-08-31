<form class="content__form" action="login-action" method="POST">
    <?php if (!empty($error)): ?>
        <div class="error-message" style="color:red; margin-bottom:10px;">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <label class="content__form-label" for="title">Login</label>
    <input class="content__form-input" name="login" id="title" type="text">

    <label class="content__form-label" for="desc">Password</label>
    <input class="content__form-input" name="password" id="desc" type="password">

    <button id="submit_button" class="content__form-button" type="submit">Login</button>
</form>