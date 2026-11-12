<!-- Unified Modal -->
<div id="statusModal" class="modal">
    <div class="modal-content">
        <div class="modal-icon" id="modalIconContainer">
            <!-- Icon dynamically inserted -->
        </div>
        <h3 id="modalTitle">Message Sent Successfully!</h3>
        <ul id="modalErrors" class="text-start text-danger mb-3" style="display: none; padding-left: 20px;"></ul>
        <p id="modalMessage" style="display: block;"></p>
        <button class="btn" onclick="closeModal()">Continue</button>
    </div>
</div>

<style>

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,0.7);
    z-index: 1000;
    justify-content: center;
    align-items: center;
}

.modal-content {
    background: white;
    padding: 40px;
    border-radius: 20px;
    text-align: center;
    max-width: 500px;
    width: 90%;
    box-shadow: 0 10px 50px rgba(0,0,0,0.2);
}

.modal-icon {
    font-size: 5rem;
    margin-bottom: 20px;
}

.modal-icon.success {
    color: #28a745;
}

.modal-icon.error {
    color: #dc3545;
}

.modal h3 {
    font-size: 1.8rem;
    margin-bottom: 15px;
    color: #1A1A1A;
}

.modal p {
    color: #6C757D;
    margin-bottom: 30px;
    font-size: 1.1rem;
}









</style>

<script>
    function showModal(message) {
        document.getElementById('successMessage').textContent = message;
        document.getElementById('successModal').style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    function closeModal() {
        document.getElementById('successModal').style.display = 'none';
        document.body.style.overflow = 'auto';
    }

    // Close modal when clicking outside content
    document.addEventListener('click', function(event) {
        const modal = document.getElementById('successModal');
        if (event.target === modal) {
            closeModal();
        }
    });

    // Close with ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeModal();
        }
    });
</script>