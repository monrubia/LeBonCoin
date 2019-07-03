{* SMARTY *}

{*{if isset($smarty.get.adUpdated) and $smarty.get.adUpdated}
	<div class="alert alert-success" role="alert"> L'annonce a été mise à jour. </div>
{/if}*}


{foreach from=$adsMain item=adMain}
    <tr>
        <td><ul><li class="photo">
           {if (strlen($adMain->getPhoto()) > 0)}
                <img src='{$adMain->getPhoto()}'>
            {else}
                <img src='assets/image/noPhoto.jpg'>
            {/if}</li></ul>
        </td>
        
        <td class="infoPart">
            <ul>
                <li class="title">{$adMain->getTitle()}</li>
                <li class="price">{$adMain->getPrice()}</li>
                <li class="info">{$adMain->getType()}</li>
                <li class="info">{$adMain->getCity()}, {$adMain->getPostalcode()}</li>
                <li class="info">{$adMain->getDate()}</li>
                <li style="text-align:right"><a href='Ad-Display?id={$adMain->getID()}' method="GET" ><i class="fas fa-edit"></i></a>
                <a href='Ad-Delete?id={$adMain->getID()}'  method="GET" ><i class="fas fa-trash-alt"></i></a></li>  
            </ul>
        </td>
    </tr>
{/foreach}
