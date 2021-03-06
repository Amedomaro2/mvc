<!doctype html>
<html lang="en">
<?php require __DIR__ . '/../assets/head.template.php'; ?>
<body>
<?php require __DIR__ . '/../assets/nav.template.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 style="margin: 20px 0;">Users</h1>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Created</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) { ?>
                            <tr>
                                <th scope="row"><?= $user['id'];?></th>
                                <td><?= $user['name'];?></td>
                                <td><?= $user['email'];?></td>
                                <td>
                                    <?php if ($user['status'] == 1) { ?>
                                        Active
                                    <?php }else{ ?>
                                        Inactive
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php
                                        $date = new DateTime($user['created_at']);
                                        echo $date->format('Y-m-d');
                                    ?>
                                </td>
                                <td>
                                    <a href="">Edit</a>
                                    <a href="">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require __DIR__ . '/../assets/js_script.template.php'; ?>
</body>
</html>