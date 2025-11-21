@extends('layout.app')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-4">Upload Your Document</h2>

        <!-- Document Upload Card -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Select a Document to Upload</h5>

                <!-- PDF Canvas for Preview -->
                <div class="canvas-container mb-4">
                    <canvas id="pdfCanvas" style="width: 100%; border: 1px solid #ddd;"></canvas>
                </div>

                <!-- Upload Box -->
                <div class="upload-box mb-4">
                    <i class="fas fa-cloud-upload-alt"></i>
                    <p>Click or Drag to Upload</p>
                    <!-- Hidden file input field -->
                    <input type="file" id="fileInput" class="d-none" accept=".pdf,.docx,.xlsx,.pptx,.txt,.jpg,.png" />
                    <!-- Label for the file input -->
                    <label for="fileInput" class="btn btn-outline-primary mt-3">Choose Document</label>
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

                <!-- PDF Navigation Controls -->
                <div class="pdf-navigation d-flex justify-content-between mt-4">
                    <button id="prevPage" class="btn btn-outline-primary" disabled>Previous</button>
                    <span id="pageInfo" class="align-self-center">Page 1</span>
                    <button id="nextPage" class="btn btn-outline-primary" disabled>Next</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>

    <!-- JavaScript to Handle PDF Preview and Pagination -->
    <script>
        let pdfDoc = null;
        let currentPage = 1;
        let totalPages = 0;

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
                        renderPage(currentPage);
                        updatePageInfo();
                        toggleNavigationButtons();
                    });
                };
                reader.readAsArrayBuffer(file);
            }
        });

        // Render the selected page of the PDF
        function renderPage(pageNum) {
            pdfDoc.getPage(pageNum).then(function(page) {
                const canvas = document.getElementById('pdfCanvas');
                const context = canvas.getContext('2d');
                const scale = 1.5;  // Scale factor for better resolution
                const viewport = page.getViewport({ scale: scale });

                canvas.height = viewport.height;
                canvas.width = viewport.width;

                // Render the page to canvas
                page.render({
                    canvasContext: context,
                    viewport: viewport
                });
            });
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

        // Display the selected file name
        document.getElementById('fileInput').addEventListener('change', function(event) {
            const fileName = event.target.files[0]?.name;
            const fileNameDisplay = document.getElementById('fileName');
            if (fileName) {
                fileNameDisplay.textContent = `Selected File: ${fileName}`;
            } else {
                fileNameDisplay.textContent = ''; // Clear if no file is selected
            }
        });
    </script>
@endsection
