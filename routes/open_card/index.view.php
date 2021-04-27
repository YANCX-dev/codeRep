<?php require_once $_SERVER["DOCUMENT_ROOT"] . "/templates/header.php" ?>
<?php include $_SERVER["DOCUMENT_ROOT"]."/templates/background.php"?>
<div class="card-openbox">
    <section id="slider_bl">
        <div class="wrapper1">
            <input checked type=radio name="slider" id="slide1" />
            <input type=radio name="slider" id="slide2" />
            <input type=radio name="slider" id="slide3" />
            <input type=radio name="slider" id="slide4" />
            <div class="slider-wrapper">
                <div class=inner>
                    <?php for($i=0; $i<count($styles); $i++): ?>
                    <article>
                        <div class="info <?=$styles[$i]?>">
                            <img src="/resource/img/<?=$imagesForFlat[$i]->image_name?>" />
                    </article>
                    <?php endfor ?>
                </div>
            </div>
            <div class="slider-prev-next-control">
                <label for=slide1></label>
                <label for=slide2></label>
                <label for=slide3></label>
                <label for=slide4></label>
            </div>
            <div class="slider-dot-control">
                <label for=slide1></label>
                <label for=slide2></label>
                <label for=slide3></label>
                <label for=slide4></label>
            </div>
        </div>
    </section>
    <div class="card-openbox__descr">
        <h1 class="card-openbox-title"><?=$flat->street_name?></h1>
        <div class="card-openbox-inf">
            <p class="card-openbox-price">Цена:<?=$flat->price?></p>
            <p class="card-openbox-district">Район:<?=$flat->district_name?></p>
            <p class="card-openbox-district">Тип:<?=$flat->type?></p>
        </div>
        <div class="card-openbox-descr">
            <div class="card-openbox-descr-bg"><p><?=$flat->descr?></p></div>
            <div class="card-openbox-descr-bg el-align">
                <p style="font-size: 20px">Состав квартиры:</p>
                <?for ($i=0;$i<count($flatEl);$i++):?>
                    <p><?=$flatEl[$i]->element_name?></p>
                <?php endfor;?>
            </div>
        </div>
        <div class="btn-create-request">
            <form method="post" action="/routes/request/index.php">
                <input hidden value="<?=$flat->id?>" name="flat_id">
                <input type="submit" class="glo" value="Оставить заявку" name="order-submit">
            </form>
        </div>
    </div>
</div>

</body>
</html>