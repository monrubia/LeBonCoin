{* SMARTY *}

{foreach from=$adsSide item=adSide}
    <tr><td><ul>
        <li class="photo">
            {if (strlen($adSide->getPhoto()) > 0)}
                <img src='{$adSide->getPhoto()}'>
            {else}
                <img src='assets/image/noPhoto.jpg'>
            {/if}</li>
        <li class="title">{$adSide->getTitle()}</li>
        <li class="price">{$adSide->getPrice()}</li>
        <li class="info">{$adSide->getType()}</li>
        <li class="info">{$adSide->getCity()}, {$adSide->getPostalcode()}</li>

        <li style="text-align:right"><a href='Ad-Display?id={$adSide->getID()}' method="GET" ><i class="fas fa-edit"></i></a>
        <a href='Ad-Delete?id={$adSide->getID()}'  method="GET" ><i class="fas fa-trash-alt"></i></a></li>   
    </ul></td></tr>
{/foreach} 