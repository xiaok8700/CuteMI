<?php if (!defined('THINK_PATH')) exit();?> 
                   <ul class="list1">
                           <?php if(is_array($res2)): foreach($res2 as $key=>$bian): ?><li class="pro">
                                <a href="/CuteMi/index.php/Home/goodsdetail/index?gid=<?php echo ($bian["gid"]); ?>">
                                <img width="100px" height="120px" src="/CuteMi/Public/Uploads/<?php echo ($bian["pic"]); ?>">
                                </a>
                                <?php echo ($bian["gname"]); ?><br/>
                                <?php echo ($bian["price"]); ?>
                            </li><?php endforeach; endif; ?>
                    </ul>