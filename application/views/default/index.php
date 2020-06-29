<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand" href="<?php base_url()?>">Ayo Belajar</a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.html">Technology</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="post.html">Cerpen</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Kisah Nyata</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Puisi</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Tentang</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.html">Daftar Akun</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Header -->
  <header class="masthead" style="background-image: url('img/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="site-heading">
            <h1>Ayo Belajar</h1>
            <span class="subheading">A Blog Theme by Start Bootstrap</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">

    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      

      <?php foreach($posts as $post) : ?>
        <div class="post-preview">
          <a href="post.html">
            <h6 style="font-size: 14px" class="post-title">
              <?php echo $post['title']; ?>
            </h6>
            <h7 style="font-size: 11px" class="post-subtitle">
              <?php echo word_limiter($post['body'],60)?> 
          <button class="btn sm-btn-primary">Read More</button>
            </h7>

          </a>
          <p class="post-meta">Posted On: <?php echo $post['created_at']; ?> by : <strong><?php echo $post['blogger_name']; ?></strong></p> 

        </div>
        <hr>
      <?php endforeach; ?>
       
        <!-- Pager -->
        <div class="clearfix">
          <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
        </div>
      </div>
    </div>
  </div>
  <hr>

  