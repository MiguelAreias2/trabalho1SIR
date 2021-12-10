<?php
require_once './componentes/header.php';
require_once './componentes/navBar.php';
?>

<div class="container">
    <div class="row">
        <div class="col-3"></div>
        <div class="col-6">
            <div class="text-center">
                <img src="./assets/logo.png" class="rounded m-3" alt="" width="250" height="250">
            </div>

            <div class="rounded m-3 bg-light">
                <form action="">
                    <h3 class="text-center p-3">Login</h3>
                    <div class="input-group flex-nowrap p-3">
                        <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap p-3">
                        <input type="text" class="form-control" placeholder="Password" aria-label="password" aria-describedby="addon-wrapping">
                    </div>
                    <div class="input-group flex-nowrap p-3">
                        <button type="submit" class="btn btn-outline-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-3"></div>
    </div>
</div>


</header>
</body>

</html>