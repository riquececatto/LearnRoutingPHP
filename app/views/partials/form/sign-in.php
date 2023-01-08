<?php if(!logged()) : ?>
<div class="c-form">
    <div class="c-form__container">
        <div class="c-form__header">
            <h2 class="c-form__title">Sign in</h2>
        </div>
        <form class="c-form__menu " action="/user/login/" method="POST">
            <div class="c-form__list">
                <div class="c-form__group">
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="email" name="email" placeholder="Email: " id="">
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="password" name="password" placeholder="Password: " id="">
                    </div>
                </div>
                <div class="c-form__group">
                    <div class="c-form__item">
                        <p class="c-form__text">Don't have a account?<a href="/sign-up" class="c-form__link">Sign-up</a></p>
                    </div>
                    <div class="c-form__item">
                        <button type="submit" class="c-form__btn">Sign in</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<?php else: ?>
    <?php return redirect('/user/'); ?>
<?php endif; ?>