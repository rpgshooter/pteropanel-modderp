# Bulk Egg JSON Uploader

## Overview

The Bulk Egg JSON Uploader allows Pterodactyl administrators to import multiple egg configuration files simultaneously, supporting up to 10 JSON files in a single operation.

## Key Features

- Upload multiple egg JSON files at once
- Assign each file to its appropriate nest
- Process uploads asynchronously with real-time status updates
- Remove unwanted uploads from the queue before processing
- View comprehensive success/failure summary after completion

## Technical Details

The uploader implements:
- Asynchronous JavaScript processing
- FormData API for file handling
- CSRF token validation for security
- Sequential processing to prevent server overload
- Dynamic interface with status indicators

After processing, a summary report displays success/failure status for each upload with an option to import more eggs immediately.

This tool significantly improves efficiency by eliminating the need to process egg configurations one at a time.

---

### Screenshot: Bulk Import Modal
![Bulk Import Modal](https://github.com/lachie4145/random_images/blob/main/brave_uyZXJevsRl.png?raw=true)
*The bulk import interface allows selecting multiple egg files and assigning them to appropriate nests*

### Screenshot: Import Summary Modal
![Import Progress](https://github.com/lachie4145/random_images/blob/main/brave_FzktJbnFta.png?raw=true)

