<?php if (!defined('THINK_PATH')) exit(); if(is_array($reviews)): foreach($reviews as $key=>$rs): ?><div class="review-item">
        <p>
            <span class="star small">
                <?php switch($rs['review_rate']): case "5": ?><span class="active" star="1"></span>
                        <span class="active" star="2"></span>
                        <span class="active" star="3"></span>
                        <span class="active" star="4"></span>
                        <span class="active" star="5"></span><?php break;?>
                    <?php case "4": ?><span class="active" star="1"></span>
                            <span class="active" star="2"></span>
                            <span class="active" star="3"></span>
                            <span class="active" star="4"></span>
                            <span class="" star="5"></span><?php break;?>
                    <?php case "3": ?><span class="active" star="1"></span>
                        <span class="active" star="2"></span>
                        <span class="active" star="3"></span>
                        <span class="" star="4"></span>
                        <span class="" star="5"></span><?php break;?>
                    <?php case "2": ?><span class="active" star="1"></span>
                        <span class="active" star="2"></span>
                        <span class="" star="3"></span>
                        <span class="" star="4"></span>
                        <span class="" star="5"></span><?php break;?>
                    <?php case "1": ?><span class="active" star="1"></span>
                        <span class="" star="2"></span>
                        <span class="" star="3"></span>
                        <span class="" star="4"></span>
                        <span class="" star="5"></span><?php break;?>
                    <?php case "0": ?><span class="" star="1"></span>
                        <span class="" star="2"></span>
                        <span class="" star="3"></span>
                        <span class="" star="4"></span>
                        <span class="" star="5"></span><?php break; endswitch;?>
            </span>
            <span class="review-title"><?php echo ($rs['review_title']); ?></span>
        </p>
        <p>
            <span class="gray-light">By </span><span class="review-by"><?php echo ($rs['review_create_username']); ?></span>  <span class="gray-light">on <?php echo (substr($rs['review_create_time'],0,16)); ?></span>
        </p>
        <p>
            <?php echo ($rs['review_content']); ?>
        </p>
    </div><?php endforeach; endif; ?>