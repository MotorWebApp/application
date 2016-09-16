function auth( e, url ) {
	e.preventDefault();
	$('#authModal #vk_auth').attr( 'href', url );
	$('#authModal').modal('show');
}