<h2>管理メニュー</h2>
<ul>
    <li><a href="/admin/add/">記事の追加</a></li>
</ul>
<h2>記事の一覧</h2>
<!-- システムメッセージの表示に使用します -->
{$msg}
<dl>
{foreach $postslist as $post}
    <dt>{$post.created}</dt>
    <dd>
        <a href="/post/view/id_{$post.id}/">{$post.title}</a>
        <a href="/admin/edit/id_{$post.id}/">編集</a>/
        <a href="/admin/delete/id_{$post.id}/">削除</a></dd>
{/foreach}
</dl>