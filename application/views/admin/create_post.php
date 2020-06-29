
 
    <!-- Main-body start -->
    <div class="main-body">
        <div class="page-wrapper">
            <!-- Page header start -->
            <div class="page-header">
                <div class="page-header-title">
                    <h4>Write Your Idea</h4>
                    <span>Enjoy Your Moment with <code>Ayobelajar.com</code></span>
                </div>
                
            </div>
            <!-- Page header end -->
            <!-- Page body start -->
            <div class="page-body">
                <div class="row">
                    <div class="col-sm-12">


                        <!-- Default select start -->

                <form action="<?php echo base_url('write/save'); ?>" method="post" 
                    class="login100-form validate-form" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header">
                                <h5>Create New Post</h5>
                                <div class="card-header-right">
                                    <i class="icofont icofont-rounded-down"></i>
                                    <a href="<?php base_url()?>write"><i  class="icofont icofont-refresh"></i></a>
                                </div>
                            </div>


                            <div class="card-block">
                                <!-- ISIAN PERTAMA -->
                                <div class="row">
                                     <div class="col-sm-12 col-xl-6">
                                        <h4 class="sub-title">Title Post (Judul)</h4>
                                            <div class="input-group">
                                                <input type="text" name="title" class="form-control" placeholder="Title Post">
                                                <span class="input-group-addon" id="basic-addon3">Write Here</span>
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-xl-6 ">
                                        <h4 class="sub-title">Category (Kategori)</h4>
                                         <select name="category_id" class="form-control form-control-primary">
                                            <?php foreach ($category as $categoryxyz): ?>
                                                <option value="<?php echo $categoryxyz['category_id']; ?>"><?php echo $categoryxyz['category_name']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>


                                <!-- ISIAN KEDUA -->
                                <div class="row">
                                     <div class="col-sm-12 col-xl-6">
                                        <h4 class="sub-title">Image  (Gambar)</h4>
                                            <div class="input-group">
                                                <input type="file" name="userfile" size="20">
                                        </div>
                                    </div>


                                    <div class="col-sm-12 col-xl-6 ">
                                    </div>
                                </div>



                                <!-- ISIAN KETIGA -->
                                <div class="row">
                                    <div class="col-sm-12 ">
                                        <h4 class="sub-title">Body (Isi Tulisan)</h4>
                                        <textarea id="editor1" class="form-control" name="body" placeholder="Add Body"></textarea>
                                    </div>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <!-- Default select end -->
                    </form>

                    </div>
                </div>
            </div>
            <!-- Page body end -->
        </div>
    </div>
  
