<h2>Платная рыбалка</h2>
<?php use_helper('Text'); ?>
<?php use_javascript('voting'); ?>
<?php slot('title', 'Платная рыбалка') ?>
<?php $locations = $pager->execute(); ?>
<?php include_partial('location/location_list', array('locations' => $locations)); ?>
<?php $pager->display(); ?>