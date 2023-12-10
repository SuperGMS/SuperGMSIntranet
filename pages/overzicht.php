<?php error_reporting(0); ?>

<style>
    input[type=submit] {

        background: url(<?php echo $site; ?>/img/Delete.png);

        border: 0;

        display: block;

        height: 16px;

        width: 16px;

    }



    .example222 {

        border: 3px solid white;

        border-radius: 5px 5px;

    }



    .example333 {

        border: 3px solid white;

    }
</style>

<h1>Overzicht</h1>

<?= $informatienognietafgemaakt ?>

<div class="analyse lid">


    <div class="visits">
        <a href="<?php echo $site; ?>/cijfers">
            <div class="status">

                <div class="info">

                    <h3>Mijn</h3>

                    <h1>Cijfers</h1>

                </div>

                <div class="progresss">

                    <svg>

                        <circle cx="38" cy="38" r="36"></circle>

                    </svg>

                    <div class="percentage">

                        <h1><?= $cijferCount; ?></h1>

                    </div>

                </div>

            </div>
        </a>

    </div>



    <div class="visits">
        <a href="<?php echo $site; ?>/leermiddelen">
            <div class="status">

                <div class="info">

                    <h3>Mijn</h3>

                    <h1>Leermiddelen</h1>

                </div>

                <div class="progresss">

                    <svg>

                        <circle cx="38" cy="38" r="36"></circle>

                    </svg>

                    <div class="percentage">
                        <h1> <span class="material-icons-sharp">
                                assignment
                            </span></h1>


                    </div>

                </div>

            </div>
        </a>
    </div>

    <div class="visits">
        <a href="<?php echo $site; ?>/vacatures">
            <div class="status">

                <div class="info">

                    <h3>Mijn</h3>

                    <h1>Vacatures</h1>

                </div>

                <div class="progresss">

                    <svg>

                        <circle cx="38" cy="38" r="36"></circle>

                    </svg>

                    <div class="percentage">
                        <h1> <span class="material-icons-sharp">
                                assignment
                            </span></h1>


                    </div>

                </div>

            </div>
        </a>
    </div>

</div>

<div class="analyse instructeur">

    <div class="visits">
        <a href="<?php echo $site; ?>/aanvragen">
            <div class="status">

                <div class="info">

                    <h3>Mijn</h3>

                    <h1>Aanvragen</h1>

                </div>

                <div class="progresss">

                    <svg>

                        <circle cx="38" cy="38" r="36"></circle>

                    </svg>

                    <div class="percentage">
                        <h1> <span class="material-icons-sharp">
                                assignment
                            </span></h1>


                    </div>

                </div>

            </div>
        </a>
    </div>

    <div class="visits" style="background-color:darkorange">
        <div class="status">

            <div class="info">

                <h3>De Geweldige</h3>

                <h1>Mailbox</h1>

            </div>

            <div class="progresss">

                <svg>

                    <circle cx="38" cy="38" r="36" style="stroke-dasharray: 0"></circle>

                </svg>

                <div class="percentage">
                    <h1> <span class="material-icons-sharp">
                            lock
                        </span></h1>


                </div>

            </div>

        </div>
    </div>

</div>