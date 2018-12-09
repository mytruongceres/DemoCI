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
        width:80%;
        height:610px;
        margin:50px auto
    }
    #wrapper {
        width:100%;
        padding:0 50px 20px;
        background:linear-gradient(#2d2c2c,#4CAF50);
        font-family:'Marcellus',serif;
        float:left;
        margin-top:10px;
        border:1px solid #ccc;
        box-shadow:0 0 5px;
    }
    #add {
        width:100%;
        text-align: center;
        color: white;
        background:#4CAF50;
        font-size: 28px;
        font-family:'Marcellus',serif;
        float:left;
        margin-top:10px;

    }
    #menu {
        float:left;
        width:200px;
        margin-top:-30px
    }
    #detail {
        float:left;
        width:320px;
        margin-left: 50px;
        margin-top:50px
    }
    a {
        text-decoration:none;
        color:white;
    }
    a:hover {
        color:#8ba8ac;
    }
    li {
        padding:4px 0
    }
    h1 {
        text-align:center;
        font-size:28px;
        color: white;

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
        background:#d58512;
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
        color:#d58512;
    }
    .del
    {
        color: red;
    }
    .tddel{
        width:  59px;
        height: 39px;
    }
    .Logout{
        color: #9d9d9d;
        float: right;
        padding-top: 12px;
        padding-right: 5px;
        padding-right: 15px;
    }
    .bold{
        color: white;
    }

</style>
<body>
<div class="container">
    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?=base_url()?>student/index">Home</a>
        </div>

        <div class="ReLo navbar-footer">
            <a href="<?=base_url()?>users/logout" class="Logout">Logout</a>
        </div>
    </nav>

    <div>
<div id="container">
    <div id="add">
        <a class="bold" href = "<?=base_url()?>student/add">Add student</a>
    </div>


    <div id="wrapper">
        <h1>Update Data </h1><hr/>
        <div id="menu">
            <p>Click On Menu</p>
            <div>
                <table class="table">
            <!-- Fetching Names Of All Students From Database -->
                <?php foreach ($students as $student): ?>

                            <tr>
                            <td><a href="<?php echo base_url() . "student/show_student_id/" . $student["id"]; ?>"><?php echo $student["name"]; ?></a></td>

                            <td class="tddel"><a class="del " href="<?=base_url()?>student/delete_user/<?php echo $student["id"];?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a></td>
                            </tr>

                <?php endforeach; ?>
                </table>
            </div>

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