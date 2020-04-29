<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="expires" content="Wen, 01 Jan 2020 00:00:00 GMT"/>
    <meta http-equiv="pragma" content="no-cache" />

    <!-- Jquery -->
    <script src="js/jquery.js"></script>
    <script src="js/jquery-ui.js"></script>

    <!-- Bootstrap JS -->
    <script src="js/bootstrap.bundle.js" type="text/javascript"></script>
    <script src="js/bootstrap.js" type="text/javascript"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/bootstrap-grid.css">
    <link href="css/bootstrap-reboot.css" rel="stylesheet">
    <!-- Own Files -->
    <script src="js/skills.js" type="text/javascript"></script>
    <link rel="stylesheet" href="css/skills.css">
</head>
<body class="bg-dark">
<div class="container-fluid mt-5">
    <div class="row">
        <div class="col-12 col-md-4 offset-0 offset-md-1">
            <form action method="post" name="form">
                            <div class="form-group">
                                <label class="d-block h5">Versnelling</label>
                            <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                <label class="btn btn-success">
                                    <input class="form-control" required type="radio" autocomplete="off" name="versnelling" value="0">N
                                </label>
                                <label class="btn btn-secondary">
                                    <input  class="form-control" required type="radio" autocomplete="off" name="versnelling" value="1">1
                                </label>
                                <label class="btn btn-secondary">
                                    <input class="form-control" required type="radio" autocomplete="off" name="versnelling" value="2">2
                                </label>
                                <label class="btn btn-secondary">
                                    <input class="form-control" required type="radio" autocomplete="off" name="versnelling" value="3">3
                                </label>
                                <label class="btn btn-secondary">
                                    <input class="form-control" required type="radio" autocomplete="off" name="versnelling" value="4">4
                                </label>
                                <label class="btn btn-secondary">
                                    <input class="form-control" required type="radio" autocomplete="off" name="versnelling" value="5">5
                                </label>
                                <label class="btn btn-secondary">
                                    <input class="form-control" required type="radio" autocomplete="off" name="versnelling" value="6">6
                                </label>
                        </div>
                        </div>

                            <div class="form-group">
                                <label class="h5">Wiel grootte</label>
                                <select required class="form-control" name="wiel" style="border: 1px solid black">
                                    <option>15 inch</option>
                                    <option>16 inch</option>
                                    <option>17 inch</option>
                                    <option>18 inch</option>
                                    <option>20 inch</option>
                                    <option>22 inch</option>
                                </select>
                            </div>
                            <label class="h5">Toeren</label>
                            <input class="form-control" name="toeren"  type="number" required min="0" max="20000" placeholder="500">
                            <div class="form-group mt-5 mb-5">
                                <button class="btn-primary btn" type="submit" name="submit">Bereken</button>
                            </div>
                <hr>
            </form>
        </div>
        <div class="col-12 col-md-4 offset-0 offset-md-1">
            <label class="h3 text-info">Geschiedenis</label>
            <div class="history" style="min-height: 84vh"></div>
            <div class="pageDiv">
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item Previous disabled pg-blue">
                            <a class="page-link" href="#!" onclick="NextPreviousCode(1)" tabindex="-1">Terug</a>
                        </li>
                        <li class="page-item active page">
                            <a class="page-link a1" onclick="goPage(1)" href="#!">1
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

<?php
if(isset($_POST["submit"])) {
    include "extern/storeData.php";
}
?>
</body>
</html>