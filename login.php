<?php
$invalid = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  include 'php/connect.php';
  error_reporting(0);

  $ID = $_POST['ID'];
  $password = $_POST['password'];

  $sql = "SELECT * from customer where c_id='$ID' and password='$password'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $invalid = false;
    session_start();
    $_SESSION['ID'] = $ID;
    header('location:home.php');
  } else {
    $invalid = true;
  }
}
?>
<?php
if ($invalid) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong></strong> Invalid credentials!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>';
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Canteen Management System</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="stylesheet/style.css" />
    <script
      src="https://kit.fontawesome.com/5ae6a80e24.js"
      crossorigin="anonymous"
    ></script>
    <style >
      *{
        margin: 0;
        padding: 0;

      }

      body {
        /*Horizontal Scrollbar Because of animation overflow*/
        overflow-x: hidden;

      }

    </style>


  </head>

  <body>
    <section class="vh-100 gradient-custom">
      <div class="container-fluid px-0 h-80 mx-0">
        <div
          class="row d-flex justify-content-center align-items-center h-100 bg-cover bg-repet-norepet"
          style="background-image: url(img/Dashboard\ Login.jpg)"
        >
          <div class="col-12 col-md-6 col-lg-6 col-xl-5 ">
            <div class="card bg-dark text-white" style="border-radius: 1rem">
              <div class="card-body text-center d-flex justify-content-center flex-column align-items-center">
                <div style="" class="mb-md-5 mt-md-4 pb-5">
                  <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                  <p class="text-white-50 mb-5">
                    Please enter your login and password!
                  </p>
                  <form action="login.php" method="post">
                    <div class="form-outline form-white mb-4 ">
                      <label class="form-label" for="ID">ID</label>
                      <input
                          type="text"
                          name="ID"
                          class="form-control form-control-lg"
                      />

                    </div>

                    <div class="form-outline form-white mb-4">
                      <label class="form-label" for="typePasswordX"
                      >Password</label
                      >
                      <input
                          type="password"
                          name="password"
                          class="form-control form-control-lg"
                      />

                    </div>

                    <!--                  <p class="small mb-5 pb-lg-2">-->
                    <!--                    <a class="text-white-50" href="#!">Forgot password?</a>-->
                    <!--                  </p>-->

                    <button
                        class="btn btn-outline-light btn-lg px-5"
                        type="submit"
                    >
                      Login
                    </button>
                  </form>


                  <div
                    class="d-flex justify-content-center text-center mt-4 pt-1"
                  >
                    <a href="#!" class="text-white"
                      ><i class="fab fa-facebook-f fa-lg"></i
                    ></a>
                    <a href="#!" class="text-white"
                      ><i class="fab fa-twitter fa-lg mx-4 px-2"></i
                    ></a>
                    <a href="#!" class="text-white"
                      ><i class="fab fa-google fa-lg"></i
                    ></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
