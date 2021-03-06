<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authority</title>
    <link rel="stylesheet" href="../common/crud.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.1.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <?php require "../common/link.html";?>
    <style>
        .table-responsive {
            overflow: hidden;
        }
        .clearfix {
            transform: translateX(-10%);
            position: relative;
            left: 50%;
        }
        .action_icon .view {
            color: #495057;
        }
        .action_icon .delete {
            color:red;
        }
        .action_icon .edit {
            color: blue;
        }
        .search-box {
            display: flex;
            align-items: center;
            border: 1px solid;
            border-radius: 3px;
            padding: 2px 5px;
        }
        .search-box input {
            border: none;
            outline: none;
        }
        .search-box i {
            color: #495057;
        }
    </style>
</head>
<body>
<?php 
        require "../common/csdl.php";
        $search=$_POST['search'];
        $sql="select * from tbl_products where title like '%$search%' or id like '%$search' or price like '%$search%'";
        $ket_qua=mysqli_query($conn,$sql);
      
        mysqli_close($conn);
    ?>
<div class="container-xxl position-relative bg-white d-flex p-0">
    <?php require "../common/menu.html";?>
    <div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2>Product</h2></div>
                    <div class="col-sm-4">
                        <div class="search-box">
                        <form action="../product/searched_product.php" method = "post">
                            <i class="fas fa-search"></i>
                            <input type="text" class="form-control" name = "search" placeholder="Search&hellip;">
                            
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <a href="../product/form_insert_product.php">Th??m </a>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Short Description</th>
                        <th>Avatar</th>
                        <th>Price</th>
                        <th>Category Id</th>
                        <th>Status </i></th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php while($row = mysqli_fetch_row($ket_qua)){?>
                <tr>
                        <td><?php echo $row[0]?></td>
                        <td><?php echo $row[1]?></td>
                        <td><?php echo $row[4]?></td>
                        <td><img src="../img/<?php echo $row[6]?>" alt="" width= 100 height = 100></td>
                        <td><?php echo $row[2]?></td>
                        <td><?php echo $row[7]?></td>
                        <td><?php echo $row[12]?> </i></th>
                        <td >
                            <div class="action_icon">
                            <a href="#" class="view" title="View" data-toggle="tooltip"><i class="fas fa-eye"></i></a>
                            <a href="../product/form_update_product.php?id=<?php echo $row[0]?>" class="edit" title="Edit" data-toggle="tooltip"><i class="fas fa-pen"></i></a>
                            <a href="../product/process_delete_product.php?id=<?php echo $row[0]?> " class="delete" title="Delete" data-toggle="tooltip"><i class="fas fa-trash-alt"></i></a>
                            </div>
                        </td>
                    </tr>
                    <?php }?>
                    </tr>
                   
                       
                       
                </tbody>
            </table>
         
     
</div>   
    </div>
    <?php require "../common/footer.html";?>
    <?php require "../common/jsAdmin.html";?>
</div>
</body>
</html>