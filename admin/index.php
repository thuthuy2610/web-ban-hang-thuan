<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $category = $db->fetchAll("category");
 ?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
    <h1>Blank Page</h1>
    <hr>
    <p>This is a great starting point for new custom pages.</p>
</div>
<?php require_once __DIR__. "/layouts/footer.php"; ?>