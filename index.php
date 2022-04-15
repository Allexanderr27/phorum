<?php



session_start();
include 'connect.php';
include 'header.php';
$sql = "SELECT `cat_id`, `cat_name`, `cat_description` FROM `categories`";
$result = mysqli_query($link, $sql);
if (!$result) {
    echo "The categories are not found, try again later";
} else {
    ?>
<table>
    <tr>
        <th>Category</th>
        <th>Last topic</th>
    </tr>
    <tr>
        <td class="leftpart">
            <h3><a href="category.php">Category name</a></h3>
        </td>
        <td class="rightpart">
            <h3><a href="topic.php?=">Topic subject</a></h3>
        </td>
    </tr>
</table>
<?php
}
include 'footer.php';