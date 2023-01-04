<div class="c-form">
    <div class="c-form__container">
        <div class="c-form__header">
            <h2 class="c-form__title">Sign-up</h2>
        </div>
        <form class="c-form__menu" action="/user/create/" method="POST">
            <div class="c-form__list">
                <div class="c-form__group">
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="text" name="name" placeholder="Name: ">
                        <span class="c-form__text--error"><?php echo getFlash('name'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="email" name="email" placeholder="Email: ">
                        <span class="c-form__text--error"><?php echo getFlash('email'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="password" name="password" placeholder="Password: ">
                        <span class="c-form__text--error"><?php echo getFlash('password'); ?></span>
                    </div>
                    <div class="c-form__item">
                        <input class="c-form__input-text" type="password" name="repeat-password" placeholder="Repeat Password: ">
                        <span class="c-form__text--error"><?php echo getFlash('repeatPassword'); ?></span>
                    </div>
                </div>
                <div class="c-form__group">
                    <div class="c-form__item">
                        <p class="c-form__text">Do you have already account?<a href="/" class="c-form__link">Sign-in</a></p>
                    </div>
                    <div class="c-form__item">
                        <button class="c-form__btn">Sign-up</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>