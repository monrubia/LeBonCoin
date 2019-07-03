<html>
	<head>
        <title>Le Bon Coin de Miriam, New Ads</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta charset='utf-8'>
        <link rel="stylesheet" type="text/css" href="assets/css/style.css">
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
					<h1>New Ad</h1>
					<h2>Creat an ad in LeBonCoin</h2>	
					<form id="formToRegister" action="Ad-Post" method="POST">
						<p>
							<label for="title">Property description</label>
							<input type="text" name="title" placeholder="Short description" />
						</p>
						<p>
							<label for="photo">Photo</label>
							<input type="text" name="photo" placeholder="string of url" />
						</p>
						<p>
							<label for="price">Price</label>
							<input type="int" name="price" placeholder="price in €" />
						</p>
						<p>
							<label for="date">Appearing date</label>
							<input type="date" name="date" placeholder="" />
						</p>
						<p>
							<label for="postalcode">Postalcode</label>
							<input type="int" name="postalcode" placeholder="postalcode" />
						</p>
						<p>
							<label for="city">City</label>
							<input type="text" name="city" placeholder="City" />
						</p>
						<section class="">
   							<span>In which database do you want to appear? PAP or LeBonCoin?</span>
   							<br>
   							<input type="radio" name="adKind" id="pap" value="pap">
   							<label for="pap">PAP</label>
   							<input type="radio" name="adKind" id="leboncoin" value="leboncoin">
   							<label for="leboncoin">Le Bon Coin</label>
						</section>
						<input type="submit" value="Envoyer" />
					</form>
				</div>
			<div class="col-lg-4 sideForm">
			</div>
		</div>
		{* Footer *}
		{include file="footer.tpl"}
    </body>
</html>