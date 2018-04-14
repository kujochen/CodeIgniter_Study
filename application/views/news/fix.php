
<!--用于显示表单验证的错误信息 -->
<?php echo validation_errors(); ?>

<!--由表单辅助函数提供的，用于生成 form 元素，并添加一些额外的功能
    form_open内链接等同<form action=‘链接’>;
-->
<?php echo form_open('news/fix/'.$news_item['id']); ?>

<label for="title">标题</label>
<input type="input" name="title" value="<?=$news_item['title']?>" /><br /><br />

<label for="text">文本</label>
<textarea name="text"><?=$news_item['text']?></textarea><br /><br />

<input type="submit" name="submit" value="修改新闻" />

</form>
<p><a href="<?php echo site_url('news/'); ?>">返回首页</a></p>