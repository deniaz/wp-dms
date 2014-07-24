<div class="wrap mod-dms-options">
    <h2><?= $title; ?></h2>

    <ul class="subsubsub">
        <li class="all">
            <a href="#" class="current">
                <?= $tabs['all']['text']; ?>

                <span class="count">
                    (<?= $tabs['all']['count']; ?>)
                </span>
            </a>
            |
        </li>
        <li class="active">
            <a href="#">
                <?= $tabs['active']['text']; ?>

                <span class="count">
                    (<?= $tabs['active']['count']; ?>)
                </span>
            </a>
            |
        </li>
        <li class="inactive">
            <a href="#">
                <?= $tabs['inactive']['text']; ?>

                <span class="count">
                    (<?= $tabs['inactive']['count']; ?>)
                </span>
            </a>
        </li>
    </ul>

    <form method="post" action="">
        <?php //@TODO: NONCE! ?>

        <table class="form-table">
            <tbody>
            <tr>
                <td>
                    <span class="record-flag is-active">Active</span>
                    <div class="domain">
                        <input type="text" value="example.org" class="regular-text url-input">
                    </div>
                </td>
                <td>
                    <div class="page">
                        <a href="#">A Frickin' Page</a>
                    </div>
                </td>
                <td>
                    <span class="link">
                        <span class="dashicons dashicons-admin-links"></span>
                        <a href="#"> Link</a>
                    </span>

                    <span class="link">
                        <span class="dashicons dashicons-no"></span>
                        <a href="#">Deactivate</a>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="record-flag is-active">Active</span>
                    <div class="domain">
                        <input type="text" value="example.org" class="regular-text url-input">
                    </div>
                </td>
                <td>
                    <div class="page">
                        <a href="#">A Frickin' Page</a>
                    </div>
                </td>
                <td>
                    <span class="link">
                        <span class="dashicons dashicons-admin-links"></span>
                        <a href="#"> Link</a>
                    </span>

                    <span class="link">
                        <span class="dashicons dashicons-no"></span>
                        <a href="#">Deactivate</a>
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="record-flag is-active">Active</span>
                    <div class="domain">
                        <input type="text" value="example.org" class="regular-text url-input">
                    </div>
                </td>
                <td>
                    <div class="page">
                        <a href="#">A Frickin' Page</a>
                    </div>
                </td>
                <td>
                    <span class="link">
                        <span class="dashicons dashicons-admin-links"></span>
                        <a href="#"> Link</a>
                    </span>

                    <span class="link">
                        <span class="dashicons dashicons-no"></span>
                        <a href="#">Deactivate</a>
                    </span>
                </td>
            </tr>
            </tbody>
        </table>

        <p class="submit">
            <input type="submit" name="submit" id="submit" class="button button-primary" value="<?= $submitButton; ?>">
        </p>

    </form>

    <div class="clear"></div>
</div>