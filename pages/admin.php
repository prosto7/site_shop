<h2 class="mb-5 ml-2">Admin Forms</h2>
<hr class="bg-info">

<?php

if (!isset($_POST['addbtn'])) {
?>
<form action="index.php?page=4" method="post" enctype="multipart/form-data">
  <!-- тут должна быть селект для выбора категории товара -->
<div class="form-group">
  <label for="category">
  <select name="catid" id="category">

    <?php

    $pdo = Tools::connect();
    $ps = $pdo->query("SELECT * FROM categories");
    while ($row = $ps->fetch()) {
      echo "<option value='{$row["id"]}'>{$row['category']}</option>";
    }

    ?>

  </select>
  <input type="text" name="cat_name" id="cat_name" placeholder="Категория">
  <input type="submit" name="add_cat" id="add_cat" value="Добавить" class="btn btn-sm btn-primary">
  <input type="submit" name="del_cat" value="Удалить" value="Удалить" class="btn btn-sm btn-danger">
  </label>

  <?php

  // добавление категории 

  if (isset($_POST['add_cat'])) {
            try {
            $pdo = Tools::connect();
            $ps = $pdo->prepare("INSERT INTO categories(category) VALUES (:cat_name)");
            $ps->bindParam(':cat_name', $cat_name);
            $cat_name = $_POST['cat_name'];
            $ps->execute();
            }
              catch (PDOException $e) {
                echo $e->getMessage();
                return false;
          }
          echo '<script>window.location=document.URL</script>';
        }
  
        // удаление категории бета в
      //   if (isset($_POST['del_cat'])) { 
      //    try {
      //     $catid=  $_POST['catid'];
      //     $pdo = Tools::connect();
      //     $del= "DELETE FROM categories WHERE id =:catid"; 
      //     $stmt =$pdo->prepare($del);
      //     $stmt->bindParam(':catid',$catid);
      //     $stmt->execute();
      //     }
      //       catch (PDOException $e) {
      //         echo $e->getMessage();
      //         // return false;
      //   }
      //   // echo '<script>window.location=document.URL</script>';
      // }

?>

</div>
  <div class="form-group">

    <label for="name">Name:
      <input type="text" name="name" id="name">
    </label>
  </div>

  <div class="form-group">
    <p>Входящая цена и цена продажи</p>
    <label for="pricein">Pricein:
      <input type="number" name="pricein" id="pricein">
    </label>
    <label for="pricesale">Pricesale:
      <input type="number" name="pricesale" id="pricesale">
    </label>
    <div class="form-group">
      <label for="info">Info:
        <textarea name="info" id="info" cols="50" rows="5"></textarea>
      </label>
    </div>
    <div class="form-group">
      <label for="imagepath">Image:
        <input type="file" accept="image/*" name="imagepath"  id="imagepath">
      </label>
    </div>
  </div>

<input type="submit" class="btn btn-primary" name="addbtn" value="Add good">
</form>

<?php 

} else {
  if(is_uploaded_file($_FILES['imagepath']['tmp_name'])) {
    $path = "images/goods/".$_FILES['imagepath']['name'];
    move_uploaded_file($_FILES['imagepath']['tmp_name'], $path);
  }
  $item = new Item(trim($_POST['name']),$_POST['catid'], $_POST['pricein'], $_POST['pricesale'],$_POST['info'], $path);
  $item->intoDb();
}

?>