<?php
$tpl = new LDTemplate( __DIR__ );

$pdf = plugins_url() . '/lion-docs/docs/test.pdf';
$pdf2 = plugins_url() . '/lion-docs/docs/test2.pdf';
?>

<div class='container-fluid'>
    <div class='row py-3'>
        <div class='col-2'>
            <h3>Side Navigation</h3>
            <a href='<?php echo $pdf; ?>' target='Docs'>Test 1</a><br/>
            <a href='<?php echo $pdf2; ?>' target='Docs'>Test 2</a>
        </div>
        <div class='col' id='main'>
            <?php echo $tpl->render('ld-iframe', array('pdf' => $pdf)); ?>
        </div>
    </div>
</div>