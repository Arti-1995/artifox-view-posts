<div class="artifox-view-post">
    <div class="artifox-view-post__wrapper">
        <div class="artifox-view-post__list">
            <?php foreach ($data as $d): ?>
                <div
                        class="artifox-view-post__item"
                        data-permalink="<?= $d['permalink'] ?>"
                        data-title="<?= $d['title'] ?>"
                        data-image="<?= $d['image'] ?>"
                        data-date="<?= $d['date'] ?>"
                        data-description="<?= $d['description'] ?>"
                >
                    <div class="artifox-view-post__thumbnail">
                        <picture>
                            <?php if (isset($d['image']) && !empty($d['image'])): ?>
                                <img
                                        src="<?= $d['image'] ?>"
                                        alt="<?= $d['title'] ?>"
                                        class="artifox-view-post__image"
                                />
                            <?php endif; ?>
                        </picture>
                    </div>
                    <div class="artifox-view-post__header">
                        <h3 class="artifox-view-post__title"><?= $d['title'] ?></h3>
                        <p class="artifox-view-post__date"><?= $d['date'] ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>