<div class="container">
    <div class="log">
        <div class="container">
            <table class="c-log">
                <thead class="c-log__group-head">
                    <th class="c-log__title">Id</th>
                    <th class="c-log__title">Name</th>
                    <th class="c-log__title">Email</th>
                    <th class="c-log__title">Password</th>
                </thead>
                <tbody class="c-log__group-body">
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <td class="c-log__text"><?php echo $user['idUser']; ?></td>
                            <td class="c-log__text"><?php echo $user['nameUser']; ?></td>
                            <td class="c-log__text"><?php echo $user['emailUser']; ?></td>
                            <td class="c-log__text"><?php echo $user['passwordUser']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>