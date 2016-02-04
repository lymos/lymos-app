<?php if (!defined('THINK_PATH')) exit(); if(is_array($reviews)): foreach($reviews as $key=>$rs): ?><tr>
        <th width="2%" class="reviewer">
            <div class="reviewer_box">
                <p class="reviewer_pic default_reviewer_pic"></p>
                <div class="reviewer_info">
                    <div class="reviewer_name"><?php echo ($user_data[$rs['review_create_userid']]); ?></div>
                    <div class="reviews_star"><div id="fixed_311215"></div></div>
                </div>
            </div>
        </th>
        <td width="98%" class="reviews_details">
            <ul>
                <li class="reviews_details_title">
                    <?php echo ($rs['review_title']); ?>
                </li>
                <li class="review_rate">
                    <div class="star">
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
                                                </div>
                                            </li>
                <li class="reviews_info">
                    <?php echo ($rs['review_content']); ?>
                </li>
                <li class="reviews_date"><?php echo ($rs['review_create_time']); ?></li>
            </ul>
        </td>
    </tr><?php endforeach; endif; ?>