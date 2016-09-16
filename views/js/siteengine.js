function auth( url ) {
	$('#authModal #vk_auth').attr( 'href', url );
	$('#authModal').modal('show');
}