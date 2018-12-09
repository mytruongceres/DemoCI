<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <base href="<?php echo 'BASE_URL';?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</head>
<style>
    .container{
        width: 80%;
    }

    .bold{
        font-weight: bold;
    }
    .table{
        margin-top: 50px;
    }
    .ReLo{
        float: right;
        height: 100%;
        padding-top: 12px;
        padding-right: 5px;
    }
    .Log{
        margin-left:  10px;
    }



</style>


<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="ReLo">
        <a href="<?=base_url()?>users/registration" class="Reg">Register</a>
        <a href="<?=base_url()?>users/login" class="Log" >Login</a>
        </div>
    </nav>

<div>
<h2 style="text-align: center">School</h2>
</div>

<table class="table" border="0">
    <tr class="danger">
        <td class="bold">Id</td>
        <td class="bold">Name</td>
        <td class="bold">Age</td>
        <td class="bold">Picture</td>


    </tr>
    <?php foreach ($list as $value) {?>
        <tr>
            <td><?php echo $value["id"];?></td>
            <td><?php echo $value["name"];?></td>
            <td><?php echo $value["age"];?></td>
            <td><img src="<?=base_url()?>upload/<?php echo $value['image'];?>" class="img-thumbnail" alt="Cinque Terre" width="200px" height="200px" ></td>
        </tr>

    <?php } ?>
</table>
</div>
</body>
</html>
