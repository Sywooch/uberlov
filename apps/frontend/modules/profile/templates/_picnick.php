<?php echo link_to(image_tag($profile->getUserpic() ? '/images/userpic/' . $profile->getUserpic() : '/images/userpic/' . ($profile->getSex() ? 'male' : 'female') . '.png'), 'profile/show?id=' . $profile->getId(), array('class' => 'userpic')); ?> <?php echo link_to($profile->getNickName(), 'profile/show?id=' . $profile->getId()); ?>