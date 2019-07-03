{* Smarty *}
<!DOCTYPE html>
<html lang="en">

    <head>
        <title>Ex LeBonCoin de MOI</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        {* Bootstrap core js *}
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        {* Bootstrap CSS *}
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <!--
	    <script type="text/javascript">
	    	$(document).ready(function() {
	    		/*$.ajax({
	    			url: 'Ad-ShowAjax',
	    			method: 'GET',
	    			success: function(resp) {
	    			}
	    		});
    
	    		$.get('Ad-ShowAjax', function(resp) {
	    			$('#ads').html(resp);
	    		});*/

	    		setInterval(function() {
				    $( "#loading" ).load( "Ad-ShowAjax" );
			    }, 1000);
	    	});
	    </script>

        id (in the search box for text) = 'query'
        id (btn for the search)         = 'searchBTN'
    -->


        <script type="text/javascript">
	    	$(document).ready(function() {
				    $( "#loading" ).load( "Ad-ShowAjax" );
                    $('#searchBTN').click(function(){
                        $('#loading').load('Ad-ShowAjax?query=' +$('#keyWord').val());
			    });
	    	});
	    </script>
    </head>

    <body>
        {* Header *}
        {include file='header.tpl'}

        <div class="container">
	        <div id="loading">En cours de chargement ... 
                <br>
                <i class="fas fa-spinner fa-spin fa-3x"></i>
            </div><br>
        </div>

        {*Footer*}
        {include file='footer.tpl'}
        <!--
        {*Bootstrap requirements*}
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        {* My scripts 
        <script src="scripts.js" type="text/javascript"></script>*}-->

    </body>
</html>