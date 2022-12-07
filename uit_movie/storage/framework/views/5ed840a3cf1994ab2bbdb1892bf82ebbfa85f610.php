<nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo e(route('home')); ?>">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(route('category.create')); ?>">Danh mục phim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo e(route('genre.create')); ?>">Thể loại</a>
        </li>
      
        <li class="nav-item">
          <a class="nav-link " href="<?php echo e(route('country.create')); ?>">Quốc gia</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo e(route('movie.create')); ?>">Phim</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="<?php echo e(route('episode.create')); ?>">Tập phim</a>
        </li>
       <!--  <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li> -->
        
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control ms-sm-2 me-2" type="search" placeholder="..." aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0 col-5" type="submit">Tìm kiếm phim</button>
      </form>
    </div>
  </div>
</nav>
<?php /**PATH C:\xampp\htdocs\UIT_movie\uit_movie\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>