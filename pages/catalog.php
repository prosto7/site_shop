<h2 class="mb-5 ml-2">Catalog page</h2>
<hr class="bg-info">
<?php

echo '<div id="result" class="row">';

$items = Item::getItems();
foreach ($items as $item) {
    $item->drawItem();
}

echo '</div>';


?>

<script>
function createCookie(ruser,id) {

    $.cookie(ruser,id,{expires:2, path: '/'});

}


</script>