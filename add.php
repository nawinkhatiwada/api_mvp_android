
<?php
include  "db_connection.php";
$obj = new Db_connection();

if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
      if(add($title,$description)){
          $message="Success";
      }else{
          $message ="Error";
      }
}

function add($title, $description)
{
    global  $obj;
    $sql = "INSERT INTO recent_tags(title,description) VALUES('$title','$description')";
    $result = $obj->_conn->query($sql);
    return $result;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Add Tags information</h2>
    <!-- Trigger the modal with a button -->
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>

    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">
                        Fill up Tags information and submit<br/>
                        <span style="color: red"><?php echo isset($message) ? $message : '' ?></span>
                    </h4>
                </div>
                <div class="modal-body col-md-4">
                    <form method="POST" action="">
                        <div class="form-group">
                            <label for="usr">Title:</label>
                            <input class="form-control" name="title">
                        </div>
                        <div class="form-group">
                            <label for="pwd">Description:</label>
                            <textarea class="form-control" name="description"></textarea>
                        </div>
                        <button class="btn btn-default" name="submit">ADD</button>
                    </form>
                </div>
                <div class="modal-footer">
                </div>
            </div>

        </div>
    </div>

</div>
</body>
</html>
<script type="text/javascript">
    $(window).on('load', function () {
        $('#myModal').modal('show');
    });
</script>

