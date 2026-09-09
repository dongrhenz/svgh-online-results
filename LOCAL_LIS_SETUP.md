# Local LIS result scanner setup

The local API reads only existing final PDFs from the SBSI share:

`\\172.22.60.5\SBSI LIS Pro\.PDF ResultsYYYYMMDD\{Chemistry,Fecalysis,Hematology,ImmunoSero,Urinalysis}\CASENO_LASTNAME, FIRSTNAME.pdf`

## Before exposing the API

1. Create `D:\xampp\private\online-results-local.php` from `local-api/online-results-local.example.php` and replace the placeholder secret with a long random value.
2. Ensure the Windows account running Apache has read-only access to `\\172.22.60.5\SBSI LIS Pro`.
3. Configure Cloudflare Access on `pdf-api.svgh.ph` and allow only the Web.com portal service token.
4. Configure the tunnel/Apache virtual host to make only `local-api/lis-result-api.php` accessible. Do not expose the LIS share or any `pdf` directory.

## API calls from the hosted portal

* Lookup: `action=lookup`, `case_no`, `last_name`
* Download: `action=download`, `case_no`, `last_name`, `result_id`

The valid `result_id` values are `Hematology`, `Fecalysis`, `Urinalysis`, `Chemistry`, and `ImmunoSero`; the local API still verifies the matching case number and surname before returning a file.
