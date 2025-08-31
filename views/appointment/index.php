<div class="content__body">
    <?php for ($i = 0; $i < count($args['appointments']); $i++) : ?>
        <div class="content__post">
            <h1 class="content__post-title"><?= $args['appointments'][$i]->getTitle() ?></h1>

            <p class="content__post-datetime"><?= $args['appointments'][$i]->getDateTime() ?></p>

            <p class="content__post-desc"><?= $args['appointments'][$i]->getDescription() ?></p>

            <div class="content__post-actions">
                <a class="content__post-edit" href="edit?id=<?= $args['appointments'][$i]->getId() ?>">Edit</a>
                <a class="content__post-delete" href="delete-action?id=<?= $args['appointments'][$i]->getId() ?>">Delete</a>
                <?php if (!$args['appointments'][$i]->isFinished()): ?>
                    <a class="content__post-finish" href="finish-action?id=<?= $args['appointments'][$i]->getId() ?>">Mark as Finished</a>
                <?php endif; ?>
            </div>
        </div>
    <?php endfor; ?>
</div>