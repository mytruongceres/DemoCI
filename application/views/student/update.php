<head>
    <title>Danh sách sinh viên</title>
    <base href="<?php echo 'BASE_URL';?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap.css"); ?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url("assets/css/bootstrap.min.css"); ?>">
    <script src="<?php echo base_url("assets/js/jquery-3.3.1.min.js"); ?>"></script>
    <script src="<?php echo base_url("assets/js/bootstrap.min.js"); ?>"></script>
</head>
<html>
<style>

    #container {
        width:622px;
        height:610px;
        margin:50px auto
    }
    #wrapper {
        width:520px;
        padding:0 50px 20px;
        background:linear-gradient(#fff,#AFEBD8);
        border:1px solid #ccc;
        box-shadow:0 0 5px;
        font-family:'Marcellus',serif;
        float:left;
        margin-top:10px
    }
    #menu {
        float:left;
        width:200px;
        margin-top:-30px
    }
    #detail {
        float:left;
        width:320px;
        margin-top:50px
    }
    a {
        text-decoration:none;
        color:blue
    }
    a:hover {
        color:red
    }
    li {
        padding:4px 0
    }
    h1 {
        text-align:center;
        font-size:28px
    }
    hr {
        border:0;
        border-bottom:1.5px solid #ccc;
        margin-top:-10px;
        margin-bottom:30px
    }
    #hide {
        display:none
    }
    form {
        margin-top:-40px
    }
    label {
        font-size:17px
    }
    input {
        width:100%;
        padding:8px;
        margin:5px 0 15px;
        border:none;
        box-shadow:0 0 5px
    }
    input#submit {
        margin-top:10px;
        font-size:18px;
        background:linear-gradient(#22abe9 5%,#36caf0 100%);
        border:1px solid #0F799E;
        color:#fff;
        font-weight:700;
        cursor:pointer;
        text-shadow:0 1px 0 #13506D
    }
    input#submit:hover {
        background:linear-gradient(#36caf0 5%,#22abe9 100%)
    }
    p {
        font-size:18px;
        font-weight:700;
        color:#18af0b
    }
    .Prev{
        margin-bottom: 50px;
    }

</style>
<body>
<div id="container">
    <div class="Prev">
       <button class="btn btn-success" style="background: #2e6da4"><a style="color: whitesmoke;" href="<?=base_url()?>student/index">ComeBack</a></button>
    </div>
    <div id="wrapper">
        <h1>Update Data </h1><hr/>
        <div id="menu">
            <p>Click On Menu</p>
            <!-- Fetching Names Of All Students From Database -->
            <ol>
                <?php foreach ($students as $student): ?>
                    <li><a href="<?php echo base_url() . "student/show_student_id/" . $student["id"]; ?>"><?php echo $student["name"]; ?></a></li>
                <?php endforeach; ?>
            </ol>
        </div>
        <div id="detail">
            <!-- Fetching All Details of Selected Student From Database And Showing In a Form -->
            <?php foreach ($single_student as $student): ?>

                <form method="post" action="<?php echo base_url() . "student/update_student_id"?>">
                    <label id="hide">Id :</label>
                    <input type="text" id="hide" name="id" value="<?php echo $student->id; ?>">
                    <label>Name :</label>
                    <input type="text" name="name" value="<?php echo $student->name; ?>">
                    <label>Age :</label>
                    <input type="text" name="age" value="<?php echo $student->age; ?>">
                    <input type="submit" id="submit" name="dsubmit" value="Update">
                </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>
</body>