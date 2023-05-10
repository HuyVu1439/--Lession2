<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Document</title>
</head>

<body>
  <div class="container">
    <form action="?action=productUpdate" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <h5>Add new product</h5>
        <input type="hidden" name="ID" value="<?php echo $each->get_ID() ?>">
        <label for="nameProduct">Product name</label>
        <input type="text" class="form-control col-6" id="productName" name="productName"
          value="<?php echo $each->get_ProductName() ?>">
        <div class="form-group">
          <label for="exampleFormControlSelect1">Category</label>
          <div>
            <select class="form-control col-6" name="categoryID">
              <?php foreach ($categ as $a): ?>
                <option value="<?php echo $a->get_ID() ?>"><?php echo $a->get_CategoryName() ?></option>
              <?php endforeach; ?>
            </select>
          </div>
        </div>
        <div class="form-group">

          <label for="name">Product image</label>
          <div>
            <input type="file" class="form-control col-6" id="file-upload" name="productImage">
          </div>
          <!-- </br>
    <div style="width:300px;height:300px" id="image">
        <img class="text-center" src="https://kynguyenlamdep.com/wp-content/uploads/2019/12/hinh-anh-hoa-hong-dep-va-y-nghia.jpg" alt="Ảnh" style="width:100%;height:100%">
    </div> -->
        </div>
      </div>
      <div class="form-group">
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
</body>

</html>