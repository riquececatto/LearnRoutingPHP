<?php if(logged()): ?>
<div class="c-form">
    <div class="c-form__container">
        <div class="c-form__header">
            <h2 class="c-form__title">Edit</h2>
        </div>
        <form class="c-form__menu" action="/user/update/" method="POST">
            <div class="c-form__list">
                <div class="c-form__group">
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="text" name="name" placeholder="Name: " value="<?php echo user()['nameUser'] ?>">
                        <span class="c-form__text--error"><?php echo getFlash('name'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="email" name="email" placeholder="Email: " disabled value="<?php echo user()['emailUser'] ?>">
                        <span class="c-form__text--error"><?php echo getFlash('email'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="password" name="oldPassword" placeholder="Old Password: ">
                        <span class="c-form__text--error"><?php echo getFlash('oldPassword'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="password" name="password" placeholder="New Password: ">
                        <span class="c-form__text--error"><?php echo getFlash('password'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="password" name="repeatPassword" placeholder="Repeat New Password: ">
                        <span class="c-form__text--error"><?php echo getFlash('repeatPassword'); ?></span>
                    </div>
                </div>
                <div class="c-form__group">
                    <div class="c-form__item">
                        <button type="submit" class="c-form__btn">Update</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php endif; ?>