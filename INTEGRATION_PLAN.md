# Online Result Portal integration

The public Web.com PHP portal must not link to PDFs directly.  It verifies the
patient, then calls the local API through `https://pdf-api.svgh.ph`.

## Files to deploy

### Web.com (`public_html/test-online`)

* `patient-home.php` — shows the released results that the verified patient can open.
* `view-result.php` — streams an authorised result through the public site.
* `portal-config.example.php` — copy to a private config location and add Cloudflare Access credentials.

### XAMPP PC (`D:\xampp\htdocs\svgh-online-result`)

* `local-api/result-api.php` — API endpoint that lists released results and serves one selected PDF.
* `local-api/results.example.php` — replace the sample registry with data exported from the LIS.

## Important

* Never make the `pdf` or `results` directory public through the tunnel.
* Configure Cloudflare Tunnel so that `pdf-api.svgh.ph` points to Apache, but expose only `local-api/result-api.php`.
* Protect the hostname with Cloudflare Access service-token authentication and keep the service-token secret outside `public_html`.
* Use a stable opaque `result_id`, never a filename supplied by the browser.
