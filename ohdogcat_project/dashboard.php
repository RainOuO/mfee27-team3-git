<?php
session_start();
if(!isset($_SESSION["user"])){
  header("location: login.php");

}
?>


<!doctype html>
<html lang="en">

<head>
    <title>Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS v5.0.2 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome-free-6.1.1-web/css/all.min.css">
    <style>
        body {
            /* height: 200vh; */
        }

        :root {
            --aside-width: 200px;
        }

        a,
        a:link {
            text-decoration: none;
        }

        .site-name {
            width: var(--aside-width);
        }

        .dashboard-control {
            width: var(--aside-width);
        }
        .dashboard-control nav {
          margin-top: 40px;
        }
        nav ul:first-child {
            
        }

        .side-menu a {
            display: block;
            color: #333;
            padding: 10px 10px;
        }

        .side-menu a:hover {
            background: #fff;
        }

        .second-title {
            padding: 0 10px;
        }

        .second-title a {
            color: #333;
        }

        .main-content {
            margin-left: var(--aside-width);
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <header class="fixed-top">
        <div class="d-flex">
            <a class="site-name text-white bg-dark p-2 flex-shrink-0" href="/">Company name</a>
            <input type="text" class="form-control rounded-0 ">
            <a href="doLogout.php" class="btn btn-dark text-nowrap rounded-0">Sign out</a>
        </div>

    </header>
    <aside class="dashboard-control position-fixed bg-light start-0 top-0 vh-100 border-end overflow-auto">
      <!-- <div class="py-3">
        hi, xxx
      </div> -->
        <nav>
          <div class="py-4 px-3">
            <?php if(isset($_SESSION["user"])): ?>
              hi,<?=$_SESSION["user"]["account"]?>
              <?php endif; ?>
          </div>
            <ul class="list-unstyled side-menu">
                <li class=""><a href=""><i class="fa-solid fa-gauge fa-fw me-2"></i>Dashboard</a></li>
                <li class=""><a href=""><i class="fa-solid fa-list fa-fw me-2"></i>Orders</a></li>
                <li class=""><a href=""><i class="fa-solid fa-cart-shopping fa-fw me-2"></i>Products</a></li>
                <li class=""><a href=""><i class="fa-solid fa-users fa-fw me-2"></i>Customers</a></li>
                <li class=""><a href=""><i class="fa-solid fa-chart-column fa-fw me-2"></i>Reports</a></li>
                <li class=""><a href=""><i class="fa-solid fa-layer-group fa-fw me-2"></i>Integrations</a></li>
            </ul>
            <div class="mt-3">
                <div class="d-flex justify-content-between second-title">
                    <div class="text-muted text-uppercase">Save Reports</div>
                    <a href="">
                        <i class="fa-solid fa-circle-plus"></i>
                    </a>
                </div>
                <ul class="list-unstyled side-menu">
                    <li class=""><a href=""><i class="fa-solid fa-file fa-fw me-2"></i>Curent Month</a></li>
                    <li class=""><a href=""><i class="fa-solid fa-file fa-fw me-2"></i>Last quarter</a></li>
                    <li class=""><a href=""><i class="fa-solid fa-file fa-fw me-2"></i>Social engagement</a></li>
                    <li class=""><a href=""><i class="fa-solid fa-file fa-fw me-2"></i>Year-end sale</a></li>

                </ul>
            </div>
        </nav>
    </aside>
    <main class="main-content p-4">
        <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3">
            <h1>Dashboard</h1>
            <div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <button type="button" class="btn btn-outline-secondary">Share</button>
                    <button type="button" class="btn btn-outline-secondary">Export</button>
                </div>
            </div>
        </div>
        <h2>Second title</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                  <th scope="col">Header</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1,001</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
                <tr>
                  <td>1,002</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>data</td>
                  <td>rich</td>
                  <td>dashboard</td>
                  <td>tabular</td>
                </tr>
                <tr>
                  <td>1,003</td>
                  <td>information</td>
                  <td>placeholder</td>
                  <td>illustrative</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,004</td>
                  <td>text</td>
                  <td>random</td>
                  <td>layout</td>
                  <td>dashboard</td>
                </tr>
                <tr>
                  <td>1,005</td>
                  <td>dashboard</td>
                  <td>irrelevant</td>
                  <td>text</td>
                  <td>placeholder</td>
                </tr>
                <tr>
                  <td>1,006</td>
                  <td>dashboard</td>
                  <td>illustrative</td>
                  <td>rich</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,007</td>
                  <td>placeholder</td>
                  <td>tabular</td>
                  <td>information</td>
                  <td>irrelevant</td>
                </tr>
                <tr>
                  <td>1,008</td>
                  <td>random</td>
                  <td>data</td>
                  <td>placeholder</td>
                  <td>text</td>
                </tr>
                <tr>
                  <td>1,009</td>
                  <td>placeholder</td>
                  <td>irrelevant</td>
                  <td>visual</td>
                  <td>layout</td>
                </tr>
                <tr>
                  <td>1,010</td>
                  <td>data</td>
                  <td>rich</td>
                  <td>dashboard</td>
                  <td>tabular</td>
                </tr>
                <tr>
                  <td>1,011</td>
                  <td>information</td>
                  <td>placeholder</td>
                  <td>illustrative</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,012</td>
                  <td>text</td>
                  <td>placeholder</td>
                  <td>layout</td>
                  <td>dashboard</td>
                </tr>
                <tr>
                  <td>1,013</td>
                  <td>dashboard</td>
                  <td>irrelevant</td>
                  <td>text</td>
                  <td>visual</td>
                </tr>
                <tr>
                  <td>1,014</td>
                  <td>dashboard</td>
                  <td>illustrative</td>
                  <td>rich</td>
                  <td>data</td>
                </tr>
                <tr>
                  <td>1,015</td>
                  <td>random</td>
                  <td>tabular</td>
                  <td>information</td>
                  <td>text</td>
                </tr>
              </tbody>
            </table>
    </main>
    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
        crossorigin="anonymous"></script>
</body>

</html>