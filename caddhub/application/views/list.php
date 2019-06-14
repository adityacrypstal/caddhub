<!DOCTYPE html>
<html lang="en">
<head>
  <title>Cadhub Admin Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
<a  href="<?=base_url('index.php/admin/logout')?>"><button style="float:right;overflow:hidden;position:relative;">Logout</button></a>
  <h2>Registered Students Example</h2>
  <p><a href="<?=base_url('index.php/admin/admin_panel')?>">Add students</a></p>            
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Register No</th>
        <th>Course</th>
        <th>Year</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($result as $results):?>
      <tr>
        <td><?=$results['Id']?></td>
        <td><?=$results['Name']?></td>
        <td><?=$results['reg']?></td>
        <td><?=$results['class']?></td>
        <td><?=$results['year']?></td>
      </tr>
<?php endforeach;?>
    </tbody>
  </table>
</div>

</body>
</html>
