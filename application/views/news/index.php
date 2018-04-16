<ul class="list-group">
<?php foreach ($news as $news_item): ?>
    <h4>
        <li class="list-group-item">
            <a href="<?=site_url('news/'.$news_item['id'])?>"><?=$news_item['id']?>.<?=$news_item['title']?></a>
            <a href="<?=site_url('news/fix/'.$news_item['id'])?>" class="btn btn-default">修改</a>
            <a href="<?=site_url('news/delete/'.$news_item['id'])?>" class="btn btn-default">删除</a>
        </li>
    </h4>
<?php endforeach; ?>
</ul>
<p><a href="<?=site_url('news/create')?>"><button class="btn btn-default">新增新闻</button></a></p>
<nav>
    <ul class="pagination">
        <li>
            <a href="#">
                <span>&laquo;</span>
            </a>
        </li>
        <li><a href="#">首页</a></li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li><a href="#">尾页</a></li>
        <li>
            <a href="#">
                <span>&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
