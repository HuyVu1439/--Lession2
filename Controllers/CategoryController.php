<?php

class CategoryController
{
    //Điều hướng sang trang Category index
    public function index()
    {
        require 'Models/Category.php';
        $arr= (new Category())->all();
        require 'Views/Category/index.php';
    }
    //Truyền dữ liệu sang function create của class Category
    public function store()
    {
        $categoryName = $_POST['categoryName'];

        require 'Models/Category.php';
        (new Category())->create($categoryName);
        header("Location: index.php");
    }
    //Điều hướng sang trang Category edit
    public function edit()
    {
        $editId = $_GET['id'];

        require 'Models/Category.php';
        $each = (new Category())->find($editId);
        require 'Views/Category/edit.php';
    }
    //Truyền dữ liệu sang function update của class Category
    public function update()
    {
        $categoryID = $_POST['ID'];
        $categoryName = $_POST['categoryName'];

        require 'Models/Category.php';
        (new Category())->update($categoryID,$categoryName);
        header("Location: index.php");

    }
    //Truyền dữ liệu sang function destroy của class Category
    public function delete()
    {
        $delId = $_GET['id'];

        require 'Models/Category.php';
        $each = (new Category())->destroy($delId);
        header("Location: index.php");
    }
}