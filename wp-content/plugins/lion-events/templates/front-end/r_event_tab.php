<li class="nav-item col-1 p-0">
    <a class="nav-link <?php echo ($isActive == 0 ? 'active' : ''); ?> p-0 d-flex flex-column" id="<?php echo strtolower($day); ?>-tab" data-toggle="tab" href="#<?php echo strtolower($day); ?>" role="tab" aria-controls="<?php echo strtolower($day); ?>" aria-selected="true">
        <img class="m-auto" src="<?php echo content_url() . '/uploads/' . $icon_url; ?>" alt="Icon Related to Image" />
    </a>
</li>