
<?php require('header.php');?>
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
      <div class="col-md-5">
      <form action="<?=$action?>" method="post"><div class="form-group">
                    <label for="exampleInputPassword1">UpdateCategory</label>
                    <input type="text" name="name"class="form-control" value="<?=$name[0]['name']?>" placeholder="name" >
                    <input type="hidden" name="id"class="form-control" value="<?= $name[0]['id']?>" placeholder="name" >
                    <button type="submit"class="btn btn-primary">update</button>
                  </div>
                </form>
      </div>
    </section>
    

    <?php  require('footer.php')?>