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
            <td><input type="file" name="picture"></td>
        </tr>
        <tr>
            <td></td>
            <td><input type="submit" name="btnadd" value="Add"></td>
        </tr>
    </table>
</form>