<?php
$docs = new LDTemplate( __DIR__ );
$nav = new LDTemplate( __DIR__ . '/nav' );

$pdf = plugins_url() . '/lion-docs/docs/test.pdf';
$pdf2 = plugins_url() . '/lion-docs/docs/test2.pdf';

// To go down below 
// echo $nav->render('ld-nav');
?>

<div class='container-fluid'>
    <div class='row py-3'>
        <div class='col-2'>
            <h3>Side Navigation</h3>

            <?php echo $nav->render('ld-nav-link', array('filename' => $pdf, 'title' => 'Test 1')); ?>
            <?php echo $nav->render('ld-nav-link', array('filename' => $pdf2, 'title' => 'Test 2')); ?>            
        </div>
        <div class='col' id='main'>
            <?php echo $docs->render('ld-iframe', array('pdf' => $pdf)); ?>
        </div>
    </div>
</div>
