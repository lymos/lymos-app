<?php if (!defined('THINK_PATH')) exit(); if(is_array($reviews)): foreach($reviews as $key=>$rs): ?><div id="comment-<?php echo ($rs['review_id']); ?>" class="customer_comment_item">
        <div class="customer_comment_user">
            <div class="customer_comment_pic">
                <img src="/image/person.png">
            </div>
            <p class="customer_comment_u_name">
                <a><?php echo ($user_data[$rs['review_create_userid']]); ?></a>
            </p>        
        </div>        
        <div class="customer_comment_ask">    
            <h5 class="customer_comment_title"><?php echo ($rs['review_title']); ?></h5>      
            <div class="customer_comment_ask_content">
                <?php echo ($rs['review_content']); ?>
            </div>  
            <div class="customer_comment_date_ask">
                <span class="comment_dates"><?php echo ($rs['review_create_time']); ?></span>
            </div>
        </div>
    </div><?php endforeach; endif; ?>