<div class="p-4">
<a href="%LINK%" class="post-link">
    %THUMBNAIL%
</a>
<div class="post-meta mt-2">

    <?php if($args['cat']): ?>
        <span class="post-cat"><a href="%CAT_LINK%">%CAT%</a></span>
    <?php endif; ?>

    <?php if($args['date']): ?>
        <time class="post-date">%DATE%</time>
    <?php endif; ?>

</div>

<h2 class="post-title mt-4"><a href="%LINK%">%TITLE%</a></h2>
</div>