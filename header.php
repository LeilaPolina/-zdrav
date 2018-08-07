<div class="header-menu">
	<div class="wrapper">
		<div class="menu-nav">
			<div class="menu-logo"></div>
			<div class="menu-links">
				<a id="general-inf" href="test.php">
					<p><span class="header-icon general-data-icon"></span> Общие сведения</p>
				</a>
				<a id="health-in-numbers" href="health.php">
					<p><span class="header-icon health-icon"></span> Моё здоровье в цифрах</p>
				</a>
				<a id="my-documents" href="docs.php">
					<p><span class="header-icon documents-icon"></span> Мои документы</p>
				</a>
				<a id="shop" href="shop.php">
					<p><span class="header-icon shop-icon"></span> Магазин</p>
				</a>
				<a id="services" href="services.php">
					<p><span class="header-icon services-icon"></span> Сервисы</p>
                </a>
                <?php if($user->is_logged_in()) {
                echo '<a class="sign-out" href="#">';
				echo '<p><span class="header-icon sign-out-icon"></span> Выход</p>';
                echo '</a>';
                }
                ?>
			</div>
			<div class="responsive-icon"></div>
		</div>
	</div>
</div>

<!-- mobile -->
<div class="responsive-navbar-menu">
		<a id="general-inf" href="test.php">
			<p><span class="header-icon general-data-icon"></span> Общие сведения</p>
		</a>
		<a id="health-in-numbers" href="health.php">
			<p><span class="header-icon health-icon"></span> Моё здоровье в цифрах</p>
		</a>
		<a id="my-documents" href="docs.php">
			<p><span class="header-icon documents-icon"></span> Мои документы</p>
		</a>
		<a id="shop" href="shop.php">
			<p><span class="header-icon shop-icon"></span> Магазин</p>
		</a>
		<a id="services" href="services.php">
			<p><span class="header-icon services-icon"></span> Сервисы</p>
        </a>
        <?php if($user->is_logged_in()) {
        echo '<a class="sign-out" href="#">';
		echo '<p><span class="header-icon sign-out-icon"></span> Выход</p>';
        echo '</a>';
        }
        ?>
</div>