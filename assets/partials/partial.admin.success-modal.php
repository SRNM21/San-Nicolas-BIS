<div class='f-center success-modal-container'>
    <main class='f-center f-col success-modal'>
        <header class='f-center f-col'>
            <div class='f-center icon-wrapper'><?php getSVG($modal_icon); ?></div>
            <h3><?php $modal_title; ?></h3>
        </header>
        <div>
            <p><?php $modal_success; ?></p>
        </div>
        <div class='f-col btn-wrapper'>
            <a href='<?php $origin?>barangay-officials/new-official' class='f-center modal-btn continue-btn'>Continue</a>
            <a href='<?php $origin?>barangay-officials' class='f-center modal-btn back-btn'>Back</a>
        </div>
    </main>
</div>