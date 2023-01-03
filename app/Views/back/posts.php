
<?php require('header.php');?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>category</h1>
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
          <h3 class="card-title"><a href="addPost" class="btn btn-info">add new post</a></h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <table class='table'>

          <th> id</th>
          <th>category name</th>
          <th>image</th>
          <th>icone</th>
          <th>created_at</th>
          <th>user</th>
          <th>update</th>
          <th>delete</th>
          <tbody>         
<?php  foreach($data as $d1):?>
<tr> 
   <td><?=$d1['id'];?></td>
  <td><?=$d1['title'];?></td>
  <td><?=$d1['description'];?></td>
  <td><img src="<?=CSS_PATH."imgesuploded/".$d1['img'];?>"class="image-rounded" style="border-radius: 50%; width: 70px" ></td>
  <td><?=$d1['created_at'];?></td>
  <td><?=$d1['user_id'];?></td>
  <td> <a href="updatePost/<?=$d1['id']?>" class="btn btn-primary">update</a></td>
  <td> <a href="deletecategory/<?=$d1['id']?>" class="btn btn-danger">delete</a></td>
</tr>
 
  <?php endforeach;?>
 
</tbody>
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