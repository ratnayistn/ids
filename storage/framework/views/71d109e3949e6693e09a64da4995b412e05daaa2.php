<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon.ico">
        <meta name="author" content="" />
        <title><?php echo $__env->yieldContent('title'); ?></title>
        <?php echo $__env->make('layout.css_global', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('css_custom'); ?>
    </head>
    
    <body class="sb-nav-fixed">
        <?php echo $__env->make('layout.topnav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <div id="layoutSidenav">
            <?php echo $__env->make('layout.sidenav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <div id="layoutSidenav_content">
                        <div class="container-fluid px-4">
                            <h1 class="mt-4"></h1>
                            
                            <?php echo $__env->make('layout.content', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                <?php echo $__env->make('layout.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            </div>
        </div>
        
        <?php echo $__env->make('layout.script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('js_lokal'); ?>
    </body>
    
</html>
<?php /**PATH C:\xampp\htdocs\ids\resources\views/layout/app.blade.php ENDPATH**/ ?>