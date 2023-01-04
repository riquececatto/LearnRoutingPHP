<div class="container">
    <div class="c-log">
        <div class="c-log__container">
            <a href="/" class="c-log__btn create">+ Create new User</a>
            <table class="c-log__table">
                <thead class="c-log__group-head">
                    <th class="c-log__title">Id</th>
                    <th class="c-log__title">Name</th>
                    <th class="c-log__title">Email</th>
                    <th class="c-log__title">Password</th>
                    <th class="c-log__title action">Action</th>
                </thead>
                <tbody class="c-log__group-body">
                    <?php foreach ($users as $user) : ?>
                        <tr class="c-log__group-data">
                            <td class="c-log__item"><?php echo $user['idUser']; ?></td>
                            <td class="c-log__item"><?php echo $user['nameUser']; ?></td>
                            <td class="c-log__item"><?php echo $user['emailUser']; ?></td>
                            <td class="c-log__item"><?php echo $user['passwordUser']; ?></td>
                            <td class="c-log__item">
                                <a href="/user/<?php echo $user['idUser']; ?>" class="c-log__btn edit">Edit</a>
                                <a href="/user/delete/<?php echo $user['idUser']; ?>" class="c-log__btn delete">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>