<table>
    <thead>
        <tr>

            <th> Tipo de documento </th>
            <th> Identificacion de paciente </th>
            <th> Nombre paciente </th>
            <th> Sexo </th>
            <th> Telefono </th>
            <th> Direccion </th>
            <th> Especialidad </th>
            <th> Municipio </th>
            <th> Departamento </th>
            <th> Eps </th>
            <th> Regimen </th>
            <th> Observaciones </th>
            <th> Fecha </th>

        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($datum->tipo_documnto); ?> </td>
            <td> <?php echo e($datum->patient_identifier); ?> </td>
            <td> <?php echo e($datum->patient_name); ?> </td>
            <td> <?php echo e($datum->sexo); ?>

            <td> <?php echo e($datum->telefono); ?> </td>
            <td> <?php echo e($datum->direccion); ?> </td>
            <td> <?php echo e($datum->speciality); ?>

            <td> <?php echo e($datum->municipio); ?> </td>
            <td> <?php echo e($datum->departamento); ?> </td>
            <td> <?php echo e($datum->eps); ?> </td>
            <td> <?php echo e($datum->regimen); ?>

            <td> <?php echo e($datum->observaciones); ?> </td>
            <td> <?php echo e($datum->fecha); ?> </td>

        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\laragon\www\ateneo-deploy\resources\views/exports/WaitinListReport.blade.php ENDPATH**/ ?>