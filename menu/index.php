<?php
////tegelikult peavad olema conf.php failis
define('BASE_DIR', './'); // define('BASE_DIR', '../');
require_once(BASE_DIR.'conf.php');
//
/*echo '<pre>';
print_r($sess);
echo '</pre>';*/

$mainTmpl = new Template('main');
$mainTmpl->set('title', 'Menu Application');

$contentTmpl = new Template('content');

$courseCardTmpl = new Template('course_card');

$courseCardHeaderTmpl = new Template('course_card_header');
$courseCardDataTmpl = new Template('course_card_data');

$courseDatalistTmpl = new Template('course_data_list');

$courseNames = array(
    array(
        'name' => 'praed',
        'icon' => 'fa-utensils',
        'data' => array(
            array(
                'dish_name' => 'Sealihapada ploomide ja aprikoosiga',
                'dish_description' => 'sealihapada, lisand, salat, leib',
                'dish_price' => 2.65,
                'discount' => 2.25
            ),
            array(
                'dish_name' => 'Praetud kanakints',
                'dish_description' => 'praetud kana, lisand, salat, leib',
                'dish_price' => 2.50,
                'discount' => 2.13
            )
        )
    ),
    array(
        'name' => 'supid',
        'icon' => 'fa-utensil-spoon',
        'data' => array(
            array(
                'dish_name' => 'Rassolnik',
                'dish_description' => 'supp, hapukoor, leib',
                'dish_price' => 1.10,
                'discount' => 0.94
            )
        )
    )
);



foreach ($courseNames as $courseName => $courseIcon){
    $courseCardHeaderTmpl->set('course_name', $courseName);
    $courseCardHeaderTmpl->set('course_icon', $courseIcon);
    $courseCardTmpl->set('course_card_header', $courseCardHeaderTmpl->parse());

    $courseCardDataTmpl->set('course_name', $courseName);
    $courseCardDataTmpl->set('course_data_list', $courseDatalistTmpl->parse());
    $courseCardTmpl->set('course_card_data', $courseCardDataTmpl->parse());



    $contentTmpl->add('course_cards', $courseCardTmpl->parse());
}



$mainTmpl->set('content', $contentTmpl->parse());

$mainTmplContent = $mainTmpl->parse();
echo $mainTmplContent;
