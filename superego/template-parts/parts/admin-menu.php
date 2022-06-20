<? if (is_user_logged_in()) : ?>
    <!-- Admin edit -->
    <div id="editMenu">
        <div id="openEdit" class="menuItem">
            <?= svg_image('more'); ?>
        </div>
        <div id="extraMenu">
            <a id="editPage" href="/wp-admin/" class="menuItem">
                <?= svg_image('settings'); ?>
                <p class="tooltip">Kontrolpanel</p>
            </a>
            <a id="controlPanel" href="/wp-admin/post.php?post=<?= get_the_ID(); ?>&action=edit" class="menuItem">
                <?= svg_image('edit'); ?>
                <p class="tooltip">Redigér</p>
            </a>
        </div>
    </div>
    <!-- Admin edit end -->
<? endif; ?>