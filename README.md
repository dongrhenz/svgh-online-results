# SVGH Laboratory and Diagnostic Results Portal

This is a simple PHP web app for XAMPP that lets patients search for a laboratory or diagnostic result PDF using:

- Patient name
- Patient number or OR number

## Files

- `index.php` - main search page and result viewer
- `config.php` - site settings and Google reCAPTCHA keys
- `data/patients.php` - patient registry that maps patients to PDF files
- `results/` - result PDF files

## Setup

1. Place your PDF result files inside `results/`.
2. Edit `data/patients.php` and replace the sample records with your actual patient data.
3. Create a Google reCAPTCHA v2 checkbox key pair.
4. Add the site key and secret key in `config.php`.
5. Update `skip_on_hosts` for your local hostnames and replace `production_hosts` with your real public domain.
6. Open the project through XAMPP, for example: `http://localhost:8080/svgh-lab/` or `http://svgh-lab:8080/`

## Sample search values

You can test the current sample setup with these records:

- `Juan Dela Cruz` + `P-001` or `OR-24001`
- `Maria Santos` + `P-002` or `OR-24002`
- `Pedro Reyes` + `P-003` or `OR-24003`

## reCAPTCHA behavior

- Hosts listed in `skip_on_hosts` bypass reCAPTCHA for local development.
- Hosts listed in `production_hosts` are where you should enforce reCAPTCHA in live use.
- If reCAPTCHA is required on a host but keys are blank, the search button stays disabled until you configure `config.php`.
