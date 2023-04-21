<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

        <title><?php echo e(config('app.name', 'Laravel')); ?></title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- Styles -->
        <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
        <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
        <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>	
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	    

        <!-- Scripts -->
        <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
        <script src="//code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="//code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            <?php echo $__env->make('layouts.navigation', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    <?php echo e($header); ?>

                </div>
            </header>

            <!-- Page Content -->
            <main>
                <?php echo e($slot); ?>

            </main>
        </div>
        <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/popper.js')); ?>"></script>
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(asset('js/main.js')); ?>"></script>
        <?php $__env->startSection('scripts'); ?>
            <script>
                $(function () {
                    $('.datepicker').datepicker({
                        // Datepicker options here
                    });
                });
            </script>
        <?php $__env->stopSection(); ?>

    </body>
</html>
<?php /**PATH /Users/gerard.alainp/Documents/GitHub/UPOUIS295B/laravel/resources/views/layouts/app.blade.php ENDPATH**/ ?>