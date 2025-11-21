@extends('layout.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css">

    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload Your Document</h2>

        <!-- Document Upload Card -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Select a Document to Upload</h5>

                <!-- Upload Box -->
                <div class="upload-box mb-4">
                    <input type="file" class="dropify" name="" id="fileInput" accept=".pdf,.docx,.xlsx,.pptx,.txt,.jpg,.png">
                    {{-- <i class="fas fa-cloud-upload-alt"></i>
                    <p>Click or Drag to Upload</p>
                    <input type="file" id="fileInput" class="d-none" accept=".pdf,.docx,.xlsx,.pptx,.txt,.jpg,.png" />
                    <label for="fileInput" class="btn btn-outline-primary mt-3">Choose Document</label> --}}
                </div>

                <!-- File Name Display -->
                <div id="fileName" class="file-name mb-3"></div>

                <!-- Save As Field -->
                <div class="mb-3">
                    <label for="saveAs" class="form-label">Save As</label>
                    <input type="text" class="form-control" id="saveAs" placeholder="Enter a name for the document">
                </div>

                <!-- Description Field -->
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" placeholder="Enter a brief description of the document"></textarea>
                </div>

                <!-- Upload Button -->
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary mt-3">Upload Document</button>
                </div>

                <!-- Button to Trigger Modal -->
                <div class="d-flex justify-content-center mt-4">
                    <button id="previewButton" class="btn btn-success">Preview PDF</button>
                </div>

            </div>
        </div>
    </div>

    <!-- Modal for PDF Preview -->
    <div class="modal fade" id="pdfPreviewModal" tabindex="-1" aria-labelledby="pdfPreviewModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width: 50vw;">
                <div class="modal-header">
                    <h5 class="modal-title" id="pdfPreviewModalLabel">Document Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- PDF Canvas for Preview -->
                    <div class="canvas-container mb-4" style="height: 750px; overflow-y: auto;">
                        <canvas id="pdfCanvas" style="width: 100%; border: 1px solid #ddd;"></canvas>
                    </div>

                    <!-- PDF Navigation Controls -->
                    <div class="pdf-navigation d-flex justify-content-between mt-4">
                        <button id="prevPage" class="btn btn-outline-primary" disabled>Previous</button>
                        <span id="pageInfo" class="align-self-center">Page 1</span>
                        <button id="nextPage" class="btn btn-outline-primary" disabled>Next</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and PDF.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script> --}}

    <!-- JavaScript to Handle PDF Preview and Pagination -->
    <script>
        $('.dropify').dropify();
    </script>
    <script>
        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;
        const canvas = document.getElementById('pdfCanvas');
        const maxCanvasHeight = 500;  // Max height for the canvas

        // Handle file selection and render PDF
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file && file.type === "application/pdf") {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const arrayBuffer = e.target.result;
                    const loadingTask = pdfjsLib.getDocument(arrayBuffer);
                    loadingTask.promise.then(function(pdf) {
                        pdfDoc = pdf;
                        totalPages = pdf.numPages;
                    });
                };
                reader.readAsArrayBuffer(file);
            }
        });

        // Handle Preview Button Click: Show Modal and Render First Page
        document.getElementById('previewButton').addEventListener('click', function() {
            if (pdfDoc) {
                // Open the modal
                const previewModal = new bootstrap.Modal(document.getElementById('pdfPreviewModal'));
                previewModal.show();

                // Render the first page
                renderPage(currentPage);
                updatePageInfo();
                toggleNavigationButtons();
            } else {
                alert('Please select a PDF file first.');
            }
        });

        // Render the selected page of the PDF
        function renderPage(pageNum) {
            pdfDoc.getPage(pageNum).then(function(page) {
                const context = canvas.getContext('2d');
                const scale = calculateScale(page);  // Adjust scale to fit the canvas height

                const viewport = page.getViewport({ scale: scale });

                // Set the canvas width and height based on the page's viewport
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render the page to canvas
                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });
        }

        // Calculate scale based on the max canvas height
        function calculateScale(page) {
            const viewport = page.getViewport({ scale: 1 });
            const pageHeight = viewport.height;

            // If the page height exceeds max canvas height, scale down accordingly
            // const scale = (pageHeight > maxCanvasHeight) ? maxCanvasHeight / pageHeight : 1;
            const scale = 2;
            return scale;
        }

        // Update page info (current page / total pages)
        function updatePageInfo() {
            document.getElementById('pageInfo').textContent = `Page ${currentPage} of ${totalPages}`;
        }

        // Toggle navigation buttons based on current page
        function toggleNavigationButtons() {
            document.getElementById('prevPage').disabled = currentPage <= 1;
            document.getElementById('nextPage').disabled = currentPage >= totalPages;
        }

        // Navigate to previous page
        document.getElementById('prevPage').addEventListener('click', function() {
            if (currentPage > 1) {
                currentPage--;
                renderPage(currentPage);
                updatePageInfo();
                toggleNavigationButtons();
            }
        });

        // Navigate to next page
        document.getElementById('nextPage').addEventListener('click', function() {
            if (currentPage < totalPages) {
                currentPage++;
                renderPage(currentPage);
                updatePageInfo();
                toggleNavigationButtons();
            }
        });
    </script>
@endsection
