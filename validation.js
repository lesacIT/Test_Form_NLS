$(document).ready(function () {
    $('#contactForm').on('submit', function (e) {
        e.preventDefault();
        var isValid = true;
        var errorMessages = [];

        // Xóa lớp error khỏi tất cả các trường
        $(this).find('input, textarea').removeClass('error');

        // Kiểm tra các trường bắt buộc
        $(this).find('input[required], textarea[required]').each(function () {
            if ($(this).val().trim() === '') {
                isValid = false;
                $(this).addClass('error');
                errorMessages.push($(this).attr('placeholder') + " is required");
            }
        });

        // Kiểm tra email
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test($('#email').val())) {
            isValid = false;
            $('#email').addClass('error');
            errorMessages.push("Invalid email format");
        }

        // Kiểm tra số điện thoại
        var phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test($('#phone').val())) {
            isValid = false;
            $('#phone').addClass('error');
            errorMessages.push("Phone number should be 10 digits");
        }

        if (!isValid) {
            showErrorPopup(errorMessages);
        } else {
            this.submit();
        }
    });

    function showErrorPopup(messages) {
        // Remove existing popup if any
        $('.error-popup').remove();

        var popupHtml = `
            <div class="error-popup">
                <h2>Face-plant!</h2>
                <p>Ooops, something went wrong.</p>
                <div class="error-icon">&#10005;</div>
                <ul>
                    ${messages.map(msg => `<li>${msg}</li>`).join('')}
                </ul>
                <button id="tryAgainBtn">Try again</button>
            </div>
        `;

        $('body').append(popupHtml);

        $('#tryAgainBtn').click(function () {
            $('.error-popup').remove();
        });
    }
});
