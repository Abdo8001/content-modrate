
<?php require('header.php'); 
$i=1?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category Page</h1>
            <a href="AddNewCategory" class="btn btn-success">AddNewCategory</a>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Blank Page</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<!-- Main content -->
<section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">AllCategory</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">
<table class="table">
  <th>categorySort</th>
  <th>categoryName</th>
<?php foreach($data as $element):?>
  <tr>
    <td><?=$i++?></td>
    <td><h4><?=$element['name']?></h4></td>
    <td><a href="UpdateCategory/<?=$element['id']?>" class="btn btn-info">update</a></td>
    <td><a href="deleteCategory/<?=$element['id']?>" class="btn btn-danger">delete</a></td>
  </tr>

<?php endforeach;?>
</table>

</div>
  <!-- /.card-body -->
  <div class="card-footer">
    Footer
  </div>
  <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
    <?php  require('footer.php')?>