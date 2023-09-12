<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print Data</title>
</head>
<body>
    <table>
        <tr>
        <th>No.</th>
        <th>Pabrik</th>
        <th>Supplier</th>
        <th>Daerah Asal</th>
        <th>DRC Patokan</th>
        </tr>
        <?php $no = 1;
        foreach($data as $dt) : ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $dt->pabrik ?></td>
            <td><?= $dt->supplier ?></td>
            <td><?= $dt->daerah_asal ?></td>
            <td><?= $dt->drc_patokan ?></td>
        </tr>

        <?php endforeach ?>
    </table>

    <script type="text/javascript">
        window.print();
    </script>
</body>
</html>