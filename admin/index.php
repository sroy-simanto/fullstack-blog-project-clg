<?php include("layout/head.php") ?>

<body class="bg-light">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">

            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">

                                    <?php

                                        $errors = [];
                                        $data   = [];


                                        if (isset($_POST['login'])) {
                                            $email = inputValidate($_POST['email']);
                                            $password = $_POST['password'];

                                            if (empty($email)) {
                                                $error['email'] = "Email is required";
                                            } else {

                                                $data['email'] = filter_var($email, FILTER_SANITIZE_EMAIL);

                                                if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
                                                    $error['email'] = "Invalid email format";
                                                }
                                            }

                                            if (empty($password)) {
                                                $error['password'] = "Password is required";
                                            } else {
                                                $data['password'] = $password;
                                            }

                                            if (empty($error['email']) && empty($error['password'])) {

                                                $sql = "SELECT * FROM admin WHERE email=:email";
                                                $stmt = $conn->prepare($sql);
                                                $stmt->bindParam(":email", $data['email'], PDO::PARAM_STR);
                                                $stmt->execute();
                                                $row = $stmt->fetch(PDO::FETCH_OBJ);

                                                if ($row != null) {

                                                    if (password_verify($data['password'], $row->password)) {

                                                        $_SESSION['name']       = $row->name;
                                                        $_SESSION['admin_id']   = $row->id;
                                                        $_SESSION['is_loggend'] = true;

                                                        header("location:dashboard.php");
                                                    } else {
                                                        $error['password'] = "Password does not match!";
                                                    }
                                                } else {
                                                    $error['email'] = "Email not found!";
                                                }
                                            }
                                        }

                                            function inputValidate($data){
                                                $data = trim($data);
                                                $data = htmlspecialchars($data);
                                                $data = stripslashes($data);
                                                return $data;
                                            }
                                        ?>

                                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="email" type="email" name="email" value="<?php echo  $data['email'] ?? '' ?>" placeholder="name@example.com" />
                                            <span class="text-danger py-2"><?php echo  $error['email'] ?? '' ?></span>
                                            <label for="email">Email address</label>
                                        </div>

                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="password" type="password" name="password" value="<?php echo  $data['password'] ?? '' ?>" placeholder="Password" />
                                            <span class="text-danger py-2"><?php echo  $error['password'] ?? '' ?></span>
                                            <label for="password">Password</label>
                                        </div>

                                        <div class="form-check mb-3">
                                            <input class="form-check-input" id="rememberpassword" type="checkbox"
                                                value="" />
                                            <label class="form-check-label" for="rememberpassword">Remember
                                                Password</label>
                                        </div>
                                            
                                        <button type="submit" name="login" class="btn-block btn btn-primary">Login</button>

                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

        </div>
    </div>

    <?php include("layout/foot.php") ?>