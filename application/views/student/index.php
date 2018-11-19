<!DOCTYPE html>
<html>
<head>
    <title>Danh sách sinh viên</title>
    <base href="<?php echo 'BASE_URL';?>">
</head>
<body>
<h2>All student</h2>
<table border="1">
    <tr>
        <td>Id</td>
        <td>Name</td>
        <td>Age</td>
        <td>Picture</td>
    </tr>
    <?php foreach ($list as $value) {?>
        <tr>
            <td><?php echo $value["id"];?></td>
            <td><?php echo $value["name"];?></td>
            <td><?php echo $value["age"];?></td>
            <td><img src="../../upload/<?php echo $value['image'];?>" width="100px" height="100px" ></td>
        </tr>
    <?php } ?>
</table>
<a href = "<?=base_url()?>index.php/student/add">Add student</a>
</body>
</html>