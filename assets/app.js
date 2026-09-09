const form = document.querySelector('[data-search-form]');
const submitButton = document.querySelector('[data-submit-button]');
const statusNote = document.querySelector('[data-captcha-note]');

if (form && submitButton && statusNote) {
    const recaptchaEnabled = form.dataset.recaptchaEnabled === '1';
    const siteKeyConfigured = form.dataset.siteKeyConfigured === '1';

    const updateSubmitState = (enabled, message) => {
        submitButton.disabled = !enabled;
        statusNote.textContent = message;
    };

    if (!recaptchaEnabled) {
        updateSubmitState(true, 'reCAPTCHA is disabled for local setup.');
    } else if (!siteKeyConfigured) {
        updateSubmitState(false, 'Add your Google reCAPTCHA site key in config.php to enable search.');
    } else {
        updateSubmitState(false, 'Complete the reCAPTCHA to enable the search button.');
    }

    window.onRecaptchaSuccess = function () {
        updateSubmitState(true, 'Verification complete. You can now search for the result.');
    };

    window.onRecaptchaExpired = function () {
        updateSubmitState(false, 'reCAPTCHA expired. Please verify again.');
    };
}
