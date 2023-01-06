<?php $this->layout('master', ['title' => $title]); ?>

<div class="container">
    <div class="c-form">
        <div class="c-form__container">
            <div class="c-form__header">
                <h2 class="c-form__title"><?php echo $txtAction ?></h2>
            </div>
            <form class="c-form__menu" action="/user/create/" method="POST">
                <div class="c-form__list">
                    <div class="c-form__group">
                        <div class="c-form__item">
                            <input class="c-form__input-text" type="text" name="name" placeholder="Name: " value="<?php if (!empty($user['nameUser'])) : echo $user['nameUser'];
                                                                                                                    endif; ?>" />
                        </div>
                        <div class="c-form__item">
                            <input class="c-form__input-text" type="email" name="email" placeholder="Email: " value="<?php if (!empty($user['nameUser'])) : echo $user['emailUser'];
                                                                                                                        endif; ?>">
                        </div>
                        <div class="c-form__item">
                            <input class="c-form__input-text" type="password" name="password" placeholder="Password: ">
                        </div>
                        <div class="c-form__item">
                            <input class="c-form__input-text" type="password" name="repeat-password" placeholder="Repeat Password: ">
                        </div>
                    </div>
                    <div class="c-form__group">
                        <div class="c-form__item">
                            <?php
                            if ($txtAction === 'Sign-up') :
                                $txtLink = ['Do you have already account?', '', 'Sign-in'];
                            else :
                                $txtLink = ['Don\'t have a account?', 'sign-up', 'Sign-up'];
                            endif;
                            ?>
                            <p class="c-form__text"><?php echo $txtLink[0]; ?><a href="/<?php echo $txtLink[1]; ?>" class="c-form__link"><?php echo $txtLink[2]; ?></a></p>
                        </div>
                        <div class="c-form__item">
                            <button class="c-form__btn"><?php echo $txtAction ?></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>