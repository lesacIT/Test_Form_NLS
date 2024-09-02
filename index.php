<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-8 form-section">
                 <h2 class="d-flex justify-content-between align-items-center">
                    Send us a Message
                    <i class="far fa-envelope"></i>
                </h2>
                <form id="contactForm" action="process.php" method="post" novalidate>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="text" class="form-control" id="company" name="company" placeholder="Company" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" id="message" name="message" rows="4" placeholder="Message" required></textarea>
                    </div>
                    <div class="mb-3 text-end">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </form>
            </div>
            <div class="col-md-4 contact-info">
                <h2>Contact Information</h2>
                <p><i class="fas fa-map-marker-alt"></i> 360 King Street<br>Feasterville Trevose, PA 19053</p>
                <p><i class="fas fa-phone-alt"></i> (800) 900-200-300</p>
                <p><i class="far fa-envelope"></i> info@example.com</p>
                <div class="social-icons">
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-linkedin-in"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Popup lỗi -->
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="errorModalLabel">Face-plant!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <p>Ooops, something went wrong.</p>
                    <div class="error-icon mb-4">&#10005;</div>
                    <ul id="errorList" class="text-start"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Try again</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('contactForm').addEventListener('submit', function(event) {
            event.preventDefault();
            var form = event.target;
            var isValid = form.checkValidity();
            if (!isValid) {
                var errorList = document.getElementById('errorList');
                errorList.innerHTML = '';
                var elements = form.elements;
                for (var i = 0; i < elements.length; i++) {
                    if (!elements[i].checkValidity()) {
                        var errorItem = document.createElement('li');
                        errorItem.textContent = elements[i].placeholder + ' is required.';
                        errorList.appendChild(errorItem);
                    }
                }
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            } else {
                form.submit();
            }
        });
    </script>
</body>
</html>
