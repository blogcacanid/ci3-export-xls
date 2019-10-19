<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style> .str{ mso-number-format:\@; } </style>
<?php 
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=$exportfile");
    header("Pragma: no-cache");
    header("Expires: 0");
?>
<table border='0'>
    <tr>
        <td>No</td>
        <td>NIP</td>
        <td>Nama Pegawai</td>
        <td>Alamat</td>
    </tr>
    <?php if (!empty($records) && is_array($records)): ?>
        <?php $x=0; foreach($records as $item) { $x++; ?>
            <tr>
                <td><?= $x; ?></td>
                <td><?php echo $item['nip'];?></td>
                <td><?php echo $item['nama_pegawai'];?></td>
                <td><?php echo $item['alamat'];?></td>
            </tr>
        <?php } ?>
    <?php else: ?>
        <tr>
            <td colspan="4">No record found.</td>
        </tr>
    <?php endif ?>
</table>
</html>