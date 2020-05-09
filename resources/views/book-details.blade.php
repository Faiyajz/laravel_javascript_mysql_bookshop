@extends('layouts.frontend')

@section('content')

	@include('includes.book')

@endsection

@section('scripts')
	<script type="text/javascript">
		$(document).ready(function(){
			$('.book-coverphoto').click(function(){
				Swal.fire({
					imageUrl: '{{ $book->preview_page }}',
					imageAlt: 'Preview',
					customClass: {
					confirmButton: 'btn btn-primary btn-lg'
					},
					buttonsStyling: false
				});
			}); 	
		});
	</script>
@endsection

