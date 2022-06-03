

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7 mt-5">
        <!--Mensaje flash-->
        <?php if(session('estudianteModificado')): ?>
        <div class="alert alert-success">
            <?php echo e(session('estudianteModificado')); ?>

        </div>
        <?php endif; ?>

        <!--Validación de errores-->
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li> <?php echo e($error); ?> </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>

            <div class="card">
                <form action="<?php echo e(route('edit', $estudiante->id)); ?>" method="POST">
                <?php echo csrf_field(); ?> <?php echo method_field('PATCH'); ?>
                    <div class="card-header text-center" style="background-color: #F1948A;"><strong>MODIFICAR ESTUDIANTE</strong></div>
                    <div class="card-body">
                        <div class="row form-group">
                            <label for="" class="col-2">Nombres</label>
                            <input type="text" name="nombres" class="form-control col-md-9" value="<?php echo e($estudiante->nombres); ?>">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Apellidos</label>
                            <input type="text" name="apellidos" class="form-control col-md-9" value="<?php echo e($estudiante->apellidos); ?>">
                        </div>
                        <div class="row form-group">
                            <label for="" class="col-2">Email</label>
                            <input type="text" name="email" class="form-control col-md-9" value="<?php echo e($estudiante->email); ?>">
                        </div>
                        <div class="row form-group">
                            <button type="submit" class="btn btn-success col-md-9 offset-2">Modificar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <a class="btn btn-dark btn-xs mt-5" href="<?php echo e(url ('/lista')); ?>">&laquo volver</a>
</div>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Tecsup3\Tecsup 3\Desarrollo de Aplicaciones en Internet\Sesion 12\Laboratorio 12\laboratorio12a\resources\views/estudiantes/editform.blade.php ENDPATH**/ ?>