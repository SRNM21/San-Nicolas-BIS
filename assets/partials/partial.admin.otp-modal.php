<div class='f-center otp-modal'>
    <div class='f-col otp-modal-content'>
        <form class='f-col otp-form' action='administrator/verification' method='POST'>
            <h3>Verify your account</h3>
            <p>The OTP password was sent to <?= $censored_email ?></p>
            <div class='f-row otp-input-wrapper'>
                <input value='<?= $_SESSION['OTP'] ?>' class='otp-input' type='text' name='otp'>
                <button class='f-center verify-otp-btn' type='submit'>Verify OTP</button>
            </div>
        </form>
        <div class='f-center f-row resend-wrapper'> 
            <p class='hint-otp'>Did not receive an email?</p> 
            <button class='resend-otp-btn'>Resend</button>
        </div>
    </div>
</div>