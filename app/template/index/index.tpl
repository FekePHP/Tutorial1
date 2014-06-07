<h2>記事の一覧</h2>
<dl>
{foreach $postslist as $post}
    <dt>{$post.created}</dt>
    <dd><a href="/post/view/id_{$post.id}/">{$post.title}</a></dd>
{/foreach}
</dl>