<!doctype html>
<html lang="en">
<?php require __DIR__ . '/../assets/head.template.php'; ?>
<body>
<?php require __DIR__ . '/../assets/nav.template.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

            </div>
            <div class="col-lg-6">
                <form action="/user/registration" method="POST">
                    <div class="form-group">
                        <h1>User registration form</h1>
                    </div>
                    <div class="form-group">
                        <label>Email address</label>
                        <input type="email" class="form-control" name="email" value="<?php echo isset($_SESSION['data']['email']) ? $_SESSION['data']['email'] : '' ;?>">
                        <span style="color:red;font-size: 14px;"><?= error('email'); ?></span>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" value="<?php echo isset($_SESSION['data']['password']) ? $_SESSION['data']['password'] : '' ;?>">
                        <span style="color:red;font-size: 14px;"><?= error('password'); ?></span>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="col-lg-3">

            </div>
        </div>
    </div>
<?php require __DIR__ . '/../assets/js_script.template.php'; ?>
</body>
</html>