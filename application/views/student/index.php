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
    body{
        margin-left: 100px;
        margin-right: 100px;
    }
    .bold{
        font-weight: bold;
    }
</style>
<body>

<h2>All student</h2>
<a class="bold" href = "<?=base_url()?>student/add">Add student</a>
<table class="table" border="3">
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

</body>
</html>