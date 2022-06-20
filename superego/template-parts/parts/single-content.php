<? if (get_the_content()) : ?>
    <section id="single-content" class="section" itemprop="text">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <? the_content(); ?>
                </div>
            </div>
        </div>
    </section>
<? endif; ?>