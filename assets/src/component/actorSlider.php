<div class="sm:hidden">
    <swiper-container class="my-thumbs" slides-per-view="1.5" rewind="true" spaceBetween="20" freeMode="true">
        <?php foreach ($movie['actor_movie'] as $actor) {
            ?>
            <swiper-slide>
                <div class="flex flex-col items-center">
                    <img <?php if(isset($actor['photo_actor'])) {?>src="<?= $actor['photo_actor'] ?> " alt="photo acteur" <?php ;} else {echo 'src="assets/img/acteur/anonyme.jpg" " alt="photo anonyme" ';} ?> class="w-auto  h-[300px]" />
                    <p class="text-white text-lg font-bold">
                        <?= $actor['name_actor'] ?>
                    </p>
                    <p class="text-white text-md italic ">Rôle : <?php if (isset($actor['role_movie'])) { echo $actor['role_movie'] ;} else { echo 'Non défénie'; } ?></p>
                </div>
            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Mobile -->
<div class="hidden sm:block md:hidden">
    <swiper-container class="my-thumbs" slides-per-view="2.5" rewind="true" spaceBetween="20" freeMode="true">
        <?php foreach ($movie['actor_movie'] as $actor) {
            ?>
            <swiper-slide>
                <div class="flex flex-col items-center">
                    <img <?php if(isset($actor['photo_actor'])) {?>src="<?= $actor['photo_actor'] ?> " alt="photo acteur" <?php ;} else {echo 'src="assets/img/acteur/anonyme.jpg" " alt="photo anonyme" ';} ?> class="w-auto  h-[300px]" />
                    <p class="text-white text-lg font-bold">
                        <?= $actor['name_actor'] ?>
                    </p>
                    <p class="text-white text-md italic ">Rôle : <?php if (isset($actor['role_movie'])) { echo $actor['role_movie']; } else { echo 'Non défénie'; } ?></p>

                </div>
            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Tablette -->

<div class="hidden md:block lg:hidden">
    <swiper-container class="my-thumbs" slides-per-view="3.5" rewind="true" spaceBetween="20" freeMode="true">
        <?php foreach ($movie['actor_movie'] as $actor) {
            ?>
            <swiper-slide>
                <div class="flex flex-col items-center">
                    <img <?php if(isset($actor['photo_actor'])) {?>src="<?= $actor['photo_actor'] ?> " alt="photo acteur" <?php ;} else {echo 'src="assets/img/acteur/anonyme.jpg" " alt="photo anonyme" ';} ?> />
                    <p class="text-white text-lg font-bold">
                        <?= $actor['name_actor'] ?>
                    </p>
                    <p class="text-white text-md italic ">Rôle : <?php if (isset($actor['role_movie'])) { echo $actor['role_movie']; } else { echo 'Non défénie'; } ?></p>

                </div>
            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Destock -->

<div class="hidden lg:block xl:hidden">
    <swiper-container class="my-thumbs" slides-per-view="4.5" rewind="true" spaceBetween="20" freeMode="true">
        <?php foreach ($movie['actor_movie'] as $actor) {
            ?>
            <swiper-slide>
                <div class="flex flex-col items-center">
                    <img <?php if(isset($actor['photo_actor'])) {?>src="<?= $actor['photo_actor'] ?> " alt="photo acteur" <?php ;} else {echo 'src="assets/img/acteur/anonyme.jpg" " alt="photo anonyme" ';} ?> class="w-auto  h-[300px]" />
                    <p class="text-white text-lg font-bold">
                        <?= $actor['name_actor'] ?>
                    </p>
                    <p class="text-white text-md italic ">Rôle : <?php if (isset($actor['role_movie'])) { echo $actor['role_movie']; } else { echo 'Non défénie'; }; ?></p>
                </div>
            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>

<!-- Screen Xl-->

<div class="hidden xl:block">
    <swiper-container class="my-thumbs" slides-per-view="6.5" rewind="true" spaceBetween="20" freeMode="true">
        <?php foreach ($movie['actor_movie'] as $actor) {
            ?>
            <swiper-slide>
                <div class="flex flex-col items-center">
                    <img <?php if(isset($actor['photo_actor'])) {?>src="<?= $actor['photo_actor'] ?> " alt="photo acteur" <?php ;} else {echo 'src="assets/img/acteur/anonyme.jpg" " alt="photo anonyme" ';} ?> class="w-auto  h-[300px]" />
                    <p class="text-white text-lg font-bold">
                        <?= $actor['name_actor'] ?>
                    </p>
                    <p class="text-white text-md italic ">Rôle : <?php if (isset($actor['role_movie'])) { echo $actor['role_movie']; } else { echo 'Non défénie'; } ?></p>

                </div>
            </swiper-slide>
            <?php
        }
        ?>
    </swiper-container>
</div>