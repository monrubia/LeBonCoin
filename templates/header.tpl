{* Smarty *}
<!-- Header -->
<header>
    <a name="anchorHeader"></a>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="nav-link" href="Index-Show" style="font-size:150%; font-weight:bold; color: #ff6e39" class="navbar-brand">Le Bon Coin de Miriam</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#anchorHeader">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#anchorFooter">Footer</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="Ad-Show">Déposer un annonce</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="Ad-Search" method="GET" id="keyWord">
                <input class="form-control mr-sm-2" type="text" name="keyWord" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" id='searchBTN' value="Envoyer" >Search</button>
		    </form>
        </div>
    </nav>
</header>



