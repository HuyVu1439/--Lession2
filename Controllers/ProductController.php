<?php

class ProductController
{
    //Điều hướng sang trang Product index
    public function productIndex()
    {
        require 'Models/Category.php';
        require 'Models/Product.php';
        $arr= (new Product())->all();
        $categ= (new Category())->all();
        

        require 'Views/Product/index.php';
    }
    //Truyền dữ liệu sang function create của class Product
    public function productStore()
    {
        $productName = $_POST['productName'];
        $categoryID = $_POST['categoryID'];
        $productImage = $_FILES['productImage'];

        require 'Models/Product.php';
        (new Product())->create($productName,$categoryID,$productImage);
    }
    //Điều hướng sang trang Product edit
    public function productEdit()
    {
        $editId = $_GET['id'];
        require 'Models/Category.php';
        require 'Models/Product.php';
        $each = (new Product())->find($editId);
        $categ= (new Category())->all();
        
        require 'Views/Product/edit.php';
    }
    //Truyền dữ liệu sang function update của class Product
    public function productUpdate()
    {
        $productID = $_POST['ID'];
        $productName = $_POST['productName'];
        $categoryID = $_POST['categoryID'];
        $productImage = $_FILES['productImage'];

        require 'Models/Product.php';
        (new Product())->update($productID,$productName,$categoryID,$productImage);

    }
    //Truyền dữ liệu sang function destroy của class Product
    public function productDelete()
    {
        $delId = $_GET['id'];

        require 'Models/Product.php';
        $each = (new Product())->destroy($delId);
    }
}