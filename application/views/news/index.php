<div class="input-group">
    <!--news/search/ -->
    <?php echo form_open('news/search/'); ?>
        <input type="text" placeholder="Search for..." name="search">
        <input type="submit" name="submit" value="搜索新闻" class="btn btn-default btn-sm">
    <?=form_error('search', '<div class="error">', '</div><br />')?>
    </form>
</div>
<ul class="list-group">
<?php foreach ($news as $news_item): ?>
    <h4>
        <li class="list-group-item">
            <a href="<?=site_url('news/view/'.$news_item['id'])?>"><?=$news_item['id']?>.<?=$news_item['title']?></a>
            <a href="<?=site_url('news/fix/'.$news_item['id'])?>" class="btn btn-default">修改</a>
            <a href="<?=site_url('news/delete/'.$news_item['id'])?>" class="btn btn-default">删除</a>
        </li>
    </h4>
<?php endforeach; ?>
</ul>
<p><a href="<?=site_url('news/create')?>"><button class="btn btn-default">新增新闻</button></a></p>

<nav>
    <?=$page?>
</nav>
