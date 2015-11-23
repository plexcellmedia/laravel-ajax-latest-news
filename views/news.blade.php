@if(count($news) <= 0)
	<p>Sorry... There is no news yet!</p>
@else

	@foreach ($news as $article)
	<div class="article">
		<div class="page-header">
			<h4>{{{ $article->title }}}</h4>
		</div>

		<p> {{{ $article->content }}}</p>
		<small class="pull-right">Posted: {{ $article->ts }}</small>
	</div>
	@endforeach

	<div class="pull-right pagination-red">
		{{ $news->links() }}
	</div>
@endif
