<form class="content__form" action="edit-action?id=<?= $args['appointment']->getId() ?>" method="POST">
    <label class="content__form-label" for="title">Title</label>
    <input class="content__form-input" name="title" id="title" type="text"
        value="<?= htmlspecialchars($args['appointment']->getTitle()) ?>">

    <label class="content__form-label" for="desc">Description</label>
    <textarea class="content__form-input" name="description" id="desc"><?= htmlspecialchars($args['appointment']->getDescription()) ?></textarea>

    <label class="content__form-label" for="date_time">Date and Time</label>
    <input type="datetime-local" name="date_time" class="content__form-input"
        value="<?= date('Y-m-d\TH:i', strtotime($args['appointment']->getDateTime())) ?>" required>

    <button class="content__form-button" type="submit">Update Appointment</button>
</form>