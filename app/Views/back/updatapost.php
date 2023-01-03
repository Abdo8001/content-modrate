
<?php require('header.php');


?>
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Blank Page</h1>
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
    <section class="content">

<!-- Default box -->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">Title</h3>

    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
        <i class="fas fa-minus"></i></button>
      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
        <i class="fas fa-times"></i></button>
    </div>
  </div>
  <div class="card-body">

  <form  action="<?=CSS_PATH?>/post/DOupdatePost" enctype="multipart/form-data" method="post">
                <div class="card-body">
                  <div class="form-group">
                  <div class="form-group">
                  <input type="hidden" name="id" class="form-control"value="<?=$data[0]['id']?>">
                  <input type="hidden" name="user_id" class="form-control"value="<?=$user_id?>">


                    <label for="exampleInputPassword1">name</label>
                    <input type="text" name="title"class="form-control" placeholder="name" value="<?=$data[0]['title']?>">
                  </div>
                    <label for="exampleInputPassword1">icone</label>
                    <input type="text" name="description"class="form-control" placeholder="description" value="<?=$data[0]['description']?>">
                    <label for="exampleInputPassword1">categories</label>
                  <select name="category" id="">
                    <?php foreach($categories as $category):?>
                  <option value="<?=$category['id']?>"><?=$category['name']?></option>
                
                <?php endforeach?>
                </select>
                  </div>
                  
                  <div class="form-group">
                    <img src="<?=CSS_PATH."imgesuploded/".$data[0]['img']?>" class="image-rounded" style="border-radius: 50%; width: 70px"alt="" srcset="">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" value="<?=$data[0]['img']?>" name="img" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit"class="btn btn-primary">Submit</button>
                </div>
              </form>

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
 