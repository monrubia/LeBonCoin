<html>
	<head>
        <title>LBC de Miriam, Update Entry</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
		<!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
		
		<script type="text/javascript">

			$(document).ready( function() {
				$('#alertBox').hide();
				$('#submitBTN').click( function() {
					var values = $('#updateForm').serialize();
					$.ajax({
						url			: 'Ad-updateAjax',
						method		: 'POST',
						data		: values,
						success		: function(resp) {
							var json = $.parseJSON(resp);
							if (json.success) {
								//DISPLAY SUCCESS MESSAGE
								$('#alertBox').addClass('alert-success');
								$('#alertBox').html('Annonce mise à jour');
							} else {
								//DISPLAY ERROR MESSAGE
								$('#alertBox').addClass('alert-danger');
								$('#alertBox').html('Annonce non mise à jour');
							}

							$('#alertBox').fadeIn();

							setTimeout(function() {
								$('#alertBox').fadeOut();
							}, 3000);
						},
						error		: function(err) {
							console.log(err);
						}
					});
					return false;
				});
			});
		</script>

    </head>
    <body>
	{* Header *}
	{include file="header.tpl"}

	{* Main *}
		<div class="container-fluid">
            <div class="row">
				<div class="col-lg-4 sideForm">
				</div>
                <div class="col-lg-4 formToRegister">
					<h2>Mis à jour de ton annonce</h2>
					<br />
					<div class="alert" id="alertBox"></div>
					<br />

					{if $saved}<div class="alert alert-success" role="alert"> L'annonce a été mise à jour. </div>{/if}

					    <form id="updateForm" {*action="Ad-Update"*} method="POST">
							<input type="hidden" name="ID" value="{$ad->getID()}"/>
							<div class="form-group">
								<label for="title">Property description</label>
					    		<input class="form-control" type="text" name="title" value="{$ad->getTitle()}" placeholder="Short description"/>
							</div>
							<div class="form-group">
								<label for="photo">photo</label>
					    		<input class="form-control" type="text" name="photo" value="{$ad->getPhoto()}" placeholder="string of url"/>
							</div>
							<div class="form-group">
								<label for="type">Type</label>
					    		<input class="form-control" type="text" name="type" value="{$ad->getType()}" placeholder="Property type"/>
							</div>
							<div class="form-group">
								<label for="price">Price</label>
					    		<input class="form-control" type="int" name="price" value="{$ad->getPrice()}" placeholder="price €"/>
							</div>
							<div class="form-group">
								<label for="date">Appearing date</label>
					    		<input class="form-control" type="date" name="date" value="{$ad->getDate()}" placeholder="date"/>
							</div>
							<div class="form-group">
								<label for="postalcode">Postalcode</label>
					    		<input class="form-control" type="int" name="postalcode" value="{$ad->getPostalcode()}" placeholder="postalcode"/>
							</div>
							<div class="form-group">
								<label for="city">City</label>
					    		<input class="form-control" type="text" name="city" value="{$ad->getCity()}" placeholder="city"/>
							</div>
						{*	<section class="form-group">
   								<span>In which database do you want to appear?</span>
   								<br>
   								<input type="radio" name="adKind" id="pap" value="pap" {if ($ad->adKind()) eq 'pap'} checked {/if}>
   								<label for="pap">PAP</label>
   								<input type="radio" name="adKind" id="leboncoin" value="leboncoin" {if ($ad->adKind()) neq 'pap'} checked {/if}>
   								<label for="leboncoin">Le Bon Coin</label>
							</section>
						*}
							{*<input type="submit" value="Envoyer"/>*}
							<button id="submitBTN">Envoyer</button>
					    </form>
				</div>
			<div class="col-lg-4 sideForm">
			</div>
    	</div>
		{* Footer *}
		{include file="footer.tpl"}
	
	</body>
</html>


