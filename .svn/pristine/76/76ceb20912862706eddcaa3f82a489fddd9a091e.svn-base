<?php if (!defined('THINK_PATH')) exit();?><div class="site-header">
    <div class="container">
        <div class="header-logo">
            <a  class="logo" href="/CuteMi/index.php/Home/index/index" title="小米官网">
                <img src="/CuteMi/Public/home/images/logo.png">
            </a>
                    </div>
        <div class="header-nav">
<!------------------------------- 导航栏部分 -------------------------------------->
            <ul class="nav-list J_navMainList clearfix">
                <li id="J_navCategory" class="nav-category">
                    <a href="" style="text-align:center;line-height:70px"><span class="text">全部商品分类</span>
                    </a>
                </li>
  <!------------------------------------------- 导航栏部分 -------------------------------->
                      <!-- 商品导航-->
                      <?php if(is_array($nav1)): foreach($nav1 as $key=>$nav1): ?><li class="nav-item" id="nav">
                           <a  class="link" href="/CuteMi/index.php/Home/product/index/typeid/<?php echo ($nav1["typeid"]); ?>">
                            <span class="text"><?php echo ($nav1["tname"]); ?></span><span class="arrow"></span>
                          </a>
                       </li><?php endforeach; endif; ?>

                      <!-- 附件商品导航 -->
                      <?php if(is_array($nav2)): foreach($nav2 as $key=>$nav2): ?><li class="nav-item" id="nav1">
                           <a  class="link" href="/CuteMi/index.php/Home/product/attproduct/attid/<?php echo ($nav2["attid"]); ?>">
                            <span class="text"><?php echo ($nav2["attname"]); ?></span><span class="arrow"></span>
                          </a>
                       </li><?php endforeach; endif; ?>
  <!------------------------------------------- 导航栏部分结束 -------------------------------->
                   <li class="nav-item" id="nav2">
                      <a class="link" href="/CuteMi/index.php/Home/coupun/index" target="_blank" ><span class="text">优惠券</span></a>
                   </li>
                </ul>
        </div>

<!--------------------------------------- 搜索功能 ------------------------------------------>
        <div class="header-search">
            <form id="J_searchForm" class="search-form clearfix" action="/CuteMi/index.php/Home/index/search" method="get">
                <label for="search" class="hide">站内搜索</label>
                <input class="search-text" id="search" name="gname"  type="search">
                <input class="search-btn iconfont" value="" type="submit">
               
           </form>
        </div>
<!--------------------------------------- 搜索功能结束 ------------------------------------------>

    </div>
    <div id="J_navMenu" class="header-nav-menu" style="display: none;">
        <div class="container"></div>
    </div>
</div>