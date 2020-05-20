<?
include('../koneksi.php');

$id = $_GET["id"];
$konten = mysqli_query($conn, "SELECT * FROM table_card_menu WHERE ID_menu= '$id'");
$result = mysqli_fetch_assoc($konten);

function ubah($data)
{
  global $conn;

  $id = $_GET["id"];
  $title = htmlspecialchars($data["title"]);
  $sub_title = htmlspecialchars($data["sub_title"]);

  $query = "UPDATE table_card_menu SET 
            title = '$title',
            sub_title = '$sub_title'
            WHERE ID_menu = '$id'
  ";
  mysqli_query($conn, $query);
  return mysqli_fetch_row($conn);
}

//check tombol simpan telah di tekan atau belum
if (isset($_POST["submit"])) {

  if (ubah($_POST) > 0) {
    echo "
    <script>
      alert('Data Berhasil Diubah!');
      document.location.href = 'input_card.php';
    </script>
  ";
  } else {
    echo "
    <script>
      alert('Data gagal Diubah!');
      document.location.href = 'input_card.php';
    </script>
  ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="../img/icon.jpeg">

  <title>Administrator Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Administrator</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Components:</h6>
            <a class="collapse-item" href="../dashboard.php" target="_blank">Main Website</a>
            <h6 class="collapse-header">Belajar:</h6>
            <a class="collapse-item" href="../product.php" target="_blank">F&B Product</a>
            <a class="collapse-item" href="../service.php" target="_blank">F&B Service</a>
            <h6 class="collapse-header">Resep:</h6>
            <a class="collapse-item" href="../resep_continental.php" target="_blank">Kontinental</a>
            <a class="collapse-item" href="../resep_oriental.php" target="_blank">Oriental</a>
            <a class="collapse-item" href="../resep_nusantara.php" target="_blank">Nusantara</a>
          </div>
        </div>
      </li>
      <li class="nav-item">

        <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Utilities:</h6>
            <a class="collapse-item" href="logout.php">Logout</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Addons
      </div>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsetable" aria-expanded="true" aria-controls="collapsetable">
          <i class="fas fa-fw fa-table"></i>
          <span>Table Input</span>
        </a>
        <div id="collapsetable" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Role:</h6>
            <a class="collapse-item" href="role.php">Input Role</a>
            <h6 class="collapse-header">Input:</h6>
            <a class="collapse-item" href="input.php">Input Data</a>
            <h6 class="collapse-header">Card:</h6>
            <a class="collapse-item" href="input_card.php">Input Data</a>
          </div>
        </div>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <!-- Dropdown - Messages -->
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>



          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
          <!-- Content Row -->
          <div class="ml-5 mr-5">
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
              <p class="display-4 mt-4ml-5">Form Ubah Card</p>
            </div>
            <form action="" method="post">
              <!--Input-->
              <!--ID-->
              <div class="input-group flex-nowrap">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-wrapping">Id Menu</span>
                </div>
                <input value="<?= $result["ID_menu"] ?>" name="id" type="text" class="form-control" placeholder="Masukan ID..." aria-label="Username" aria-describedby="addon-wrapping">
              </div>

              <!--title-->
              <div class="input-group flex-nowrap pt-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-wrapping">&emsp;Title&emsp;</span>
                </div>
                <input value="<?= $result["title"] ?>" name="title" type="text" class="form-control" placeholder="Masukan Title..." aria-label="Username" aria-describedby="addon-wrapping">
              </div>

              <!--Subtitle-->
              <div class="input-group flex-nowrap pt-4">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="addon-wrapping">Sub-title</span>
                </div>
                <input value="<?= $result["sub_title"] ?>" name="sub_title" type="text" class="form-control" placeholder="Masukan Sub-title..." aria-label="Username" aria-describedby="addon-wrapping">
              </div>

              <!--Button Input-->
              <div>
                <button name="submit" type="submit" class="btn btn-primary mt-4">Save</button>
                <button type="submit" class="btn btn-success mt-4"><a href="input_card.php" class="text-white">Kembali</a></button>
              </div>
          </div>

          </form>

          <br> 
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>