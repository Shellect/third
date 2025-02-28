<h2>Pictures</h2>
<a href="view.php?action=getAllPictures">Get All Pictures</a>
<?php if (!empty($pictures)): ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pictures as $picture): ?>
                <tr>
                    <td><?php echo $picture->getId(); ?></td>
                    <td><?php echo $picture->getName(); ?></td>
                    <td><?php echo $picture->getDescription(); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>