<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <style>
    .listPage .active{
      background-color: #74c9e1;
      color: #fff;
    }
    .listPage li{
      background-color: #e3f1f1;
      padding: 10px;
      display: inline-block;
      margin: 0 10px;
      cursor: pointer;
      border: 1px solid #ccc;
      border-radius: 16px;
    }
  </style>
  <title>Index</title>
</head>

<body>

  <div class="container">
    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="#"><img src="./Images/9776d29c60c14b518417554273d9b518_20210305141823.png"
          width="150" height="150"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a href="?action=productIndex"><button type="button" class="btn btn-primary">Products</button></a>
          </li>
          <li class="nav-item">
            <a href="?action=index"><button type="button" class="btn btn-light">Categories</button></a>
          </li>
        </ul>
      </div>
    </nav>
    <!--Search box-->
    <input type="text" class="form-control col-12" id="searchbox" placeholder="Search">
    <div>
      <div class="float-left">
        <p class="d-flex justify-content-start">Search found
          <?php echo count($arr); ?> results
        </p>
      </div>
      <div style="float: right;">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForCreate"><i
            class="fa fa-plus-circle"></i></button>
      </div>
    </div>

    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Product name</th>
          <th scope="col">Category</th>
          <th scope="col">Image</th>
          <th scope="col">Operations</th>
        </tr>
      </thead>
      <tbody class="list">
        <?php foreach ($arr as $each): ?>
          <tr class="item">
            <th scope="row">
              <?php echo $each->get_ID() ?>
            </th>
            <td id = "myInput<?php echo $each->get_ID() ?>">
              <?php echo $each->get_ProductName() ?>
            </td>
            <td>
            <?php foreach ($categ as $a): ?>
                        <?php if ($a->get_ID()==$each->get_IDCategoty()){
                          echo $a->get_CategoryName();
                        } ?>
                      <?php endforeach; ?>
            </td>
            <td><img src="Images/<?php echo $each->get_Image() ?>" width="100" height="100"></td>
            <td>
              <a href="?action=productEdit&id=<?php echo $each->get_ID() ?>"><button type="button" class="btn btn-primary"
                  data-toggle="modal" data-target="#modalForUpdate"><i class="fa fa-pencil-square-o"
                    aria-hidden="true"></i></button></a>
              <a href="?action=productDelete&id=<?php echo $each->get_ID() ?>"><button type="button"
                  class="btn btn-primary"><i class="fa fa-minus-circle" aria-hidden="true"></i></button></a>
              <button type="button" class="btn btn-primary" onclick="myFunction<?php echo $each->get_ID() ?>()"><i class="fa fa-clone" aria-hidden="true"></i></button>
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalForView<?php echo $each->get_ID() ?>"><i
                  class="fa fa-eye" aria-hidden="true"></i></button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <nav >
      <ul class="listPage">

        <!-- <li class="page-item"><a class="page-link active" href="#">1</a></li>
        <li class="page-item"><a class="page-link" href="#">2</a></li>
        <li class="page-item"><a class="page-link" href="#">3</a></li> -->

      </ul>
    </nav>
    <!--Modal for create-->
    <div class="modal fade" id="modalForCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Create product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="?action=productStore" method="post" enctype="multipart/form-data">
            <div class="modal-body">
              <h5>Add new product</h5>
              <label for="nameProduct">Product name</label>
              <input type="text" class="form-control col-12" id="productName" name="productName">
              <div class="form-group">
                <label for="exampleFormControlSelect1">Category</label>
                <div>
                  <select class="form-control" name="categoryID">
                    <?php foreach ($categ as $a): ?>
                      <option value="<?php echo $a->get_ID() ?>"><?php echo $a->get_CategoryName() ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="form-group">

                <label for="name">Product image</label>
                <div>
                  <input type="file" class="form-control" id="file-upload" name="productImage">
                </div>
                <!-- </br>
                    <div style="width:300px;height:300px" id="image">
                        <img class="text-center" src="https://kynguyenlamdep.com/wp-content/uploads/2019/12/hinh-anh-hoa-hong-dep-va-y-nghia.jpg" alt="Ảnh" style="width:100%;height:100%">
                    </div> -->
              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!--Modal for view-->
    <?php foreach ($arr as $each): ?>
    <div class="modal fade" id="modalForView<?php echo $each->get_ID() ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel<?php echo $each->get_ID() ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel<?php echo $each->get_ID() ?>">Information Product</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <h5>Information Product</h5>
                  <label for="nameProduct">ID</label>
                  <h6><?php echo $each->get_ID() ?></h6>
                  <label for="nameProduct">Product name</label>
                  <h6><?php echo $each->get_ProductName() ?></h6>
                  <div class="form-group">
                    <label for="exampleFormControlSelect1">Category</label>
                    <h6>
                    <?php foreach ($categ as $a): ?>
                        <?php if ($a->get_ID()==$each->get_IDCategoty()){
                          echo $a->get_CategoryName();
                        } ?>
                      <?php endforeach; ?>
                      </h6>
                  </div>
                  <div class="form-group">
                    <label for="name">Product image</label>
                    <div>
                        <img src="Images/<?php echo $each->get_Image() ?>" width="300" height = "300">
                    </div>
                    
                </div>
                </div>
               
              </div>
            </div>
          </div>
          <?php endforeach; ?>

  </div>

  <!--Script JS-->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>
  <script>
    <?php foreach ($arr as $each): ?>
    function myFunction<?php echo $each->get_ID() ?>() {
      // Get the text field
      
      var text = "<?php echo $each->get_ProductName() ?>";
      // Copy the text inside the text field
      navigator.clipboard.writeText(text);

      // Alert the copied text
      alert("Copied the text: " + text);
    }
    <?php endforeach; ?>
  </script>
  <script src="Images/Script/script.js"></script>
</body>

</html>