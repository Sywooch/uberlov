<?php use_helper('Text'); ?>
<?php use_javascript('voting'); ?>


<?php include_partial('location/location', array('location' => $event->getLocation())) ?>
<div class="eventFull">
    <h2><?php echo $event->getDateTimeObject('date')->format('d.m.Y') ?> <?php echo $event->getName(); ?>
        <?php if ($sf_user->getProfile() == $event->getCreatedBy()): ?>
            <?php echo link_to(image_tag('/images/ui/edit.png'), 'event/edit?id=' . $event->getId()) ?>
        <?php endif; ?>
    </h2>
    <div class="rules">
        <h3>Регламент:</h3>
        <?php echo simple_format_text($event->getRules()); ?>
    </div>
    <div class="desctiption">
        <h3>Описание:</h3>
        <?php echo simple_format_text($event->getDescription()); ?>
    </div>
    <div class="users">
        <h3>Участники:</h3>
        <?php echo simple_format_text($event->getUsers()); ?>
    </div>
    <div class="meta">
        <?php include_partial('vote/vote', array('obj' => $event)); ?>
        <div>
            <a href="" id="goToReply">□</a>
            <?php include_partial('profile/addBy', array('added' => $event)); ?> | <a href="" class="commentShowAuthor" author="user<?php echo $event->getCreatedBy(); ?>">●</a>
        </div>
    </div>
</div>

<div class="tabPanel">
    <ul>
        <li><span href="#" id="tabComments" class="selected">Комментарии (<i id="commentCounter"><?php echo sizeof($comments); ?></i>)</span></li>
    </ul>
</div>

<?php include_partial('comment/tree', array('form' => $form, 'comments' => $comments)); ?>