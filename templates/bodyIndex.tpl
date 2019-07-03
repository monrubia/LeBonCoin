{* Smarty *}
{if isset($smarty.get.adUpdated) and $smarty.get.adUpdated}
	<div class="alert alert-success" role="alert"> L'annonce a été mise à jour. </div>
{/if}

    <body>
        <!-- Main body -->
        <main role="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 col-xs-12">
                        <table class="mainTable">
                            {* script including the loop producing rows with the LBC info from the main table *}
                            {include file='mainTableRowLoop.tpl'} 
                        </table>
                    </div>

                    {* side table, not displayed in small devices *}
                    <div class="col-lg-2 d-none d-md-block">
                        <table class="sideTable">
                            {* script including the loop producing rows with the LBC info from the side table *}
                            {include file='sideTableRowLoop.tpl'}
                        </table>
                    </div>
                </div>
            </div>
        </main>
    </body>
