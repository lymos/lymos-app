<?php if (!defined('THINK_PATH')) exit();?>
<?php if(is_array($product)): foreach($product as $key=>$rs): ?><li class="product_slider_item">
        <div class="product_slider_item_pic prodict-img">
            <a href="/productinfo/<?php echo ($rs['item_id']); ?>" title="<?php echo ($rs['item_title']); ?>">
                <img src="/image_create.php?big_img=<?php echo ($rs['image_sku']); ?>&item_id=<?php echo ($rs['item_id']); ?>&size=product_list" alt="<?php echo ($rs['item_title']); ?>">
            </a>
        </div>
        <!--
        <p class="product_slider_color">
        </p>
        -->
        <div class="product_slider_item_txt prodict-text">
            <h3>
                <a href="/productinfo/<?php echo ($rs['item_id']); ?>" title="<?php echo ($rs['item_title']); ?>"><?php echo ($rs['item_title']); ?></a>
            </h3>
            <p></p>
            <?php if(is_array($attr_detail[$rs['item_id']])): foreach($attr_detail[$rs['item_id']] as $attr_name=>$attr): ?><p style="padding-top: 4px;">
                    <label><?php echo ($attr_name); ?>: </label>
                    <?php if(is_array($attr)): foreach($attr as $key=>$val): ?><span><?php echo ($val); ?>&nbsp;&nbsp;</span><?php endforeach; endif; ?>
                </p><?php endforeach; endif; ?>
        </div>
    </li><?php endforeach; endif; ?>