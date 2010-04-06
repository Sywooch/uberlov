<?php include_partial('collector/map') ?>
<?php use_javascript('locationShow');  ?>
<script>
    app.locationShow = {
        "id": "<?php echo $location->getId(); ?>",
        "lat": "<?php echo $location->getLatitude(); ?>",
        "lng": "<?php echo $location->getLongitude(); ?>"
    }
</script>

<div>
    <h1><a class="dashed" href="" id="locationName"><?php echo $location->getName(); ?></a></h1>
    <div>depth: <?php echo $location->getDepth(); ?></div>
    <div>flow: <?php echo $location->getLocationFlow(); ?></div>
    <div>fundus: <?php echo $location->getLocationFundus(); ?></div>
    <div>relief: <?php echo $location->getLocationRelief(); ?></div>
    <div>description: <?php echo $location->getDescription(); ?></div>
    <div>added qweqwe, <?php echo $location->getDateTimeObject('created_at')->format('d.m.Y'); ?></div>    
</div>
<div class="tabPanel">
    <ul>
        <li><span href="#" id="tabComments" class="selected">comments (<i id="commentCounter"><?php echo sizeof($comments); ?></i>)</span></li>
        <li><span href="#" id="tabReports">reports (5)</span></li>
    </ul>
</div>
<?php include_partial('vote/vote', array('obj' => $location,'objType' => 'location')); ?>

<br />


<?php use_javascript('comment');  ?>
<div id="commentContainer">
    <?php foreach ($comments as $comment):?>
        <?php include_partial('comment/comment', array('comment' => $comment)); ?>
    <?php endforeach; ?>
    <?php $cl = new CommentLocation();$cl->setLocation($location->getRawValue())  ?>
    <?php include_partial('comment/form', array('form' => new CommentLocationForm($cl),'toward' => 'location')) ?>

</div>
<div id="commentReplyDefault" style="display:none">
    <a href="">Reply</a>
</div>