<?php $product =  $this->registry['Post']; ?>

    <div class="product">
        <p class="id">№:<?php echo $product['id']?></p>
        <h4><?php echo $product['name_article']?></h4>
        <p>Опис:<span class="description"><?php echo $product['short_description']?></span> </p>
        <p><?php if(!$product['description'] > 0)?></p>
    </div>


