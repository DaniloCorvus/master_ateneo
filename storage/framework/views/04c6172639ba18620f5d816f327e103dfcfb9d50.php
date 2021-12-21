<table>
    <thead>
        <tr>
            <th> Consecutivo </th>
            <th> Tipo documento </th>
            <th> Nombre </th>
            <th> Cumple </th>
            <th> Sexo </th>
            <th> Telefono </th>
            <th> Direccion </th>
            <th> Municipio </th>
            <th> Departamento </th>
            <th> Eps </th>
            <th> Regimen </th>
            <th> Lugar </th>
            <th> Fecha Cita </th>
            <th> Asigna </th>
            <th> Estado </th>
            <th> Doctor </th>
            <th> Consulta </th>
            <th> Especialidad </th>
            <th> Cup </th>
            <th> Cup name </th>
            <th> Diagnostico </th>
            <th> Ips remisora </th>
            <th> Profesional remisor </th>
            <th> Especialidad remisor </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td> <?php echo e($datum->consecutivo); ?> </td>
            <td> <?php echo e($datum->tipo_documnto); ?> </td>
            <td> <?php echo e($datum->nombre); ?> </td>
            <td> <?php echo e($datum->cumple); ?> </td>
            <td> <?php echo e($datum->sexo); ?> </td>
            <td> <?php echo e($datum->telefono); ?> </td>
            <td> <?php echo e($datum->direccion); ?> </td>
            <td> <?php echo e($datum->municipio); ?> </td>
            <td> <?php echo e($datum->departamento); ?> </td>
            <td> <?php echo e($datum->eps); ?> </td>
            <td> <?php echo e($datum->regimen); ?> </td>
            <td> <?php echo e($datum->lugar); ?> </td>
            <td> <?php echo e($datum->fecha_cita); ?> </td>
            <td> <?php echo e($datum->asigna); ?> </td>
            <td> <?php echo e($datum->estado); ?> </td>
            <td> <?php echo e($datum->doctor); ?> </td>
            <td> <?php echo e($datum->consulta); ?> </td>
            <td> <?php echo e($datum->especialidad); ?> </td>
            <td> <?php echo e($datum->cup); ?> </td>
            <td> <?php echo e($datum->cup_name); ?> </td>
            <td> <?php echo e($datum->diagnostico); ?> </td>
            <td> <?php echo e($datum->ips_remisora); ?> </td>
            <td> <?php echo e($datum->professional_remisor); ?> </td>
            <td> <?php echo e($datum->speciality_remisor); ?> </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH C:\laragon\www\ateneo-deploy\resources\views/exports/AgendasReport.blade.php ENDPATH**/ ?>