@extends('layout')

@section('content')
	<div class="page-header">
		<h3>Latest News</h3>
	</div>

	<div class="news">
		@include('layouts.news')
	</div>
@stop

@section('scripts')

	<script type="text/javascript">

		var cache = [];

		function getPosts(page) {

			for(var i = 0; i <= cache.length - 1; i++){
				if(cache[i]['page'] == page){
					$('.news').html(cache[i]['data']);
					return;
				}
			}
			
			$.ajax({
				url : '?page=' + page,
				dataType: 'json',
			}).done(function (data) {
				$('.news').html(data);
				cache.push({page : page, data : data});
			}).fail(function () {
				alert('News could not be loaded.');
			});


		}

		$(document).on('click', '.pagination a', function (e) {
			getPosts($(this).attr('href').split('page=')[1]);
			e.preventDefault();
		});

	</script>

@stop
