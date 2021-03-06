<?php if(!$sf_user->isAnonymous()): ?>
    <ul id="user_menu">
        <?php foreach ($menu as $menuItem): ?>
            <li<?php echo substr($menuItem['url'], 1) == $sf_request->getParameter('menu') ? ' class="selected"' : '' ?>>
                <a href="<?php echo url_for($menuItem['url']) ?>"><span class="label">
                    <span class="icon"><?php echo image_tag($menuItem['icon']); ?></span>
                    <strong><?php echo html_entity_decode($menuItem['title']); ?></strong>
                </span>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>