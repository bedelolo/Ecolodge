/**
 * Booking Modal Manager
 * Handles the display and interaction of booking forms in a modal
 */

(function($) {
    'use strict';

    // Modal HTML Template
    const modalTemplate = `
        <div class="booking-modal-overlay" id="bookingModal">
            <div class="booking-modal">
                <div class="booking-modal-header">
                    <button class="booking-modal-close" onclick="closeBookingModal()">&times;</button>
                    <h2 class="room-name"></h2>
                    <div class="room-price"></div>
                </div>
                <div class="booking-modal-body">
                    <p class="room-description"></p>
                    <div class="amenities-list">
                        <h4>Équipements</h4>
                        <ul class="amenities-items"></ul>
                    </div>
                    <form class="booking-modal-form" action="" method="POST">
                        <input type="hidden" name="_token" value="${$('meta[name="csrf-token"]').attr('content')}">
                        <input type="hidden" name="room_id" class="modal-room-id">
                        
                        <div class="form-group">
                            <label for="modal-customer-name">Nom complet *</label>
                            <input type="text" name="customer_name" id="modal-customer-name" class="form-control" placeholder="Votre nom complet" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="modal-customer-email">Email *</label>
                            <input type="email" name="customer_email" id="modal-customer-email" class="form-control" placeholder="votre@email.com" required>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group">
                                <label for="modal-check-in">Date d'arrivée *</label>
                                <input type="date" name="check_in" id="modal-check-in" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="modal-check-out">Date de départ *</label>
                                <input type="date" name="check_out" id="modal-check-out" class="form-control" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="modal-guests">Nombre de personnes *</label>
                            <input type="number" name="guests" id="modal-guests" class="form-control" value="1" min="1" max="10" required>
                        </div>
                        
                        <button type="submit" class="submit-btn">Confirmer la réservation</button>
                    </form>
                </div>
            </div>
        </div>
    `;

    // Initialize modal on page load
    $(document).ready(function() {
        // Inject modal into body if not exists
        if ($('#bookingModal').length === 0) {
            $('body').append(modalTemplate);
        }

        // Set minimum date to today for date inputs
        const today = new Date().toISOString().split('T')[0];
        $('#modal-check-in, #modal-check-out').attr('min', today);

        // Validate checkout date is after checkin
        $('#modal-check-in').on('change', function() {
            const checkinDate = $(this).val();
            $('#modal-check-out').attr('min', checkinDate);
            
            // If checkout is before checkin, reset it
            const checkoutDate = $('#modal-check-out').val();
            if (checkoutDate && checkoutDate <= checkinDate) {
                $('#modal-check-out').val('');
            }
        });

        // Close modal on overlay click
        $('.booking-modal-overlay').on('click', function(e) {
            if ($(e.target).hasClass('booking-modal-overlay')) {
                closeBookingModal();
            }
        });

        // Close modal on ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $('#bookingModal').hasClass('active')) {
                closeBookingModal();
            }
        });

        // Prevent body scroll when modal is open
        $('#bookingModal').on('show', function() {
            $('body').css('overflow', 'hidden');
        }).on('hide', function() {
            $('body').css('overflow', '');
        });
    });

    /**
     * Open booking modal with room data
     * @param {Object} roomData - Room information
     */
    window.openBookingModal = function(roomData) {
        const modal = $('#bookingModal');
        
        // Populate modal with room data
        modal.find('.room-name').text(roomData.name);
        modal.find('.room-price').html(`${formatPrice(roomData.price)} FCFA <span style="font-size: 16px; opacity: 0.9;">/nuit</span>`);
        modal.find('.room-description').text(roomData.description);
        modal.find('.modal-room-id').val(roomData.id);
        
        // Populate amenities
        const amenitiesList = modal.find('.amenities-items');
        amenitiesList.empty();
        if (roomData.amenities) {
            const amenitiesArray = roomData.amenities.split(',');
            amenitiesArray.forEach(function(amenity) {
                amenitiesList.append(`<li>${amenity.trim()}</li>`);
            });
        }
        
        // Set form action
        modal.find('.booking-modal-form').attr('action', roomData.bookingUrl || '/bookings');
        
        // Pre-fill user data if available
        if (roomData.userName) {
            $('#modal-customer-name').val(roomData.userName);
        }
        if (roomData.userEmail) {
            $('#modal-customer-email').val(roomData.userEmail);
        }
        
        // Show modal with animation
        modal.trigger('show');
        setTimeout(function() {
            modal.addClass('active');
        }, 10);
        
        // Focus on first empty field
        setTimeout(function() {
            if (!$('#modal-customer-name').val()) {
                $('#modal-customer-name').focus();
            } else if (!$('#modal-check-in').val()) {
                $('#modal-check-in').focus();
            }
        }, 500);
    };

    /**
     * Close booking modal
     */
    window.closeBookingModal = function() {
        const modal = $('#bookingModal');
        modal.removeClass('active');
        modal.trigger('hide');
        
        // Reset form after animation
        setTimeout(function() {
            modal.find('.booking-modal-form')[0].reset();
        }, 400);
    };

    /**
     * Format price with thousand separators
     * @param {number} price - Price to format
     * @returns {string} Formatted price
     */
    function formatPrice(price) {
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ' ');
    }

    /**
     * Attach click handlers to booking buttons
     */
    $(document).ready(function() {
        // Handle "Réserver Maintenant" buttons on home page carousel
        $(document).on('click', '.owl-room .main_btn[href*="rooms"]', function(e) {
            e.preventDefault();
            
            // Get room data from the current carousel item
            const roomItem = $(this).closest('.row.align-items-center');
            const roomData = {
                id: roomItem.find('input[name="room_id"]').val() || '',
                name: roomItem.find('.type').text().trim(),
                price: roomItem.find('.price').text().replace(/[^\d]/g, ''),
                description: roomItem.find('.room_right > p').first().text().trim(),
                amenities: '',
                bookingUrl: '/bookings',
                userName: roomItem.find('input[name="customer_name"]').val() || '',
                userEmail: roomItem.find('input[name="customer_email"]').val() || ''
            };
            
            // Get amenities
            const amenitiesItems = [];
            roomItem.find('.room_right ul li').each(function() {
                amenitiesItems.push($(this).text().trim());
            });
            roomData.amenities = amenitiesItems.join(', ');
            
            // Open modal
            openBookingModal(roomData);
        });
    });

})(jQuery);
