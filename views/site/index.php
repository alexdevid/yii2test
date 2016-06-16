<?php
/* @var $this yii\web\View */
use yii\helpers\Url;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-sm-12">
                <h4>Для второго задания</h4>
                <pre>
CREATE TABLE `agency_network`
(
    `agency_network_id` INTEGER NOT NULL AUTO_INCREMENT,
    `agency_network_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`agency_network_id`)
);

CREATE TABLE `agency`
(
    `agency_id` INTEGER NOT NULL AUTO_INCREMENT,
    `agency_network_id` INTEGER NOT NULL,
    `agency_name` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`agency_id`),
    INDEX `agency_FI_1` (`agency_network_id`)
);

CREATE TABLE `billing`
(
    `agency_id` INTEGER NOT NULL,
    `user_id` INTEGER NOT NULL,
    `date` DATE NOT NULL,
    `amount` FLOAT DEFAULT 0 NOT NULL,
    PRIMARY KEY (`billing_id`),
    INDEX `billing_FI_1` (`agency_id`)
);
                </pre>
            </div>
        </div>
    </div>
</div>
