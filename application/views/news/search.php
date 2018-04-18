<?=site_url('news/search/'.$this->input->post('search'))?>

<ul class="list-group">
    <?php foreach ($result as $news_item): ?>
        <h4>
            <li class="list-group-item">
                <a href="<?=site_url('news/view/'.$news_item['id'])?>"><?=$news_item['id']?>.<?=$news_item['title']?></a>
                <a href="<?=site_url('news/fix/'.$news_item['id'])?>" class="btn btn-default">修改</a>
                <a href="<?=site_url('news/delete/'.$news_item['id'])?>" class="btn btn-default">删除</a>
            </li>
        </h4>
    <?php endforeach; ?>
</ul>
<nav>
<?=$page?>
</nav>
<p><a href="<?=site_url('news/')?>">返回首页</a></p>