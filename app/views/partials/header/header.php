<div class="c-navbar">
    <div class="c-navbar__container">
        <div class="c-navbar__menu--burguer">
            <div class="c-navbar__group">
                <span class="c-navbar__burguer-span"></span>
                <span class="c-navbar__burguer-span"></span>
                <span class="c-navbar__burguer-span"></span>
            </div>
        </div>
        <nav class="c-navbar__menu flex">
            <li class="c-navbar__item"><a href="/" class="c-navbar__link">HOME</a></li>
            <?php if(logged()) : ?>
                <li class="c-navbar__item"><a href="/user/" class="c-navbar__link">LIST USERS</a></li>
            <?php endif; ?>
        </nav>
        <div class="c-navbar__header" style="color:white">
            <h3> Bem vindo, 
                <?php if(logged()): ?>
                    <?php echo user()['nameUser'];?> | <a href="/logout">Logout</a>
                <?php else: ?>
                    visitante
                <?php endif; ?>
            </h3>
        </div>
    </div>
</div>