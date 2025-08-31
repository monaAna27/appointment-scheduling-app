<form class="content__form" action="add-action" method="POST">
    <?php if (!empty($error)): ?>
        <div class="error-message" style="color:red; margin-bottom:10px;">
            <?= htmlspecialchars($error) ?>
        </div>
    <?php endif; ?>

    <label class="content__form-label" for="title">Title</label>
    <input class="content__form-input" name="title" id="title" type="text">
    <label class="content__form-label" for="desc">Description</label>
    <textarea class="content__form-input" name="description" id="desc"></textarea>
    <label class="content__form-label" for="date_time">Date and Time</label>
    <input type="datetime-local" name="date_time" class="content__form-input" required>
    <button id="submit_button" class="content__form-button" type="submit">Add Appointment</button>
</form>