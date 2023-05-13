<div class="product-card">
    <input type="checkbox" name= <?= "{$product['id']}" ?> class="delete-checkbox" value= <?= $product['id'] ?>>
        <p style="font-size: large; font-weight: bold;"> <?= $product['sku'] ?> </p>
        <p> <?= $product['name'] ?></p>
        <p> <?= $product['price'] ?> $</p>
        <p> <?= $product['properties'] ?></p>                     
</div>
