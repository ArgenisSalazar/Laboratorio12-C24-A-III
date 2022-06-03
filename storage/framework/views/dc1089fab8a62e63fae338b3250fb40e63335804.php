
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <h2 class="text-center mb-5">Estudiantes</h2>
            <a class="btn btn-success mb-4" href="<?php echo e(url('/form')); ?>">Agregar estudiante</a>
            <!--Mensaje flash-->
            <?php if(session('estudianteEliminado')): ?>
            <div class="alert alert-success">
                <?php echo e(session('estudianteEliminado')); ?>

            </div>
            <?php endif; ?>
            <table class="table table-bordered table-striped text-center">
                <thead style="background-color: #2C3E50;">
                    <tr style="color: white;">
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th>Email</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody style="background-color: #EAF2F8;">
                    <?php $__currentLoopData = $ests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $est): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($est->nombres); ?></td>
                        <td><?php echo e($est->apellidos); ?></td>
                        <td><?php echo e($est->email); ?></td>
                        <td>
                        <a href="<?php echo e(route('editform', $est->id)); ?>" class="btn btn-primary mb-2">
                            <i class="fas fa-pencil-alt"></i> 
                        </a>
                        <form action="<?php echo e(route('delete', $est->id)); ?>" method="POST">
                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                            <button type="submit" onclick="return confirm('¿desea borrar?');" class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
            <a class="btn btn-dark btn-xs mt-5" href="<?php echo e(url ('/dashboard')); ?>">&laquo volver</a>
        </div>
    </div>
</div>
<?php echo $__env->make('layouts.base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Tecsup3\Tecsup 3\Desarrollo de Aplicaciones en Internet\Sesion 12\Laboratorio 12\laboratorio12a\resources\views/estudiantes/listar.blade.php ENDPATH**/ ?>