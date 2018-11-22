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
<h2>Add student</h2>
<form action="add" method="post" enctype="multipart/form-data">
    <table>
        <tr>
            <td></td>
            <td><span style="color: red;"><?php echo validation_errors(); ?></span></td>
        </tr>
        <tr>
            <td>Name</td>
            <td><input type="text" name="name"></td>

        </tr>
        <tr>
            <td>Age</td>
            <td><input type="text" name="age"></td>

        </tr>
        <tr>
            <td>Image</td>
           <td><input type="file" name="image"></td>


        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnadd" value="Add"></td>
        </tr>
    </table>
</form>
</div>
</body>
</html>