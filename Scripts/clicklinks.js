document.addEventListener('DOMContentLoaded', function () {
    // Smooth scrolling and popup functionality for navigation links
    document.querySelectorAll('nav ul li a').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetSection = this.getAttribute('href').substring(1); // Get the section ID without the #

            // Show popup for About, Contact, or IT Consultancy sections
            if (targetSection === 'about' || targetSection === 'contact' || targetSection === 'consultancy') {
                const popup = document.querySelector(`#${targetSection} .popup`);
                const popupOverlay = document.getElementById('popupOverlay');
                
                popup.style.display = 'block';
                popupOverlay.style.display = 'block';

                // Close popup when clicking outside of it
                popupOverlay.addEventListener('click', function () {
                    popup.style.display = 'none';
                    popupOverlay.style.display = 'none';
                });
            }

            // Smooth scroll to section
            document.querySelector(`#${targetSection}`).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // IT Consultancy section popup functionality
    document.querySelectorAll('.service.consultancy').forEach(service => {
        service.addEventListener('click', function () {
            const popupSection = document.getElementById('consultancy-popup');
            const popupOverlay = document.getElementById('popupOverlay');

            popupSection.style.display = 'flex';
            popupOverlay.style.display = 'block';

            // Close popup when clicking outside of it
            popupOverlay.addEventListener('click', function () {
                popupSection.style.display = 'none';
                popupOverlay.style.display = 'none';
            });
        });
    });
});

