<html>
<style>

    .container {
        width: 30%;
        margin: auto;
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;

    }
    input[type=text] {
        width: 100%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-top: 6px;
        margin-bottom: 16px;
        resize: vertical;
    }

    input[type=submit] {
        background-color: #4CAF50;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }
</style>
<body>
    <div class="container">
        <h1>Update data</h1>
        <?php foreach ($list as $value) {?>
        <form method="post" action="<?=base_url()?>student/update">
        <input type="text" name="did" value="<?php echo $value["id"]?>">
        <label>Name: </label><input type="text" name="name" value="<?php echo $value["name"]?>">
        <label>Age: </label><input type="text" name="age" value="<?php echo $value["age"]?>">
            <input type="submit" id="submit" name="dsubmit" value="Update">
        </form>
        <?php } ?>
    </div>
</body>