<a href="/admin/">>戻る</a>
<h2>記事の追加</h2>
{{$msg}}
<form action="" method="post">
<table>
	<tr><th>タイトル</th><td>{{$form.title}}</td>
	<tr><th>本文</th><td>{{$form.body}}</td>
</table>
{{$form.button}}
</form>