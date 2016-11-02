        <link href="<?php echo base_url(); ?>css/login.css" rel="stylesheet">   
    </head>
    <body>
    <div class="container">
        <div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card"></p>
            <form class="form-signin" method="post" action="<?php echo base_url() ?>index.php/panel_controller/dologin">
                <span id="reauth-email" class="reauth-email"></span>
                <input type="text" name="nombre" class="form-control" placeholder="Usuario" required autofocus>
                <input type="password" name="clave" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Entrar</button>
            </form>
            <?php if ($error): ?>
                <div class="alert alert-danger" role="alert" style="margin-top: 10px;"><?php echo $error ?></div>
            <?php endif; ?>
        </div>
    </div>
<script src="<?php echo base_url(); ?>js/login.js"></script>