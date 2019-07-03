{foreach from=$adsLBC item=ad}
	<ul>
    	<li>{$ad->getTitle()}</li>
		<li>{$ad->getPrice()}</li>
		<li>{$ad->getDate()}</li>
		<li>{$ad->getCity()}</li>
	</ul>
{/foreach}
