@extends('layouts.admin')

@section('title')
    Nests
@endsection

@section('content-header')
    <h1>Nests<small>All nests currently available on this system.</small></h1>
    <ol class="breadcrumb">
        <li><a href="{{ route('admin.index') }}">Admin</a></li>
        <li class="active">Nests</li>
    </ol>
@endsection

@section('content')
<div class="row">
    <div class="col-xs-12">
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Configured Nests</h3>
                <div class="box-tools">
                {{-- data-target="#bulkImportEggModal" --}}
                    <button class="btn btn-sm btn-success" data-toggle="modal" id="bulkImportEggModalBtn"><i class="fa fa-upload"></i> Bulk Import Egg</button>
                    <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#importServiceOptionModal"><i class="fa fa-upload"></i> Import Egg</button>
                    <a href="{{ route('admin.nests.new') }}" class="btn btn-primary btn-sm">Create New</a>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Eggs</th>
                        <th class="text-center">Servers</th>
                    </tr>
                    @foreach($nests as $nest)
                        <tr>
                            <td class="middle"><code>{{ $nest->id }}</code></td>
                            <td class="middle"><a href="{{ route('admin.nests.view', $nest->id) }}" data-toggle="tooltip" data-placement="right" title="{{ $nest->author }}">{{ $nest->name }}</a></td>
                            <td class="col-xs-6 middle">{{ $nest->description }}</td>
                            <td class="text-center middle">{{ $nest->eggs_count }}</td>
                            <td class="text-center middle">{{ $nest->servers_count }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="importServiceOptionModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Import an Egg</h4>
            </div>
            <form action="{{ route('admin.nests.egg.import') }}" enctype="multipart/form-data" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label" for="pImportFile">Egg File <span class="field-required"></span></label>
                        <div>
                            <input id="pImportFile" type="file" name="import_file" class="form-control" accept="application/json" />
                            <p class="small text-muted">Select the <code>.json</code> file for the new egg that you wish to import.</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="pImportToNest">Associated Nest <span class="field-required"></span></label>
                        <div>
                            <select id="pImportToNest" name="import_to_nest">
                                @foreach($nests as $nest)
                                   <option value="{{ $nest->id }}">{{ $nest->name }} &lt;{{ $nest->author }}&gt;</option>
                                @endforeach
                            </select>
                            <p class="small text-muted">Select the nest that this egg will be associated with from the dropdown. If you wish to associate it with a new nest you will need to create that nest before continuing.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Import</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Bulk Import Egg Modal -->
<div class="modal fade" tabindex="-1" role="dialog" id="bulkImportEggModal">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Bulk Import Eggs</h4>
            </div>
            {{-- <form action="#" enctype="multipart/form-data" method="POST" id="bulkImportForm"> --}}
                <div class="modal-body" style="max-height: 70vh; overflow-y: auto; scrollbar-width: none; -ms-overflow-style: none;">

                    <!-- Container for dynamic egg upload fields -->
                    <div id="eggUploadContainer" style="padding: 10px; position: relative;">
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <div class="text-left" style="float: left;">
                        <button type="button" class="btn btn-primary" id="addEggUploadBtn">
                            <i class="fa fa-plus"></i>  Add Another Egg
                        </button>
                    </div>
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="bulkImportBtn">Bulk Import</button>
                </div>
            {{-- </form> --}}
        </div>
    </div>
</div>
@endsection

@section('footer-scripts')
    @parent
    <script>
        $(document).ready(function() {
            let eggUploadItems = {};
            const MAX_EGG_UPLOADS = 10;

            // Cache your selectors in a single object
            const selectors = {
                addEggUploadBtn: $('#addEggUploadBtn'),
                pImportToNest: $('#pImportToNest'),
                eggUploadContainer: $('#eggUploadContainer'),
                bulkImportBtn: $('#bulkImportBtn'),
                bulkImportEggModalBtn: $('#bulkImportEggModalBtn'),
                bulkImportEggModal: $('#bulkImportEggModal')
            };

            function createEggUploadTemplate(id = 0, is_hidden = false) {
                return `
                    <div class="egg-upload-item-${id}" style="margin-bottom: 5px; padding: 10px; border-bottom: 1px solid #ddd;">
                        <div id="egg-upload-status-${id}"></div>
                      
                        <div class="form-group">
                            <label class="control-label">Egg File <span class="field-required"></span></label>
                            <div>
                                <input type="file" name="import_files[]" class="form-control egg-file-input" data-id="${id}" accept="application/json" required />
                                <p class="small text-muted">Select the <code>.json</code> file for the new egg that you wish to import.</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Associated Nest <span class="field-required"></span></label>
                            <div>
                                <select class="form-control nest-select" name="import_to_nests[]" data-id="${id}">
                                    @foreach($nests as $nest)
                                    <option value="{{ $nest->id }}">{{ $nest->name }} &lt;{{ $nest->author }}&gt;</option>
                                    @endforeach
                                </select>
                                <p class="small text-muted">Select the nest that this egg will be associated with from the dropdown.</p>
                            </div>
                        </div>
                        
                        ${id >= 2 ? `<div class="text-right">
                            <button type="button" class="btn btn-danger btn-sm remove-egg-btn" data-id="${id}">
                                <i class="fa fa-trash"></i> Remove
                            </button>
                        </div>` : ''}
                    </div>
                `;
            }


            async function setupEggUploadItemEvents($newItem, id) {
                const $nestSelect = $newItem.find('.nest-select');
                $nestSelect.select2({
                    width: '100%',
                    dropdownParent: selectors.bulkImportEggModal
                }).on('change', function() {
                    eggUploadItems[$(this).data('id')].selected_nest = parseInt($(this).val());
                });
                
                eggUploadItems[id].selected_nest = parseInt($nestSelect.val());
                
                $newItem.find('.egg-file-input').on('change', function(e) {
                    if (e.target.files.length > 0) {
                        eggUploadItems[$(this).data('id')].uploaded_file = e.target.files[0];
                    }
                });
            }

            async function appendNewEggUploadItem(id = 0, is_hidden = false) {
                if (eggUploadItems[id]) return null;
                
                if (Object.keys(eggUploadItems).length >= MAX_EGG_UPLOADS) {
                    alert(`You can only add up to ${MAX_EGG_UPLOADS} eggs at once.`);
                    return null;
                }
                
                const template = createEggUploadTemplate(id, is_hidden);
                const $newItem = $(template);
                selectors.eggUploadContainer.append($newItem);
                
                eggUploadItems[id] = {
                    id: id,
                    element: $newItem,
                    uploaded_file: null,
                    selected_nest: null,
                    hidden: is_hidden
                };

                await setupEggUploadItemEvents($newItem, id);

                updateAddButtonState();

                return $newItem;
            }

            function updateAddButtonState() {
                selectors.addEggUploadBtn.prop('disabled', Object.keys(eggUploadItems).length >= MAX_EGG_UPLOADS);
            }

            async function getCsrfToken() {
                try {
                    const response = await fetch('/admin/api/csrf-token');
                    if (!response.ok) return null;
                    const data = await response.json();
                    return data?.csrf_token || null;
                } catch (error) {
                    console.error('Error fetching CSRF token:', error);
                    return null;
                }
            }

            async function processBulkUploads() {
                const validItems = Object.fromEntries(
                    Object.entries(eggUploadItems).filter(([_, item]) => item.uploaded_file && item.selected_nest)
                );
                
                if (Object.keys(validItems).length === 0) { 
                    console.log('No valid items to process'); 
                    return; 
                }
                
                // Disable the import button and show loading state
                selectors.bulkImportBtn.prop('disabled', true).html('<i class="fa fa-spinner fa-spin"></i> Importing...');
                
                let successCount = 0;
                let totalCount = Object.keys(validItems).length;
                let importResults = [];
                
                for (const item of Object.values(validItems)) {
                    // Hide the form elements for this item
                    $(`#egg-upload-${item.id}-hidden`).hide();
                    
                    // Show a loading indicator
                    $(`#egg-upload-status-${item.id}`).html(
                        `<div class="alert alert-info">
                            <i class="fa fa-spinner fa-spin"></i> Importing egg file...
                        </div>`
                    );

                    try {
                        const formData = new FormData();
                        formData.append('import_file', item.uploaded_file);
                        formData.append('import_to_nest', item.selected_nest);
                        formData.append('_token', await getCsrfToken());
                        
                        const response = await fetch('/admin/nests/import', {
                            method: 'POST',
                            body: formData,
                            credentials: 'same-origin'
                        });
                        
                        if (!response.ok) throw new Error(`HTTP error! Status: ${response.status}`);
                        
                        const responseText = await response.text();
                        const nameMatch = responseText.match(/<input[^>]*id="pName"[^>]*value="([^"]*)"[^>]*>/);
                        const eggName = nameMatch?.[1] || "Unknown Egg";
                        const isSuccess = responseText.includes('Successfully imported');
                        
                        if (isSuccess) {
                            successCount++;
                            importResults.push({
                                success: true,
                                name: eggName,
                                message: 'Successfully imported'
                            });
                        } else {
                            importResults.push({
                                success: false,
                                name: eggName,
                                message: 'Import failed'
                            });
                        }
                        
                        $(`#egg-upload-status-${item.id}`).remove();
                    
                    } catch (error) {
                        importResults.push({
                            success: false,
                            name: item.uploaded_file?.name || 'Unknown',
                            message: error.message
                        });
                        
                       
                    }
                }
                
                // Re-enable the import button
                selectors.bulkImportBtn.prop('disabled', false).html('Bulk Import');
                
                // Close the current modal
                selectors.bulkImportEggModal.modal('hide');
                
                // Create and show a new summary modal
                const summaryModalId = 'importSummaryModal';
                const summaryModal = `
                    <div class="modal fade" id="${summaryModalId}" tabindex="-1" role="dialog">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title">Import Summary</h4>
                                </div>
                                <div class="modal-body">
                                    <div class="alert alert-${successCount === totalCount ? 'success' : successCount > 0 ? 'warning' : 'danger'}">
                                        <h4><i class="fa fa-${successCount === totalCount ? 'check' : 'info'}-circle"></i> Import Results</h4>
                                        <p>Successfully imported ${successCount} of ${totalCount} eggs.</p>
                                        ${successCount > 0 ? '<p>The imported eggs are now available in their respective nests.</p>' : ''}
                                    </div>
                                    
                                    <div class="table-responsive no-padding">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Status</th>
                                                    <th>Egg Name</th>
                                                    <th>Message</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                ${importResults.map(result => `
                                                    <tr>
                                                        <td class="middle"><i class="fa fa-${result.success ? 'check text-success' : 'times text-danger'}"></i></td>
                                                        <td class="middle">${result.name}</td>
                                                        <td class="middle">${result.message}</td>
                                                    </tr>
                                                `).join('')}
                                            </tbody>
                                        </table>
                                    </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary" id="importMoreBtn">Import More</button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                // Add the modal to the body if it doesn't exist
                if (!$(`#${summaryModalId}`).length) {
                    $('body').append(summaryModal);
                } else {
                    $(`#${summaryModalId}`).replaceWith(summaryModal);
                }
                
                // Show the summary modal
                $(`#${summaryModalId}`).modal('show');
                
                // Add event listener for the "Import More" button
                $('#importMoreBtn').on('click', function() {
                    $(`#${summaryModalId}`).modal('hide');
                    setTimeout(() => {
                        resetAndOpenModal();
                    }, 500);
                });
                
                // Add event listener for when the summary modal is closed
                $(`#${summaryModalId}`).on('hidden.bs.modal', function() {
                    // Clean up the modal from the DOM
                    $(this).remove();
                });
            }

            function clickListeners() {
                selectors.addEggUploadBtn.on('click', async function() {
                    let nextId = 1;
                    while (eggUploadItems[nextId]) nextId++;
                    await appendNewEggUploadItem(nextId);
                });
                
                selectors.eggUploadContainer.on('click', '.remove-egg-btn', function() {
                    const id = $(this).data('id');
                    $(`.egg-upload-item-${id}`).remove();
                    delete eggUploadItems[id];
                    updateAddButtonState();
                });
                
                selectors.bulkImportBtn.on('click', async () => await processBulkUploads());
                selectors.bulkImportEggModalBtn.on('click', async () => await resetAndOpenModal());
            }

            function elementEdits() {
                selectors.pImportToNest.select2();
                $("<style>::-webkit-scrollbar { display: none; }</style>").appendTo("head");
            }

            async function initializeEggUploadSystem() {
                clickListeners();
                elementEdits();
            }
            
            async function resetAndOpenModal() {
                eggUploadItems = {};
                selectors.eggUploadContainer.empty();
                await appendNewEggUploadItem(1);
            
                $('.nest-select').select2({
                    width: '100%',
                    dropdownParent: selectors.bulkImportEggModal
                });
                
                selectors.bulkImportEggModal.modal('show');
            }
            
            (async () => {
                await initializeEggUploadSystem();
            })();
        });
    </script>
@endsection
