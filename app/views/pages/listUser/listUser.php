<?php $this->layout('master', ['title' => $title, 'users' => $users]); ?>

<div class="container">
    <div class="c-log">
        <div class="c-log__container">
            <a href="/sign-up" class="c-log__btn create">+ Create new User</a>
            <table class="c-log__table">
                <thead class="c-log__group-head">
                    <th class="c-log__title">Name</th>
                    <th class="c-log__title">Email</th>
                    <th class="c-log__title">Password</th>
                    <th class="c-log__title action">Action</th>
                </thead>
                <tbody class="c-log__group-body">
                <?php if(logged()): ?>
                    <?php foreach ($users as $user) : ?>
                        <tr class="c-log__group-data">
                        <?php if(user()['idUser'] === $user['idUser']): ?>
                            <td class="c-log__item"><?php echo $user['nameUser']; ?></td>
                            <td class="c-log__item"><?php echo $user['emailUser']; ?></td>
                            <td class="c-log__item"><?php echo $user['passwordUser']; ?></td>
                            <td class="c-log__item">
                                    <a role="button" href="/user/<?php echo $user['idUser']; ?>" class="c-log__btn edit">
                                        Edit
                                    </a>
                                    <a role="button" href="/user/delete/<?php echo $user['idUser']; ?>" class="c-log__btn delete">
                                        Delete
                                    </a>
                                </td>
                        <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                                         
                <?php endif; ?>                         
                </tbody>
            </table>
        </div>
    </div>
</div>