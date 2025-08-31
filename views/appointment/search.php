<form class="content__form" action="search-action" method="POST">
    <?php if (!empty($error)): ?>
        <div class="error-message" style="color:red; margin-bottom:10px;">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>
    
    <label class="content__form-label" for="search">Search by Title</label>
    <input class="content__form-input" name="search" id="search" type="text">
    <button id="submit_button" class="content__form-button" type="submit">Search</button>
</form>