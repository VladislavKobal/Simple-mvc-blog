<?php

$customers =  $this->registry['User'];
if(empty($_SESSION['name'])){
    echo "Вибачте, але ви не можете переглядати ці дані.";
}
else {

foreach($customers as $customer)  :
?>

    <div class="product">
        <p> Прізвище: <?php echo $customer['last_name']?></p>
        <p> Ім'я: <?php echo $customer['first_name']?></p>
    </div>
<?php endforeach; 

}?>

